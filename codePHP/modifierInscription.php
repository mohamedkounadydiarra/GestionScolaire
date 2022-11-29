<?php 
	require_once("connexion.php");
	
	if (isset($_POST['update'])) 
	{

	if(!empty($_POST['frais_inscription']) and !empty($_POST['id_classe']) and !empty($_POST['id_eleve']) and !empty($_POST['id_annee_scolaire']))	
	{
	// la recuperation des variable 

	$frais_inscription = htmlspecialchars($_POST['frais_inscription']);
	$id_classe = htmlspecialchars($_POST['id_classe']);
	$id_eleve = htmlspecialchars($_POST['id_eleve']);
	$id_annee_scolaire = htmlspecialchars($_POST['id_annee_scolaire']);
	$date_inscription = date("Y-m-s");


	//la requette d'insertion dans la base de donnée

	$req = $pdo->prepare("UPDATE inscription SET frais_inscription=?,date_inscription=?,id_eleve=?,id_annee_scolaire=?,id_classe=?,id_user=? ");
	$req->execute(array($frais_inscription,$date_inscription,$id_eleve,$id_annee_scolaire,$id_classe,$_SESSION['id_user']));

	$succes="eleve mise à jour avec sucssè !";

    }else{ $error = "Tous les champs doivent etre remplis !"; }

    }
?>