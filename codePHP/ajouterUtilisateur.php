<?php 
	require_once("connexion.php");
	
	if (isset($_POST['enregister'])) 
	{

	if(!empty($_POST['pseudo']) and !empty($_POST['password']))	
	{

	$pseudo = htmlspecialchars($_POST['pseudo']);
	$password = htmlspecialchars($_POST['password']);
    $password_crypte = sha1($password);

	//la requette de verification si elle existe pas deja dans la base
	$exist = $pdo->prepare("SELECT * FROM user WHERE pseudo = ?");
	$exist->execute(array($pseudo));

	if($exist->rowCount()== 0)
    {
	//la requette d'insertion dans la base de donnée

	$req = $pdo->prepare("INSERT INTO user(pseudo,password) VALUES(?,?)");
	$req->execute(array($pseudo,$password_crypte));

	$succes="utilisateur creer avec sucssè !";

    }else{ $error = "cet utilisateur exist deja !"; }

    }

	}
?>