<?php
//
session_start();

$title="ajouter une categories";
include ("header.php");
// generer un token de securite
$token=uniqid();
//
$_SESSION["token"]=$token;


?>
<h1>ajouter une categorie</h1>
    <form action="actions/insert_categorie.php" method="post">
        <input type="hidden" name="token" value="<?php echo $token?>">
        <div class="form-group">
            <label for="titre">Titre</label>
            <input class="form-control" type="text" required maxlength="50" name="titre"></div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" placeholder="merci" name="description"></textarea>
        </div>
        <a href="index.php" class="mt-5 btn btn-light">Annuler</a>
        <input type="Submit" class="mt-5 btn btn-success" value="Enregistrer">
    </form>
<?php

include ("footer.php");