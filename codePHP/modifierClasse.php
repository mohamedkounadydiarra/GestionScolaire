<?php 
	require_once("connexion.php");
	
	//l'id de la classe
	$id_classe = $_GET['id_classe'];
	if (isset($_POST['update'])) 
	{

	if(!empty($_POST['nomClasse']) and !empty($_POST['description']) and !empty($_POST['montant_annuelle']) and !empty($_POST['nbre_par_classe']))	
	{

	$nomClasse = htmlspecialchars($_POST['nomClasse']);
	$description = htmlspecialchars($_POST['description']);
	$montant_annuelle = htmlspecialchars($_POST['montant_annuelle']);
	$nbre_par_classe = htmlspecialchars($_POST['nbre_par_classe']);

	//la requette d'insertion dans la base de donnée

	$req = $pdo->prepare("UPDATE classe SET nomClasse=?,description=?,montant_annuelle=?,nbre_par_classe=? where id_classe=?");
	$req->execute(array($nomClasse,$description,$montant_annuelle,$nbre_par_classe,$id_classe));

	$succes="Classe Mise à jour avec sucssè !";

    }else{ $error = "Tous les champ doivent etre remplis !"; }

    
	}
?>