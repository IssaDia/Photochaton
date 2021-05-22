<?php
require_once 'Database.php';

class Login extends Database
{
    public function __construct()
    {
    }
    public function login($username, $password)
    {
        $database = new Database();
        $bdd = $database->connect();
        $req = $bdd->prepare("SELECT * from user WHERE `username` = :username AND `password` = :password ");
        $req->bindValue(':username', $username, PDO::PARAM_STR);
        $req->bindValue(':password', $password, PDO::PARAM_STR);
        $req->execute();
        $user = $req->fetch();
        return $user;
    }
};
