<?php
require_once 'Database.php';


class User extends Database
{
    public function addPet($username)
    {
        $database = new Database();
        $bdd = $database->connect();
    }
};
