<?php
	session_start(); 
	require_once("codePHP/connexion.php");

	if (isset($_POST['connexion'])) 
	{
	if (!empty($_POST['pseudo']) and !empty($_POST['password'])) 
	{
	 //le variable de session

	 $password = $_POST['password'];
	 $pseudo=$_POST['pseudo'];
	 $password_crypter = sha1($_POST['password']);


	//la requette pour verifier si le user existe dans la base de donnée

	$req = $pdo->prepare("SELECT * FROM user WHERE pseudo=? AND password=?");
	$req->execute(array($pseudo,$password_crypter));

	if ($req->rowCount()==1) 
	{
	$_SESSION['autoriser'] = "OUI";
	$resultat = $req->fetch();
	$_SESSION['id_user'] = $resultat['id_user'];
	$_SESSION['pseudo'] = $resultat['pseudo'];
	header("location:pages/dashboard.php");

	}else{ $error = "Mot de passe ou pseudo incorectes"; }

	}
	}
	
?>