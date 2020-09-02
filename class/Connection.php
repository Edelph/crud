<?php
namespace app;

use PDO;
use PDOException;

class Connection {

    static $_pdo;

    public static function getInstancePdo()
    {
        if(self::$_pdo == null){
            self::$_pdo = new PDO("sqlite:./donne/data.db"); 
        }
        return self::$_pdo;  
    }

}