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


        if ($user) {
            header("location: ../view/home.php");
            $_SESSION['user'] = $user;
            $_SESSION['message'] = "Bienvenue sur votre compte";
            $_SESSION['msg_type'] = "success";
        } else {
            header("location: ../index.php");
            $_SESSION['message'] = "Votre pseudo ou mot de passe est erroné";
            $_SESSION['msg_type'] = "danger";
        }
    }
};
