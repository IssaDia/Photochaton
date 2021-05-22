<?php
require_once("header.php");
require_once("../model/User.php");
require_once("../model/Pet.php");

$currentUser = $_SESSION["user"]["username"];
$user = new User();
$pets = new Pet();
$petsList = $pets->getAllPets();
$userData = $user->getUser($currentUser);

if (isset($_SESSION["message"])) : ?>
    <div class="alert alert-<?= $_SESSION["msg_type"] ?>">
        <?php
        echo $_SESSION["message"];
        unset($_SESSION["message"]);
        ?>
    </div>
<?php endif ?>
<div class="row">
    <div class="col-md-12">
        <p>Bienvenue, <?php echo $userData["username"] ?> <a class="btn btn-secondary" href="modifyInfo.php" role="button">modifier votre pseudo ou mot de passe</a>
        </p>
        <p>La liste de vos animaux : </p>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <form action="../controller/controller.php" method="POST">
            <label>Choisissez vos animaux : </h2>
                <select class="form-select" name="pets[]" multiple aria-label="multiple select example">
                    <?php
                    foreach ($petsList as $pet) { ?>
                        <option name=<?php echo $pet["name"] ?>" value="<?php echo $pet["name"] ?>"><?php echo $pet["name"] ?></option>
                    <?php  }  ?>
                </select>
                <button class="btn btn-success" name="selected-pets">Valider</button>
        </form>

    </div>
</div>

<?php require "footer.php" ?>