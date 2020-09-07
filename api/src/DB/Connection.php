<?php

namespace Api\DB;

use \PDO;

class Connection
{
    protected static $db;

    private function __construct()
    {
        self::$db = new \PDO(
            ConfigDB::DRIVER . ":host=" . ConfigDB::HOST . "; dbname=" . ConfigDB::DBNAME,
            ConfigDB::USER,
            ConfigDB::PASSWORD
        );
        self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        self::$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        self::$db->exec('SET NAMES utf8');
    }

    public static function getInstance()
    {
        if (!self::$db) {
            new Connection();
        }
        return self::$db;
    }
}
