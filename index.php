<?php
require_once "view/header.php";

if (isset($_SESSION["message"])) : ?>
    <div class="alert alert-<?= $_SESSION["msg_type"] ?>">
        <?php
        echo $_SESSION["message"];
        unset($_SESSION["message"]);
        ?>
    </div>
<?php endif ?>

<div class="row">
    <div class="col-md-6">
        <h2>Login</h2>
        <form action="controller/controller.php" method="post">
            <div class="form-group">
                <label for="user">Username</label>
                <input type="text" name="username-login" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password-login" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">enter!</button>
        </form>
    </div>
    <div class="col-md-6">
        <h2>Register</h2>
        <form action="controller/controller.php" method="post">
            <div class="form-group">
                <label for="user">Username</label>
                <input type="text" name="username-registration" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password-registration" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">register!</button>
        </form>
    </div>
</div>
</div>

<?php require_once "view/footer.php" ?>