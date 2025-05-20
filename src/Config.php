<?php
namespace src;

use Dotenv\Dotenv;

class Config {
    private static $initialized = false;

    private static function loadEnv(): void {
        if (!self::$initialized) {
            $dotenv = Dotenv::createImmutable(dirname(__DIR__)); 
            $dotenv->load();
            self::$initialized = true;
        }
    }

    public static function get($key) {
        self::loadEnv();
        return $_ENV[$key] ?? null;
    }
}
