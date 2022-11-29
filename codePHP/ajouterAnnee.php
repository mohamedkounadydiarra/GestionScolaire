<?php 
	require_once("connexion.php");
	
	if (isset($_POST['enregister'])) 
	{

	if(!empty($_POST['nom_annee']) and !empty($_POST['description']))	
	{

	$nom_annee = htmlspecialchars($_POST['nom_annee']);
	$description = htmlspecialchars($_POST['description']);

	//la requette de verification si elle existe pas deja dans la base
	$exist = $pdo->prepare("SELECT * FROM annee_scolaire WHERE nom_annee = ? || description = ?");
	$exist->execute(array($nom_annee,$description));

	if($exist->rowCount()== 0)
    {
	//la requette d'insertion dans la base de donnée

	$req = $pdo->prepare("INSERT INTO annee_scolaire(nom_annee,description) VALUES(?,?)");
	$req->execute(array($nom_annee,$description));

	$succes="Année creer avec sucssè !";

    }else{ $error = "cette année scolaire ou description existe déjà !"; }

    }

	}
?>