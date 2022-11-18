<?php
session_start();

//ce fichier ne va rien afficher
//il va faire l'insert dans la table et retourne à l'index

//verifier le token de securite
$tokenrecu=filter_input(INPUT_POST, "token");
if ($_SESSION["token"]!=$tokenrecu)
    die("vilain pirate");


//Recuperer les donnees du POST
$titre=filter_input(INPUT_POST, "titre");
$description=filter_input(INPUT_POST, "description");

//creer un objet PDO
include "../config.php";
$pdo = new PDO("mysql:host=".config::SERVEUR.";dbname=".config::BDD
    ,config::UTILISATEUR,config::MOTDEPASSE);

//tjr cree un parametre pour les requetes sql

$requete = $pdo->prepare("insert into categories(titre,description)"
                     ." values(:titre,:description)");

$requete->bindParam("titre", $titre);
$requete->bindParam("description", $description);

$requete->execute();

//retourner a l'accueil
header("location:../index.php");