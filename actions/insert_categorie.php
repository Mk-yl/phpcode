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
$Nombre_de_page=filter_input(INPUT_POST,"Nombre_de_page");
$Code_barre=filter_input(INPUT_POST,"Code_barre");
$Nombre_de_photos=filter_input(INPUT_POST,"Nombre_de_photos");
$Dimensions=filter_input(INPUT_POST,"Dimensions");
$Prix_par_page=filter_input(INPUT_POST,"Prix_par_page");

//creer un objet PDO
include "../config.php";
$pdo = new PDO("mysql:host=".config::SERVEUR.";dbname=".config::BDD
    ,config::UTILISATEUR,config::MOTDEPASSE);

//tjr cree un parametre pour les requetes sql

$requete = $pdo->prepare("insert into categories(titre,description,Nombre_de_page,Code_barre,Nombre_de_photos,Dimensions,Prix_par_page)"
                     ." values(:titre,:description,:Nombre_de_page,:Code_barre,:Nombre_de_photos,:Dimensions,:Prix_par_page)");

$requete->bindParam("titre", $titre);
$requete->bindParam("description", $description);
$requete->bindParam(":Nombre_de_page",$Nombre_de_page);
$requete->bindParam(":Code_barre",$Code_barre);
$requete->bindParam(":Nombre_de_photos",$Nombre_de_photos);
$requete->bindParam(":Dimensions",$Dimensions);
$requete->bindParam(":Prix_par_page",$Prix_par_page);

$requete->execute();

//retourner a l'accueil
header("location:../index.php");