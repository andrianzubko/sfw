<?php

use PHPUnit\Framework\TestCase;

class BasicTest extends TestCase
{
    /**
     * Including all classes.
     */
    public function testClassesInclude(string $dir = APP_DIR . '/src'): void
    {
        foreach (scandir($dir) as $file) {
            if ($file === '.' || $file === '..') {
                continue;
            }

            if (is_dir("$dir/$file")) {
                $this->testClassesInclude("$dir/$file");
            } elseif (
                str_ends_with($file, '.php')
            ) {
                $result = include_once "$dir/$file";

                $this->assertNotFalse($result);
            }
        }
    }

    /**
     * Syntax checking at all native templates.
     */
    public function testNativeTemplatesSyntax(?string $dir = null): void
    {
        if (!isset($dir)) {
            $dir = App\Runner::$config['sys']['templater']['native']['dir'];
        }

        foreach (scandir($dir) as $file) {
            if ($file === '.' || $file === '..') {
                continue;
            }

            if (is_dir("$dir/$file")) {
                $this->testNativeTemplatesSyntax("$dir/$file");
            } elseif (
                str_ends_with($file, '.php')
            ) {
                exec("php -l $dir/$file", result_code: $result);

                $this->assertSame(0, $result);
            }
        }
    }

    /**
     * Syntax checking at all xsl templates.
     */
    public function testXslTemplatesSyntax(?string $dir = null): void
    {
        if (!isset($dir)) {
            $dir = App\Runner::$config['sys']['templater']['xslt']['dir'];
        }

        foreach (scandir($dir) as $file) {
            if ($file === '.' || $file === '..') {
                continue;
            }

            if (is_dir("$dir/$file")) {
                $this->testXslTemplatesSyntax("$dir/$file");
            } elseif (
                str_ends_with($file, '.xsl')
            ) {
                if (extension_loaded('libxml')
                    && extension_loaded('dom')
                    && extension_loaded('xsl')
                ) {
                    $doc = new DOMDocument;

                    $success = $doc->load("$dir/$file", LIBXML_NOCDATA);

                    $this->assertNotFalse($success);

                    if ($success) {
                        $processor = new XSLTProcessor;

                        $success = $processor->importStylesheet($doc);

                        $this->assertNotFalse($success);
                    }
                } else {
                    $this->fail('For XSL tests your need extensions: LIBXML, DOM and XSL');
                }
            }
        }
    }

    /**
     * Example of testing site functionality.
     */
    public function testSome(): void
    {
        $app = new App\Runner();

        $this->assertSame('', $app->sys('Text')->trim(' '));

        $router = new App\Router();

        $this->assertSame('Index', $router->get());
    }
}
