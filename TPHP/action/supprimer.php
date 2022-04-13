<?php
include_once "../config.php";
$id = filter_input(INPUT_GET, "id");
$pdo = new PDO("mysql:host=".Config::SERVEUR.";dbname=".Config::BDD, Config::UTILISATEUR, Config::MOTDEPASSE);
$req=$pdo->prepare("delete from releve where id=:id");
$req->bindParam(":id",$id);
$req->execute();
$id=$pdo->lastInsertId();

//redirection vers la page d'accueil
header("location:../index.php");