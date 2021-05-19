<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '/model/Register.php');
require_once(__ROOT__ . '/model/Login.php');
require_once(__ROOT__ . '/model/User.php');

session_start();

if (isset($_POST["username-registration"]) && isset($_POST["password-registration"])) {

    $username = filter_var($_POST["username-registration"], FILTER_SANITIZE_STRING, FILTER_NULL_ON_FAILURE);
    $password = filter_var($_POST['password-registration'], FILTER_SANITIZE_STRING, FILTER_NULL_ON_FAILURE);
    $cryptedPassword = hash("sha256", $password);
    $register = new Register();
    $register->register($username, $cryptedPassword);
    header("location: ../view/home.php");
    $_SESSION['message'] = "Bienvenue sur votre compte";
};

if (isset($_POST["username-login"]) && isset($_POST["password-login"])) {
    $username = filter_var($_POST["username-login"], FILTER_SANITIZE_STRING, FILTER_NULL_ON_FAILURE);
    $password = filter_var($_POST["password-login"], FILTER_SANITIZE_STRING, FILTER_NULL_ON_FAILURE);
    $cryptedPassword = hash("sha256", $password);
    var_dump($username, $cryptedPassword);
    $login = new Login();
    $login->login($username, $cryptedPassword);
}

if (isset($_POST["modify"])) {

    $username = filter_var($_POST["username-modify"], FILTER_SANITIZE_STRING, FILTER_NULL_ON_FAILURE);
    $password = filter_var($_POST["password-modify"], FILTER_SANITIZE_STRING, FILTER_NULL_ON_FAILURE);
    $cryptedPassword = hash("sha256", $password);
    $user = new User();
    $user->modifyUser($username, $cryptedPassword);
    $_SESSION['message'] = "Votre profil a bien été modifié";
    $_SESSION['msg_type'] = "warning";
    header("location: ../view/home.php");
    var_dump($user);
}
