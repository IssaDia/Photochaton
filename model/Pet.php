<?php
// Not finished 
require_once 'Database.php';

class Pet extends Database
{
    public function getAllPets()
    {
        $database = new Database();
        $bdd = $database->connect();
        $sql = "SELECT * from pets";
        $req = $bdd->prepare($sql);
        $req->execute();
        $pets = $req->fetchAll();
        return $pets;
    }

    public function getUserPets()
    {
        $database = new Database();
        $bdd = $database->connect();
        $sql = "SELECT * from pets";
        $req = $bdd->prepare($sql);
        $req->execute();
        $pets = $req->fetch();
        return $pets;
    }
};
