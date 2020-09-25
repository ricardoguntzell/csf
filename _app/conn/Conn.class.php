<?php

/**
 * Conn.class [ CONEXÃO ]
 * Classe abstrata de conexão. Padrão SingleTon.
 * Retorna um objeto PDO pelo método estático getConn();
 * @copyright (c) 2018, Ricardo Guntzell
 */
abstract class Conn
{

    private static $host = HOST;
    private static $user = USER;
    private static $pass = PASS;
    private static $dbsa = DBSA;
    private static $port = PORT;

    /** @var PDO */
    private static $connect = null;

    /**
     * Conecta com o banco de dados com o pattern singleton.
     * Retorna um objeto PDO!
     */
    private static function Conectar()
    {
        try {
            if (self::$connect == null):
                $dsn = 'pgsql:host=' . self::$host . ';dbname=' . self::$dbsa . ';port=' . self::$port;
                $options = null;
                self::$connect = new PDO($dsn, self::$user, self::$pass, $options);
            endif;
        } catch (PDOException $e) {
            var_dump($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
            die;
        }

        self::$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return self::$connect;
    }

    /** Retorna um objeto PDO Singleton Pattern. */
    protected static function getConn()
    {
        return self::Conectar();
    }

}
