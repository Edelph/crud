<?php
namespace app;

use PDO;

class Connection {

    private static $_pdo;

    public static function getInstancePdo()
    {
        if(self::$_pdo == null){
            self::$_pdo = new PDO('sqlite:../data/data.db');
        }
        return self::$_pdo;   
    }

}