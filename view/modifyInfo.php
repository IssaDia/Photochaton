<?php
require_once("header.php");
require_once(__DIR__ . "../../model/User.php");

$currentUser = $_SESSION["user"]["username"];
$user = new User();
$user->getUser($currentUser); ?>

<div class="row">

    <div class="col-md-12">
        <h2>Modify your infos</h2>
        <form action="../controller/controller.php" method="post">
            <div class="form-group">
                <label for="user">Username</label>
                <input type="text" name="username-modify" class="form-control" value=<?php echo $currentUser ?> required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password-modify" class="form-control" value="" required>
            </div>
            <button type="submit" name="modify" class="btn btn-success">modifier!</button>
        </form>
    </div>
</div>
</div>

<?php require "footer.php" ?>