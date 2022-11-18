<?php
$title="Mika Ly";
include ('header.php');

?>
<h1>Bienvenue sur l'album photo</h1>
<h2> Les caractéristique de chaque photo son presenter dans ce tableau</h2>


<?php
//pour se connecter a la BDD on va utiliser PDO
//PHP data objet
//je cree un objet PDO

include "config.php";
$pdo = new PDO("mysql:host=".config::SERVEUR.";dbname=".config::BDD
    ,config::UTILISATEUR,config::MOTDEPASSE);
//je prepar ma requete SQL
$requete = $pdo->prepare("select * from categories");
//executer ma requete
$requete->execute();
//recuperation des lignes
$lignes = $requete->fetchAll();
//var_dump($lignes);
//affichage en debug du contenue d'une variable
//jamais en PROD dans une appli !

?>


    <table ID="showcase" class="table table">
        <tr class="entete">
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
                <td>
                    <a class="btn btn-primary" href="modifier_categories.php?id=<?php echo $l["id"]?>">Modifier</a>
                </td>
                <td>
                    <a class="btn btn-danger"
                       href="delete_categories.php?id=<?php echo $l["id"]?>">Supprimer</a>
                </td>
            </tr>
                <?php
        }
        ?>
    </table>
    <a href="ajouter_categories.php" class="mt-5 btn btn-success">Ajouter</a>

<?php
include ('footer.php');