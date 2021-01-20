<?php

class Conexion
{
    private static $host = '127.0.0.1';
    private static $dbname = 'conecta_peru';
    private static $user = 'root';
    private static $pwd = '';
    private static $cnx = null;

    public static function conectar($bool = true)
    {
        try {
            if($bool){
                self::$cnx = new PDO("mysql:host=".self::$host.";dbname=".self::$dbname, self::$user, self::$pwd);
            } else {
                self::$cnx = null;
            }
            return self::$cnx;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}


?>