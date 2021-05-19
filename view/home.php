<?php
require_once("header.php");
require_once("../model/User.php");
$currentUser = $_SESSION["user"]["username"];
$user = new User();
$userData = $user->getUser($currentUser);

if (isset($_SESSION["message"])) : ?>
    <div class="alert alert-<?= $_SESSION["msg_type"] ?>">
        <?php
        echo $_SESSION["message"];
        unset($_SESSION["message"]);
        ?>
    </div>
<?php endif ?>

<p><?php echo $userData["username"] ?></p><a class="btn btn-secondary" href="modifyInfo.php" role="button">modifier votre pseudo ou mot de passe</a>

<?php require "footer.php" ?>