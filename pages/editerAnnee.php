<?php 
//seccurise la session tant que tes pas authantifier impossible d'acceder a la passe
session_start();
if (!$_SESSION['autoriser'])
{
 header("location:../index.php");
}
require '../includes/head.php'; 
require '../codePHP/modifierAnnee.php';

//reccuperation de l'id de lannee scolaire
$id_annee_scolaire = $_GET['id_annee_scolaire'];

//la requette pour afficher les anciennes valeurs
$ancien = $pdo->prepare("SELECT * FROM annee_scolaire WHERE id_annee_scolaire = ?");
$ancien->execute(array($id_annee_scolaire));

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
<?php require("../includes/nav.php"); ?>


<div class="page-wrapper">
<div class="content container-fluid">

<div class="page-header">
<div class="row align-items-center">
<div class="col">
<h3 class="page-title">Modifier Année !</h3>

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
<div class="container" style="background-color: #32CD32;;">
	<p style="color:white;"><?php echo $succes; ?></p>
</div>

 <script>    
   setTimeout(function(){
    window.location = "listeAnnee.php";}, 2000);
 </script>
<?php } ?>

<?php foreach($ancien as $resultat){ ?>
<div class="row">
<div class="col-12 col-sm-6">
<div class="form-group">
<label>Nom</label>
<input type="text" name="nom_annee" value="<?php echo $resultat['nom_annee']; ?>" required class="form-control">
</div>
</div>

<div class="col-12 col-sm-6">
<div class="form-group">
<label>Description</label>
<input type="text" name="description" value="<?php echo $resultat['description']; ?>" required class="form-control">
</div>
</div>


<div class="col-12 col-sm-6">
<div class="form-group">
<label></label>
<input class="form-control btn btn-primary" type="submit"  name="update" value="metre à jour">
</div>
</div>
</div>
<?php } ?>

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