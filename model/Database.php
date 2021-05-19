<?php

class Database
{
    private $username;
    private $password;

    protected function connect()
    {
        $this->username = "root";
        $this->password = "";
        $conn = new PDO(
            'mysql:host=localhost;dbname=photochaton;charset=utf8',
            $this->username,
            $this->password,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]
        );
        return $conn;
    }
};
