<?php
$lieu = filter_input(INPUT_POST, "lieu");
$date = filter_input(INPUT_POST, "date");
$resultat = filter_input(INPUT_POST, "resultat");

include_once "../config.php";
$pdo = new PDO("mysql:host=".Config::SERVEUR.";dbname=".Config::BDD, Config::UTILISATEUR, Config::MOT_DE_PASSE);
$req=$pdo->prepare("insert into releve (lieu, date_releve, resultat) values (:lieu, :date; :resultat)");
$req->bindParam(":lieu",$lieu);
$req->bindParam(":date", $date);
$req->bindParam(":resultat", $resultat);
$req->execute();
$id=$pdo->lastinsertion();


//redirection vers la page d'accueil
header("location://dossier");




