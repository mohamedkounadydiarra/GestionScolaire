<?php 
// la securisation de la page par la session

session_start();
if (!$_SESSION['autoriser'])
{
 header("location:../index.php");
}
require '../includes/head.php'; 
require_once("../codePHP/connexion.php");

//la requette des menus deroulants(annee scolaire)
$req = $pdo->prepare("SELECT * FROM annee_scolaire");
$req->execute();

//la requette pour la classe le menu deroulant
$classe = $pdo->prepare("SELECT * FROM classe");
$classe->execute();

//la barre de recherche

if (isset($_POST['recherche'])) 
{
   $id_eleve = $_POST['id_eleve'];
   $nomClasse = $_POST['nomClasse'];
   $nom_annee = $_POST['nom_annee'];
   

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

WHERE eleve.id_eleve = ? OR annee_scolaire.nom_annee=? OR classe.nomClasse=?


   ");
$liste->execute(array($id_eleve,$nom_annee,$nomClasse));

}else{
   //la requette par defaut

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


   ");
$liste->execute();
}



?>
<div class="header">

<div class="header-left">
<a href="index.html" class="logo">
<img src="../assets/img/logo.png" alt="Logo">
</a>
<a href="index.html" class="logo logo-small">
<img src="../assets/img/logo-small.png" alt="Logo" width="30" height="30">
</a>
</div>

<a href="javascript:void(0);" id="toggle_btn">
<i class="fas fa-align-left"></i>
</a>

<div class="top-nav-search">
<form>
<input type="text" class="form-control" placeholder="Search here">
<button class="btn" type="submit"><i class="fas fa-search"></i></button>
</form>
</div>


<a class="mobile_btn" id="mobile_btn">
<i class="fas fa-bars"></i>
</a>


<?php  require '../includes/sous.php'; ?>

</div>
<?php  require '../includes/nav.php'; ?>


<div class="page-wrapper">
<div class="content container-fluid">

<div class="page-header">
<div class="row align-items-center">
<div class="col">
<h3 class="page-title"> Liste des paiements !</h3>
</div>
</div>
</div>

<div class="row">
<div class="col-sm-12">
<div class="card">
<div class="card-body">
<form method="POST">

<!-- la gestion des error et sucess -->

<?php if(isset($error)){ ?>
<div class="container" style="background-color: #FA8072;">
    <p style="color:white;"><?php echo $error; ?></p>
</div>



<?php } ?>

<?php if(isset($succes)){ ?>
<div class="container" style="background-color: #32CD32;">
    <p style="color:white;"><?php echo $succes; ?></p>
</div>

 <script>    
    setTimeout(function(){
    window.location = "listeInscription.php";}, 2000);
 </script>
<?php } ?>



<div class="row">
<div class="col-12 col-sm-6">
<div class="form-group">
<label>Code élève</label>
<input type="number"  name="id_eleve" class="form-control">
</div>
</div>


<div class="col-12 col-sm-6">
<div class="form-group">
<label>Annee scolaire</label>
   <input type="text"   name="nom_annee" class="form-control">

</div>
</div>


<div class="col-12 col-sm-6">
<div class="form-group">
<label>classe</label>
<input type="text" name="nomClasse" class="form-control">
</div>
</div>

<div class="col-12 col-sm-6">
<div class="form-group">
<label></label>
<input class="form-control btn btn-primary" name="recherche" type="submit" value="Recherche">
</div>
</div>

<div class="col-auto text-end float-end ms-auto">
<a href="paiement.php" class="btn btn-primary"><i class="fas fa-plus"></i></a>
</div>

</div>
<div class="col-sm-12" style="margin-top:20px;">

<div class="card card-table" >
<div class="card-body">
<div class="table-responsive">
<table class="datatable table table-stripped">
<thead  style="background-color:rgba(110, 0, 0,.1);">
<tr>
<th>CODE</th>
<th>NOM</th>
<th>PRENOM</th>
<th>ANNEE</th>
<th>CLASSE</th>
<th>OCTOBRE</th>
<th>NOVEMBRE</th>
<th>DECEMBRE</th>
<th>JANVIER</th>
<th>FEVRIER</th>
<th>MARS</th>
<th>AVRIL</th>
<th>MAI</th>
<th>JUIN</th>
<th>JUILLET</th>
<th>COPERATIVE_CGS</th>
<th>DATE ENGISTREMENT</th>
<th class="text-end">Action</th>
<th class="text-end">Action</th>
</tr>
</thead>

<tbody align="center">

<?php foreach($liste as $resultat){ ?>

<tr>
<td> <?php echo $resultat['id_eleve']; ?> </td>
<td> <?php echo $resultat['nom']; ?> </td>
<td> <?php echo $resultat['prenom']; ?> </td>
<td> <?php echo $resultat['nom_annee']; ?> </td>
<td> <?php echo $resultat['nomClasse']; ?> </td>
<td> <?php echo $resultat['octobre']; ?> </td>
<td> <?php echo $resultat['novembre']; ?> </td>
<td> <?php echo $resultat['decembre']; ?> </td>
<td> <?php echo $resultat['janvier']; ?> </td>
<td> <?php echo $resultat['fevrier']; ?> </td>
<td> <?php echo $resultat['mars']; ?> </td>
<td> <?php echo $resultat['avril']; ?> </td>
<td> <?php echo $resultat['mai']; ?> </td>
<td> <?php echo $resultat['juin']; ?> </td>
<td> <?php echo $resultat['juillet']; ?> </td>
<td> <?php echo $resultat['coperative_cgs']; ?> </td>
<td> <?php// echo $resultat['date_enregister']; ?> </td>

<td><a href="editerPaiement.php?id_paiement=<?php echo $resultat['id_paiement']; ?>" onclick="return confirm('Voulez-vous vraiment mettre à jour ce élément?');">Metre à jour </a></td>

<td><a href="detailPaiement.php?id_paiement=<?php echo $resultat['id_paiement']; ?>" onclick="return confirm('Voulez-vous vraiment voir la fiche de paiement?');">Fiche </a></td>
</tr>

<?php } ?>

</tbody>
</table>
</div>
</div>
</div>
</div>
</form>
</div>




</div>
</div>
</div>
</div>
</div>
</div>








<script src="../assets/js/jquery-3.6.0.min.js"></script>

<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="../assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script src="../assets/plugins/select2/js/select2.min.js"></script>

<script src="../assets/js/script.js"></script>
</body>
</html>