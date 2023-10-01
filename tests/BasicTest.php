<?php

use PHPUnit\Framework\{TestCase, AssertionFailedError, ExpectationFailedException};

class BasicTest extends TestCase
{
    /**
     * Including all classes.
     *
     * @throws ExpectationFailedException
     */
    public function testClassesInclude(): void
    {
        $app = new App\Runner();

        foreach ($app->sys('Dir')->scan(APP_DIR . '/src', true, true) as $file) {
            if (is_file($file)
                && str_ends_with($file, '.php')
            ) {
                $this->assertNotFalse(include_once $file);
            }
        }
    }

    /**
     * Syntax checking at all native templates.
     *
     * @throws ExpectationFailedException
     */
    public function testNativeTemplatesSyntax(): void
    {
        $app = new App\Runner();

        $dir = App\Runner::$config['sys']['templater']['native']['dir'];

        foreach ($app->sys('Dir')->scan($dir, true, true) as $file) {
            if (is_file($file)
                && str_ends_with($file, '.php')
            ) {
                exec("php -l $file", result_code: $result);

                $this->assertSame(0, $result);
            }
        }
    }

    /**
     * Syntax checking at all twig templates.
     *
     * @throws ExpectationFailedException
     */
    public function testTwigTemplatesSyntax(): void
    {
        $app = new App\Runner();

        $dir = App\Runner::$config['sys']['templater']['twig']['dir'];

        $twig = new \Twig\Environment(
            new \Twig\Loader\FilesystemLoader($dir)
        );

        foreach ($app->sys('Dir')->scan($dir, true, true) as $file) {
            if (is_file($file)
                && str_ends_with($file, '.twig')
            ) {
                try {
                    $twig->parse(
                        $twig->tokenize(
                            new \Twig\Source(
                                $app->sys('File')->get($file), basename($file), $file
                            )
                        )
                    );

                    $this->assertTrue(true);
                } catch (\Twig\Error\SyntaxError $e) {
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
     * Syntax checking at all xsl templates.
     *
     * @throws AssertionFailedError
     */
    public function testXslTemplatesSyntax(): void
    {
        $app = new App\Runner();

        $dir = App\Runner::$config['sys']['templater']['xslt']['dir'];

        foreach ($app->sys('Dir')->scan($dir, true, true) as $file) {
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
     * Example of testing site functionality.
     *
     * @throws ExpectationFailedException
     */
    public function testSome(): void
    {
        $app = new App\Runner();

        $this->assertSame('', $app->sys('Text')->trim(' '));
    }
}
