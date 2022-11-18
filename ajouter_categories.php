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
            <textarea class="form-control" name="description"></textarea>
            <div class="form-group">
                <label for="Nombre_de_page">Nombre de page:</label>
                <input class="form-control" type="number" required maxlength="50" name="Nombre_de_page">
            </div>
            <div class="form-group">
                <label for="Code_barre">Code barre:</label>
                <textarea class="form-control" type="text" required maxlength="50" name="Code_barre"></textarea>
            </div>
            <div class="form-group">
                <label for="Nombre_de_photos">Nombre de photo:</label>
                <input class="form-control" type="number" required name="Nombre_de_photos">
            </div>
            <div class="form-group">
                <label for="Dimensions">Dimensions:</label>
                <textarea class="form-control" placeholder="exemple:23x45x12 en cm" type="number" required maxlength="50"  name="Dimensions"></textarea>
            </div>
            <div class="form-group">
                <label for="Prix_par_page">Prix par page:</label>
                <input class="form-control" type="number" required maxlength="13" name="Prix_par_page">
            </div>

        </div>
        <a href="index.php" class="mt-5 btn btn-light">Annuler</a>
        <input type="Submit" class="mt-5 btn btn-success" value="Enregistrer">
    </form>
<?php

include ("footer.php");