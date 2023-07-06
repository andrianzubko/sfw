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

            } elseif (is_dir("$dir/$file")) {
                $this->testClassesInclude("$dir/$file");

            } elseif (str_ends_with($file, '.php')) {
                $status = include_once "$dir/$file";

                $this->assertNotFalse($status);
            }
        }
    }

    /**
     * Syntax checking at all templates.
     */
    public function testTemplatesSyntax(string $dir = APP_DIR . '/templates'): void
    {
        foreach (scandir($dir) as $file) {
            if ($file === '.' || $file === '..') {

            } elseif (is_dir("$dir/$file")) {
                $this->testTemplatesSyntax("$dir/$file");

            } elseif (str_ends_with($file, '.php')) {
                exec("php -l $dir/$file", result_code: $code);

                $this->assertSame(0, $code);
            }
        }
    }

    /**
     * Example of testing site functionality.
     */
    public function testSome(): void
    {
        $app = new \App\Runner();

        $this->assertSame('', $app->sys('Text')->trim(' '));

        $router = new \App\Router();

        $this->assertSame('Index', $router->get());
    }
}
