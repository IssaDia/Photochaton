<?php

$bdd = new PDO(
    'mysql:host=127.0.0.1;dbname=photochaton;charset=utf8',
    "root",
    "",
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]
);
