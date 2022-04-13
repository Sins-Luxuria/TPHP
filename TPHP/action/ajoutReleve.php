<?php
//vérif du token
session_start();
if ($_SESSION["token"]!=filter_input(INPUT_POST,"token")){
    die("C'est pas gentil d'être méchant!");
}
else {
    $_SESSION["token"]=uniqid();
}
$lieu = filter_input(INPUT_POST, "lieu");
$date_releve = filter_input(INPUT_POST,"date");
$resultat = filter_input(INPUT_POST, "donnees");

include_once "../config.php";
$pdo = new PDO("mysql:host=".Config::SERVEUR.";dbname=".Config::BDD, Config::UTILISATEUR, Config::MOTDEPASSE);
$req=$pdo->prepare("insert into releve (lieu, date_releve, resultat) values (:lieu,:date,:resultat)");
$req->bindParam(":lieu",$lieu);
$req->bindParam(":date", $date_releve);
$req->bindParam(":resultat", $resultat);
$req->execute();
$id=$pdo->lastInsertId();


//redirection vers la page d'accueil
header("location:../index.php");