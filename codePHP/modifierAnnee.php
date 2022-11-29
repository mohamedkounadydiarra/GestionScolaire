<?php 
	require_once("connexion.php");
	
	if (isset($_POST['update'])) 
	{

	if(!empty($_POST['nom_annee']) and !empty($_POST['description']))	
	{

	$nom_annee = htmlspecialchars($_POST['nom_annee']);
	$description = htmlspecialchars($_POST['description']);

	//la requette de verification si elle existe pas deja dans la base

	//la requette d'insertion dans la base de donnée

	$req = $pdo->prepare("UPDATE annee_scolaire SET nom_annee=?,description=? where id_annee_scolaire=?");
	$req->execute(array($nom_annee,$description,$id_annee_scolaire));

	$succes="Année Mise à jour avec sucssè !";

    }else{ $error = "Tous les champ doivent etre remplis !"; }

    
	}
?>