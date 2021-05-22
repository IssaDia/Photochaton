<?php
require_once "Database.php";

class User extends Database
{
    public function getUser($username)
    {
        $database = new Database();
        $bdd = $database->connect();
        $sql = "SELECT * from user WHERE username = :username";
        $req = $bdd->prepare($sql);
        $req->bindParam(":username", $username, PDO::PARAM_STR);
        $req->execute();
        $currentUser = $req->fetch();
        return $currentUser;
    }
    public function modifyUser($username, $password)
    {
        $database = new Database();
        $bdd = $database->connect();
        $sql = "UPDATE user SET username = :username , password = :pass WHERE username = :user";
        var_dump($sql);
        $req = $bdd->prepare($sql);
        $req->bindValue(":username", $username);
        $req->bindValue(":user", $username);
        $req->bindValue(":pass", $password);
        $req->execute();
        $req->closeCursor();
    }
};
