<?php

use PHPUnit\Framework\{AssertionFailedError, ExpectationFailedException, TestCase};

class BasicTest extends TestCase
{
    /**
     * Includes all classes.
     *
     * @throws ExpectationFailedException
     * @throws ReflectionException
     */
    public function testClassesInclude(): void
    {
        $rApp = new ReflectionClass('App\Runner');

        foreach ($rApp->getMethod('sys')->invoke(null, 'Dir')->scan(APP_DIR . '/src', true, true) as $file) {
            if (is_file($file)
                && str_ends_with($file, '.php')
            ) {
                $this->assertNotFalse(include_once $file);
            }
        }
    }

    /**
     * Syntax checks at all native templates.
     *
     * @throws ExpectationFailedException
     * @throws ReflectionException
     */
    public function testNativeTemplatesSyntax(): void
    {
        $rApp = new ReflectionClass('App\Runner');

        $dir = $rApp->getProperty('sys')->getValue()['config']['templater_native_dir'];

        foreach ($rApp->getMethod('sys')->invoke(null, 'Dir')->scan($dir, true, true) as $file) {
            if (is_file($file)
                && str_ends_with($file, '.php')
            ) {
                exec("php -l $file", result_code: $result);

                $this->assertSame(0, $result);
            }
        }
    }

    /**
     * Syntax checks at all twig templates.
     *
     * @throws ExpectationFailedException
     * @throws ReflectionException
     */
    public function testTwigTemplatesSyntax(): void
    {
        $rApp = new ReflectionClass('App\Runner');

        $dir = $rApp->getProperty('sys')->getValue()['config']['templater_twig_dir'];

        try {
            $loader = new Twig\Loader\FilesystemLoader($dir);
        } catch (Throwable) {
            return;
        }

        $twig = new Twig\Environment($loader);

        foreach ($rApp->getMethod('sys')->invoke(null, 'Dir')->scan($dir, true, true) as $file) {
            if (is_file($file)
                && str_ends_with($file, '.twig')
            ) {
                try {
                    $twig->parse(
                        $twig->tokenize(
                            new Twig\Source(
                                $rApp->getMethod('sys')->invoke(null, 'File')->get($file),
                                basename($file),
                                $file
                            )
                        )
                    );

                    $this->assertTrue(true);
                } catch (Throwable $e) {
                    $this->fail(
                        sprintf('%s in %s:%d',
                            $e->getMessage(),
                            $e->getFile(),
                            $e->getLine()
                        )
                    );
                }
            }
        }
    }

    /**
     * Syntax checks at all xsl templates.
     *
     * @throws AssertionFailedError
     * @throws ReflectionException
     */
    public function testXslTemplatesSyntax(): void
    {
        $rApp = new ReflectionClass('App\Runner');

        $dir = $rApp->getProperty('sys')->getValue()['config']['templater_xslt_dir'];

        foreach ($rApp->getMethod('sys')->invoke(null, 'Dir')->scan($dir, true, true) as $file) {
            if (is_file($file)
                && str_ends_with($file, '.xsl')
            ) {
                if (extension_loaded('libxml')
                    && extension_loaded('dom')
                    && extension_loaded('xsl')
                ) {
                    $doc = new DOMDocument();

                    $success = $doc->load($file, LIBXML_NOCDATA);

                    $this->assertNotFalse($success);

                    if (!$success) {
                        continue;
                    }

                    $success = (new XSLTProcessor())->importStylesheet($doc);

                    $this->assertNotFalse($success);
                } else {
                    $this->fail('For XSL tests your need extensions: LIBXML, DOM and XSL');
                }
            }
        }
    }
}
