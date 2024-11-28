<?php

namespace Classes;


class DbConnection
{
    const  DB_HOSTNAME = 'localhost';
    const DB_USERNAME = 'root';
    const  DB_PASSWORD = '';
    const  DB_NAME = 'voting_system';
    protected \PDO $dbConnection;


    public function __construct()
    {
        $dsn = "mysql:host=" . self::DB_HOSTNAME . ";dbname=" . self::DB_NAME;

        try {
            $this->dbConnection = new \PDO($dsn, self::DB_USERNAME, self::DB_PASSWORD);
            $this->dbConnection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function getDbConnection()
    {
        return $this->dbConnection;
    }

}