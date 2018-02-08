<?php namespace App\DesginPattern;

// 참조: http://wafe.github.io/php-the-right-way/pages/Design-Patterns.html
abstract class Singleton
{
    public static function getInstance()
    {
        static $instance = null;
        if (null === $instance) {
            $instance = new static();
        }

        return $instance;
    }

    protected function __construct()
    {
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }
}
?>