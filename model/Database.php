<?php

require_once(__DIR__ . '../../login.php');

class Database
{

    protected function connect()
    {

        try {
            global $bdd;
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        } catch (Exception $e) {
            // En cas d'erreur, on affiche un message et on arrête tout
            die('Erreur : ' . $e->getMessage());
        }

        return $bdd;
    }
}
