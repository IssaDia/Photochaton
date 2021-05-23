<?php

$bdd = new PDO(
    'mysql:host="host name";dbname=photochaton;charset=utf8',
    "user",
    "password",
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]
);
