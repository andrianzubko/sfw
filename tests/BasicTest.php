<?php

use PHPUnit\Framework\{TestCase, AssertionFailedError, ExpectationFailedException};

class BasicTest extends TestCase
{
    /**
     * Includes all classes.
     *
     * @throws ExpectationFailedException
     */
    public function testClassesInclude(): void
    {
        foreach (App\Runner::sys('Dir')->scan(APP_DIR . '/src', true, true) as $file) {
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
     */
    public function testNativeTemplatesSyntax(): void
    {
        $dir = App\Runner::$config['sys']['templater']['native']['dir'];

        foreach (App\Runner::sys('Dir')->scan($dir, true, true) as $file) {
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
     */
    public function testTwigTemplatesSyntax(): void
    {
        $dir = App\Runner::$config['sys']['templater']['twig']['dir'];

        try {
            $loader = new Twig\Loader\FilesystemLoader($dir);
        } catch (Throwable) {
            return;
        }

        $twig = new Twig\Environment($loader);

        foreach (App\Runner::sys('Dir')->scan($dir, true, true) as $file) {
            if (is_file($file)
                && str_ends_with($file, '.twig')
            ) {
                try {
                    $twig->parse(
                        $twig->tokenize(
                            new Twig\Source(
                                App\Runner::sys('File')->get($file), basename($file), $file
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
     */
    public function testXslTemplatesSyntax(): void
    {
        $dir = App\Runner::$config['sys']['templater']['xslt']['dir'];

        foreach (App\Runner::sys('Dir')->scan($dir, true, true) as $file) {
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

    /**
     * Example of site functionality test.
     *
     * @throws ExpectationFailedException
     */
    public function testSome(): void
    {
        $this->assertSame('', App\Runner::sys('Text')->trim(' '));
    }
}
