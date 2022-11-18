<?php
//cette page doit recevoir un parametre id
//http://..../modifier_categorie.php?id=8


$title="ajouter une categories";
include ("header.php");


//je vai chercher la gategories a modifier en bdd
//1 : je recupere l'id donnee en parametre get
$id=filter_input(INPUT_GET, "id");
//2 : je vais lire le bdd

include "config.php";
$pdo = new PDO("mysql:host=".config::SERVEUR.";dbname=".config::BDD
    ,config::UTILISATEUR,config::MOTDEPASSE);
$requete=$pdo->prepare("select * from categories where id=:id");
$requete->bindParam("id",$id);
$requete->execute();
$lignes=$requete->fetchAll();
//si je n'ai pas recuperer 1 ligne (ni plus ni moin)
// c'est le probleme
if (count($lignes)!=1){
    http_response_code(404); //je lève une ereure 404
    echo "categorie inexistante";
    die(); //j'arrete la.
}
//si j'arrive la c'est tout va bien
$categorie=$lignes[0]; //la categories est ma premiere et unique ligne


?>
<h1>Modifier une categorie</h1>
    <form action="actions/update_categorie.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <div class="form-group">
            <label for="titre">Titre</label>
            <input value="<?php echo htmlspecialchars($categorie["titre"]) ?>" class="form-control" type="text" required maxlength="50" name="titre"></div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description"><?php echo htmlspecialchars($categorie["description"]) ?></textarea>
        </div>
        <a href="index.php" class="mt-5 btn btn-light">Annuler</a>
        <input type="Submit" class="mt-5 btn btn-success" value="Enregistrer">
    </form>
<?php

include ("footer.php");