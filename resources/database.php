<?php

class Database
{
    private static $dbName = 'akvelon' ;
    private static $dbHost = 'ns9.wmrs.ru' ;
    private static $dbUsername = 'akvelon';
    private static $dbUserPassword = '123asd';

    private static $connection  = null;

    public function __construct() {
        die('Init function is not allowed');
    }

    public static function connect()
    {

        if ( self::$connection == null )
        {
            try
            {
                self::$connection =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword);
            }
            catch(PDOException $e)
            {
                die($e->getMessage());
            }
        }
        return self::$connection;


    }

    public static function disconnect()
    {
        self::$connection = null;
    }
}

