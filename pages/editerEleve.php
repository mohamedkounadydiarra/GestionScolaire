<?php 
// la securisation de la page par la session
session_start();
if (!$_SESSION['autoriser'])
{
 header("location:../index.php");
}
require '../includes/head.php'; 

//reccuperation de l'id par url
$id_eleve = $_GET['id_eleve'];

require '../codePHP/modifierEleve.php';

//la requette pour affichez les encianne valeurs
$encian = $pdo->prepare("SELECT * from eleve WHERE id_eleve = ?");
$encian->execute(array($id_eleve));

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
<h3 class="page-title">Ajouter Eleve</h3>
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
    window.location = "listeEleve.php";}, 2000);
 </script>
<?php } ?>


<?php foreach($encian as $resultat){ ?>

<div class="row">
<div class="col-12 col-sm-6">
<div class="form-group">
<label>Nom</label>
<input type="text" name="nom" value="<?php echo $resultat['nom']; ?>" required class="form-control">
</div>
</div>

<div class="col-12 col-sm-6">
<div class="form-group">
<label>Prenom</label>
<input type="text" name="prenom" value="<?php echo $resultat['prenom']; ?>" required class="form-control">
</div>
</div>

<div class="col-12 col-sm-6">
<div class="form-group">
<label>Tel</label>
<input type="text" name="telephone" value="<?php echo $resultat['telephone']; ?>" class="form-control">
</div>
</div>

<div class="col-12 col-sm-6">
<div class="form-group">
<label>Adresse</label>
<input type="text" name="adresse" value="<?php echo $resultat['adresse']; ?>" required class="form-control">
</div>
</div>

<div class="col-12 col-sm-6">
 <div class="form-group">
<label>Date naissance</label>
<input type="date" name="date_nais" value="<?php echo $resultat['date_nais']; ?>" required class="form-control">
</div>
</div>

<div class="col-12 col-sm-6">
 <div class="form-group">
<label>Sex</label>
<select class="form-control" name="sex"  required>
    <option value="0" selected="true" disabled>SELECT</option>
    <option>Masculin</option>
    <option>Feminin</option>v
</select>
</div>
</div>

<div class="col-12">
<h5 class="form-title" style="color:orange;"><span >Details</span></h5>
</div>

<div class="col-12 col-sm-6">
<div class="form-group">
<label>Nom_prenom père</label>
<input type="text" name="np_pere" value="<?php echo $resultat['np_pere']; ?>" required class="form-control">
</div>
</div>

<div class="col-12 col-sm-6">
<div class="form-group">
<label>Nom_prenom mère</label>
<input type="text" name="np_mere" value="<?php echo $resultat['np_mere']; ?>" required class="form-control">
</div>
</div>

<div class="col-12 col-sm-6">
<div class="form-group">
<label>Tel Parent</label>
<input type="text" name="tel_parent" value="<?php echo $resultat['tel_parent']; ?>" required class="form-control">
</div>
</div>

<div class="col-12 col-sm-6">
<div class="form-group">
<label>Travail Père</label>
<input class="form-control" value="<?php echo $resultat['lieuxtravailPere']; ?>" required name="lieuxtravailPere" type="text">
</div>
</div>




<div class="col-12 col-sm-6">
<div class="form-group">
<label></label>
<input class="form-control btn btn-primary" name="update" type="submit" value="Metre à jour">
</div>
</div>

<div class="col-12 col-sm-6">
<div class="form-group">
<label>Travail Mère</label>
<input class="form-control" value="<?php echo $resultat['lieuxtravailMere']; ?>" required name="lieuxtravailMere" type="text">
</div>
</div>
<?php } ?>


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