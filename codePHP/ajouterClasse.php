<?php 
	require_once("connexion.php");
	
	if (isset($_POST['enregister'])) 
	{

	if(!empty($_POST['nomClasse']) and !empty($_POST['description']) and !empty($_POST['montant_annuelle']) and !empty($_POST['nbre_par_classe']))	
	{
	// la recuperation des variable 

	$nomClasse = htmlspecialchars($_POST['nomClasse']);
	$description = htmlspecialchars($_POST['description']);
	$montant_annuelle = htmlspecialchars($_POST['montant_annuelle']);
	$nbre_par_classe = htmlspecialchars($_POST['nbre_par_classe']);

	//la requette de verification si elle existe pas deja dans la base
	$exist = $pdo->prepare("SELECT * FROM classe WHERE nomClasse = ? || description = ?");
	$exist->execute(array($nomClasse,$description));

	if($exist->rowCount()== 0)
    {
	//la requette d'insertion dans la base de donnée

	$req = $pdo->prepare("INSERT INTO classe(nomClasse,description,nbre_par_classe,montant_annuelle) VALUES(?,?,?,?)");
	$req->execute(array($nomClasse,$description,$nbre_par_classe,$montant_annuelle));

	$succes="Classe creer avec sucssè !";

    }else{ $error = "cette classe ou description existe déjà !"; }

    }else{ $error = "Tous les champs doivent etre remplis !"; }

	}
?>