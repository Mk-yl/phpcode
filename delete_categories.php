<?php
//cette page doit recevoir un parametre id
// exemple : http://......../modifier_categorie.php?id=8
$title="Supprimer  une catégories";
include("header.php");

//je vais aller chercher la categorie a modifier en bdd
//1 : je recupere l'id donné en parametre get
$id=filter_input(INPUT_GET, "id");
//2:je vais lire la bdd
include "config.php";
$pdo = new PDO("mysql:host=".config::SERVEUR.";dbname=".config::BDD,config::UTILISATEUR,config::MOTDEPASSE);
$requete=$pdo->prepare("select * from categories where id=:id");
$requete->bindParam("id", $id);
$requete->execute();
$lignes=$requete->fetchAll();
//si je n'ai pas recupere ligne (ni plus ni moins)
//c'est le probleme
if (count($lignes)!=1){
    http_response_code(404); // je leve une erreur 404
    echo "Catégorie inexistante";
    die();//j'arrete la.

}
//si j'arrive a la tout va bien
$categories=$lignes[0];

?>

<h1>êtes-vous sur de vouloir supprimer cette catégories?</h1>
<form action="actions/delete_categories.php" method="post">
    <input type="hidden" name="id" value="<?php echo $id ?>">

    <table class="table table-striped">
        <tr>
            <th>Titre</th>
            <th>Description</th>
            <th>Nombre de page</th>
            <th>Code barre</th>
            <th>Nombre de photos</th>
            <th>Dimensions</th>
            <th>Prix par page</th>


        </tr>
        <?php
        foreach ($lignes as $l){
            ?>
            <tr>
                <td><?php echo $l["titre"] ?></td>
                <td><?php echo $l["description"] ?></td>
                <td><?php echo $l["Nombre_de_page"] ?></td>
                <td><?php echo $l["Code_barre"] ?></td>
                <td><?php echo $l["Nombre_de_photos"] ?></td>
                <td><?php echo $l["Dimensions"] ?></td>
                <td><?php echo $l["Prix_par_page"] ?></td>

            </tr>
            <?php
        }
        ?>
    </table>
    <a href="index.php" class="mt-5 btn btn-success">Annuler</a>
    <a href="modifier_categories.php?id=<?php echo $id ?>" class="mt-5 btn btn-primary">Modifier</a>
    <input type="submit" class="mt-5 btn btn-danger" value="Supprimer">

</form>
