<?php 
// la securisation de la page par la session
session_start();
if (!$_SESSION['autoriser'])
{
 header("location:../index.php");
}
require '../includes/head.php'; 
require '../codePHP/inscription.php';

$id_eleve = $_GET['id_eleve'];

//la requette des menus deroulants(annee scolaire)
$req = $pdo->prepare("SELECT * FROM annee_scolaire");
$req->execute();

//la requette pour la classe le menu deroulant
$classe = $pdo->prepare("SELECT * FROM classe");
$classe->execute();

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


<?php  require("../includes/sous.php"); ?>

</div>
<?php  require("../includes/nav.php"); ?>


<div class="page-wrapper">
<div class="content container-fluid">

<div class="page-header">
<div class="row align-items-center">
<div class="col">
<h3 class="page-title">Inscrire un élève !</h3>
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
<input type="number" value="<?php echo $id_eleve; ?>" readonly required name="id_eleve" class="form-control">
</div>
</div>

<div class="col-12 col-sm-6">
<div class="form-group">
<label>Frais d'inscription</label>
<input type="number" required name="frais_inscription" class="form-control">
</div>
</div>


<div class="col-12 col-sm-6">
<div class="form-group">
<label>Annee scolaire</label>
<select class="form-control drowpdown list" name="id_annee_scolaire">
   <option value="0" disabled selected="true">cliquer pour Choisir l'année</option>
   <?php foreach($req as $resultat){ ?>
   <option value="<?php echo $resultat['id_annee_scolaire']; ?>"><?php echo $resultat['nom_annee']; ?></option>
   <?php } ?>
</select>
</div>
</div>


<div class="col-12 col-sm-6">
<div class="form-group">
<label>classe</label>
<select class="form-control" name="id_classe">
   <option value="0" disabled selected="true">cliquer pour Choisir la classe</option>
   <?php foreach($classe as $classes){ ?>
   <option value="<?php echo $classes['id_classe']; ?>"><?php echo $classes['nomClasse']; ?></option>
   <?php } ?>
</select></div>
</div>

<div class="col-12 col-sm-6">
<div class="form-group">
<label></label>
<input class="form-control btn btn-primary" name="enregister" type="submit" value="Inscrire">
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