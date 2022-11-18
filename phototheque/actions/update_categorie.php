<?php
//ce fichier ne va rien afficher
//il va faire l'update dans la table et retourne à l'index

//Recuperer les donnees du POST
$id=filter_input(INPUT_POST, "id");
$titre=filter_input(INPUT_POST, "titre");
$description=filter_input(INPUT_POST, "description");

//creer un objet PDO
include "../config.php";
$pdo = new PDO("mysql:host=".config::SERVEUR.";dbname=".config::BDD
    ,config::UTILISATEUR,config::MOTDEPASSE);

//tjr cree un parametre pour les requetes sql

$requete = $pdo->prepare("update  categories set titre=:titre,description=:description"
                     ." where id=:id");
$requete->bindParam(":id", $id);
$requete->bindParam("titre", $titre);
$requete->bindParam("description", $description);

$requete->execute();

//retourner a l'accueil
header("location:../index.php");