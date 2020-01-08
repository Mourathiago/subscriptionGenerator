<?php

class db
{
    private static $instance;
    private static $HOST = 'localhost';
    private static $DB = 'subscriptionGenerator';
    private static $USER = 'root';
    private static $PASS = 'asdqwe';

    public static function getInstance()
    {
        if (!isset(self::$instance))
        {
            try
            {
                self::$instance = new PDO("mysql:host=".self::$HOST."; dbname=".self::$DB, self::$USER, self::$PASS);
                self::$instance->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$instance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            }
            catch (PDOException $erro)
            {
                echo $erro->getMessage();
            }
        }
        return self::$instance;
    }
    public static function prepare($sql)
    {
        return self::getInstance()->prepare($sql);
    }
}

?>