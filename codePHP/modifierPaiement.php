<?php 

   require_once("connexion.php");

   if (isset($_POST['update'])) 
    {
    if (!empty($_POST['coperative_cgs'])) 
    {
    //variable retrieval
    $octobre = $_POST['octobre'];
    $novembre = $_POST['novembre'];
    $decembre = $_POST['decembre'];
    $janvier = $_POST['janvier'];
    $fevrier = $_POST['fevrier'];
    $mars = $_POST['mars'];
    $avril = $_POST['avril'];
    $mai = $_POST['mai'];
    $juin = $_POST['juin'];
    $juillet = $_POST['juillet'];
    $coperative_cgs = $_POST['coperative_cgs'];
    $date_enregister = date("Y-m-s");
    $id_eleve=$_POST['id_eleve'];
    $id_inscription = $_POST['id_inscription'];
     

   //la requette d'enregistrement dun paiement du mois

    $insert = $pdo->prepare("UPDATE  paiement SET octobre=?,novembre=?,decembre=?,janvier=?,fevrier=?,mars=?,avril=?,mai=?,juin=?,juillet=?,coperative_cgs=?,id_inscription=?,id_eleve=?,date_enregister=?,id_user=? WHERE id_paiement = ?");
    $insert->execute(array($octobre,$novembre,$decembre,$janvier,$fevrier,$mars,$avril,$mai,$juin,$juillet,$coperative_cgs,$id_inscription,$id_eleve,$date_enregister,$_SESSION['id_user'],$id_paiement));


    $succes = "Paiement mise à jour avec sucssè !";

    }else{ $error = "Veuillez payer les frais de coperative_cgs";}

    }
   
?>