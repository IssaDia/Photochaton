<?php
define("__ROOT__", dirname(dirname(__FILE__)));
require_once(__ROOT__ . "/model/Register.php");
require_once(__ROOT__ . "/model/Login.php");
require_once(__ROOT__ . "/model/User.php");

session_start();

//Registration
if (isset($_POST["username-registration"]) && isset($_POST["password-registration"])) {

    $username = filter_var($_POST["username-registration"], FILTER_SANITIZE_STRING, FILTER_NULL_ON_FAILURE);
    $password = filter_var($_POST["password-registration"], FILTER_SANITIZE_STRING, FILTER_NULL_ON_FAILURE);
    $cryptedPassword = hash("sha256", $password);
    $register = new Register();
    $register->register($username, $cryptedPassword);
    header("location: ../view/home.php");
    $_SESSION["message"] = "Bienvenue sur votre compte";
};

//Login
if (isset($_POST["username-login"]) && isset($_POST["password-login"])) {
    $username = filter_var($_POST["username-login"], FILTER_SANITIZE_STRING, FILTER_NULL_ON_FAILURE);
    $password = filter_var($_POST["password-login"], FILTER_SANITIZE_STRING, FILTER_NULL_ON_FAILURE);
    $cryptedPassword = hash("sha256", $password);
    $login = new Login();
    $user = $login->login($username, $cryptedPassword);

    if ($user) {
        header("location: ../view/home.php");
        $_SESSION["user"] = $user;
        $_SESSION["message"] = "Bienvenue sur votre compte";
        $_SESSION["msg_type"] = "success";
    } else {
        header("location: ../index.php");
        $_SESSION["message"] = "Votre pseudo ou mot de passe est erroné";
        $_SESSION["msg_type"] = "danger";
    }
}

//Modify User Info
if (isset($_POST["modify"])) {

    $username = filter_var($_POST["username-modify"], FILTER_SANITIZE_STRING, FILTER_NULL_ON_FAILURE);
    $password = filter_var($_POST["password-modify"], FILTER_SANITIZE_STRING, FILTER_NULL_ON_FAILURE);
    $cryptedPassword = hash("sha256", $password);
    $user = new User();
    $user->modifyUser($username, $cryptedPassword);
    $_SESSION["message"] = "Votre profil a bien été modifié";
    $_SESSION["msg_type"] = "warning";
    header("location: ../view/home.php");
}

//Selected Pets

if (isset($_POST["selected-pets"])) {
    foreach ($_POST["pets"] as $select) {
        $cleanPet = filter_var($select, FILTER_SANITIZE_STRING, FILTER_NULL_ON_FAILURE);
    }
}
