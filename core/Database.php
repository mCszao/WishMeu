<?php
namespace core;

use \src\Config;

class Database {
    private static $_pdo;
    public static function getInstance() {
        if(!isset(self::$_pdo)) {
            self::$_pdo = new \PDO(Config::get('DB_DRIVER').":host=".Config::get('DB_HOST').":".Config::get('DB_PORT').";dbname=".Config::get('DB_DATABASE'), "root", Config::get('DB_PASSWORD'));
        }
        return self::$_pdo;
    }

    private function __construct() { }
    private function __clone() { }
    public function __wakeup() { }
}