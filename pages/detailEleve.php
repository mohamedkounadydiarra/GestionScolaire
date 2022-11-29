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

$id_eleve = $_GET['id_eleve'];

// la requette pour la liste ccomplet de leleve avec parent
$req = $pdo->prepare("SELECT * FROM eleve WHERE id_eleve=?");
$req->execute(array($id_eleve));



?>


<?php foreach($req as $resultat){ ?>

<div class="header-left">
<div class="page-wrapper">
<div class="content container-fluid">
<div class="page-header">
<div class="row">
<div class="col">
<h2 style="background-color: gray; color:white;"><center>Fiche d'enregistrement:(Union) </center></h2>
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
<h6 class="text-muted">Adress:<?php echo $resultat['adresse']; ?></h6>
<h6 class="text-muted">Date de naissancce: <?php echo $resultat['date_nais']; ?></h6>
<h6 class="text-muted">Enregister le: <?php echo $resultat['date_enregister']; ?></h6>


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
<span>Details Parents</span>
</h5>
<div class="row">
<p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Père</p>
<p class="col-sm-9"> <?php echo $resultat['np_pere']; ?></p>
</div>
<div class="row">
<p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Mere</p>
<p class="col-sm-9"><?php echo $resultat['np_mere']; ?></p>
</div>
<div class="row">
<p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Telephone</p>
<p class="col-sm-9"><?php echo $resultat['tel_parent']; ?></p>
</div>
<div class="row">
<p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Travail Père</p>
<p class="col-sm-9"><?php echo $resultat['lieuxtravailPere']; ?></p>
</div>
<div class="row">
<p class="col-sm-3 text-muted text-sm-end mb-0">Travail Mère</p>
<p class="col-sm-9 mb-0"><?php echo $resultat['lieuxtravailMere']; ?></p>
</div>
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
<a href="listeEleve.php">Retourner</a>
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