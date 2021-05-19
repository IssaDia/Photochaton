<?php
require_once 'Database.php';

class Register extends Database
{

    public function __construct()
    {
    }

    public function register($username, $password)
    {
        $database = new Database();
        $bdd = $database->connect();
        $sql = "INSERT INTO user (username, password) VALUES (:username, :password);";
        $req = $bdd->prepare($sql);
        $req->bindValue(':username', $username, PDO::PARAM_STR);
        $req->bindValue(':password', $password, PDO::PARAM_STR);
        $req->execute();
    }
};
