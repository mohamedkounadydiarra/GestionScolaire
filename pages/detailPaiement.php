<?php 
// la securisation de la page par la session
session_start();
if (!$_SESSION['autoriser'])
{
 header("location:../index.php");
}
require '../includes/head.php'; 
// require 'includes/sous.php'; 
// require 'includes/nav.php';
require_once("../codePHP/connexion.php");

$id_paiement = $_GET['id_paiement'];


$liste = $pdo->prepare("
SELECT 
id_paiement,
octobre,
novembre,
decembre,
janvier,
fevrier,
mars,
avril,
mai,
juin,
juillet,
coperative_cgs,
inscription.id_inscription,
inscription.frais_inscription,
eleve.id_eleve,
eleve.nom,
eleve.prenom,
classe.id_classe,
classe.nomClasse,
annee_scolaire.id_annee_scolaire,
annee_scolaire.nom_annee
FROM paiement
INNER JOIN inscription ON inscription.id_inscription = paiement.id_inscription
INNER JOIN eleve ON eleve.id_eleve = paiement.id_eleve
INNER JOIN classe ON classe.id_classe = inscription.id_classe
INNER JOIN annee_scolaire ON annee_scolaire.id_annee_scolaire = inscription.id_annee_scolaire

WHERE paiement.id_paiement = ?


   ");
$liste->execute(array($id_paiement));





?>


<?php foreach($liste as $resultat){ ?>

<div class="header-left">
<div class="page-wrapper">
<div class="content container-fluid">
<div class="page-header">
<div class="row">
<div class="col">
<h2 style="background-color: gray; color:white;"><center>Fiche de Paiement:(Union) </center></h2>
<h3 class="page-title">Profil</h3>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="index.html">Detaillé de:</a></li>
<li class="breadcrumb-item active"><?php echo $resultat['nom']; ?>-<?php echo $resultat['prenom']; ?></li>
</ul>
</div>
</div>
</div>

<div class="row">
<div class="col-md-12">
<div class="profile-header">
<div class="row align-items-center">
<div class="col ms-md-n2 profile-user-info">
<h4 class="user-name mb-0">Code:</h4>
<h6 class="text-muted"><?php echo $resultat['id_eleve']; ?></h6>
<h6 class="text-muted">annee_scolaire:<?php echo $resultat['nom_annee']; ?></h6>
<h6 class="text-muted">classe: <?php echo $resultat['nomClasse']; ?></h6>



</div>
</div>
</div>

<div class="tab-content profile-tab-cont">

<div class="tab-pane fade show active" id="per_details_tab">

<div class="row">
<div class="col-lg-9">
<div class="card">
<div class="card-body">
<h5 class="card-title d-flex justify-content-between">
<span>Statut Paiement</span>
</h5>
<div class="row">
<p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">octobre = </p>
<p class="col-sm-9">  <?php echo $resultat['octobre']; ?></p>
</div>
<div class="row">
<p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Novembre = </p>
<p class="col-sm-9"> <?php echo $resultat['novembre']; ?></p>
</div>
<div class="row">
<p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">decembre = </p>
<p class="col-sm-9"><?php echo $resultat['decembre']; ?></p>
</div>
<div class="row">
<p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">janvier = </p>
<p class="col-sm-9"><?php echo $resultat['janvier']; ?></p>
</div>
<div class="row">
<p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">fevrier = </p>
<p class="col-sm-9"><?php echo $resultat['fevrier']; ?></p>
</div>
<div class="row">
<p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">mars = </p>
<p class="col-sm-9"><?php echo $resultat['mars']; ?></p>
</div>
<div class="row">
<p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">avril = </p>
<p class="col-sm-9"><?php echo $resultat['avril']; ?></p>
</div>
<div class="row">
<p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">mai = </p>
<p class="col-sm-9"><?php echo $resultat['mai']; ?></p>
</div>
<div class="row">
<p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">juin = </p>
<p class="col-sm-9"><?php echo $resultat['juin']; ?></p>
</div>
<div class="row">
<p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">juillet = </p>
<p class="col-sm-9"><?php echo $resultat['juillet']; ?></p>
</div>
</div>
<div class="row">
<p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">coperative cgs = </p>
<p class="col-sm-9"><?php echo $resultat['coperative_cgs']; ?></p>
</div>

</div>
</div>
<div class="col-lg-3">

</div>
</div>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
<?php } ?>
<center>
<div class="">
<input type="submit" classe="btn btn-primary" style="background-color:orange;" value="Imprimer" onclick="window.print();">
</div>
<br>
<a href="listePaiement.php">Retourner</a>
</center>
<br>
<br>
<br>


<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="../assets/js/jquery-3.6.0.min.js"></script>

<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="../assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script src="../assets/js/script.js"></script>
</body>
</html>