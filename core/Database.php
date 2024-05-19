<?php
namespace core;

use \src\Config;

class Database {
    private static $_pdo;
    public static function getInstance() {
        if(!isset(self::$_pdo)) {
            self::$_pdo = new \PDO(Config::DB_DRIVER.":host=".Config::DB_HOST.":".Config::DB_PORT.";dbname=".Config::DB_DATABASE, "root", Config::DB_PASSWORD);
        }
        return self::$_pdo;
    }

    private function __construct() { }
    private function __clone() { }
    public function __wakeup() { }
}