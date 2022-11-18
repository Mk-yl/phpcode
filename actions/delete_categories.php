<?php

$id=filter_input(INPUT_POST,"id");

include "../config.php";
$pdo = new PDO("mysql:host=".config::SERVEUR.";dbname=".config::BDD
    ,config::UTILISATEUR,config::MOTDEPASSE);

$requete = $pdo->prepare("delete from categories where id=:id");

$requete->bindParam(":id",$id);

$requete->execute();

header("location:../index.php");