<?php 
	require_once("connexion.php");

	if (isset($_POST['update'])) 
    {
    if (!empty($_POST['nom']) and !empty($_POST['prenom'])  and !empty($_POST['adresse']) and !empty($_POST['np_pere']) and !empty($_POST['tel_parent'])  and !empty($_POST['date_nais']) and !empty($_POST['sex'])) 
    {
    //variable retrieval
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $telephone = $_POST['telephone'];
    $adresse = $_POST['adresse'];
    $np_pere = htmlspecialchars($_POST['np_pere']);
    $np_mere = htmlspecialchars($_POST['np_mere']);
    $tel_parent = $_POST['tel_parent'];
    $lieuxtravailPere = $_POST['lieuxtravailPere'];
    $lieuxtravailMere = $_POST['lieuxtravailMere'];
    $date_nais = $_POST['date_nais'];
    $sex = $_POST['sex'];
    $date_enregister = date("Y-m-s");
        
        

    $insert = $pdo->prepare("UPDATE eleve SET nom=?,prenom=?,telephone=?,adresse=?,np_mere=?,np_pere=?,tel_parent=?,lieuxtravailPere=?,lieuxtravailMere=?,date_nais=?,sex=?,date_enregister=? WHERE id_eleve=? ");
    $insert->execute(array($nom,$prenom,$telephone,$adresse,$np_mere,$np_pere,$tel_parent,$lieuxtravailPere,$lieuxtravailMere,$date_nais,$sex,$date_enregister,$id_eleve));

    $succes = "Elève Mise à jour avec sucssè !";

    }else{ $error = "Veuillez remplire tous les champs!";}

    }
	
?>