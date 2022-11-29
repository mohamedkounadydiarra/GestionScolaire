<?php 
// la securisation de la page par la session
session_start();
if (!$_SESSION['autoriser'])
{
 header("location:../index.php");
}
require '../includes/head.php'; 
require '../codePHP/fairepaiement.php';

$id_inscription = $_GET['id_inscription'];

$et = $pdo->prepare("
 SELECT  
 eleve.id_eleve,
 id_inscription
 FROM inscription
 INNER JOIN eleve ON eleve.id_eleve = inscription.id_eleve
 WHERE inscription.id_inscription= ?
 ");
 $et->execute(array($id_inscription));


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
<h3 class="page-title">Effectuer un paiement</h3>

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
    window.location = "listepaiement.php";}, 2000);
 </script>
<?php } ?>


<?php foreach($et as $ets){ ?>
<div class="row">
<div class="col-12 col-sm-6">
<div class="form-group">
<label>code Inscription</label>
<input type="text" readonly value="<?php echo $ets['id_inscription']; ?>" maxlength="30" minlength="2" name="id_inscription" required class="form-control">
</div>
</div>



<div class="col-12 col-sm-6">
<div class="form-group">
<label>Code eleve</label>
<input type="text" readonly value="<?php echo $ets['id_eleve']; ?>" name="id_eleve" maxlength="40" minlength="2" required class="form-control">
</div>
</div>
<?php } ?>
<div class="col-12 col-sm-6">
<div class="form-group">
<label>CGS coperative</label>
<input type="number" maxlength="4"  name="coperative_cgs" required class="form-control">
</div>
</div>

<div class="col-12 col-sm-6">
<div class="form-group">
<label>Octobre</label>
<input type="text" minlength="2" maxlength="30"  name="octobre"  class="form-control">
</div>
</div>

<div class="col-12 col-sm-6">
 <div class="form-group">
<label>avril</label>
<input type="number" name="avril"  class="form-control">
</div>
</div>

<div class="col-12 col-sm-6">
 <div class="form-group">
<label>Novembre</label>
<input type="number" name="novembre"  class="form-control">
</div>
</div>

<div class="col-12">
<h5 class="form-title" style="color:orange;"><span >Details</span></h5>
</div>

<div class="col-12 col-sm-6">
<div class="form-group">
<label>mai</label>
<input type="number" maxlength="35" minlength="2" name="mai"   class="form-control">
</div>
</div>

<div class="col-12 col-sm-6">
<div class="form-group">
<label>Decembre</label>
<input type="number" maxlength="35" minlength="2" name="decembre"  class="form-control">
</div>
</div>

<div class="col-12 col-sm-6">
<div class="form-group">
<label>juin</label>
<input type="number" name="juin"  class="form-control">
</div>
</div>

<div class="col-12 col-sm-6">
<div class="form-group">
<label>janvier</label>
<input class="form-control"  name="janvier" type="number">
</div>
</div>

<div class="col-12 col-sm-6">
<div class="form-group">
<label>juillet</label>
<input class="form-control"  name="juillet" type="number">
</div>
</div>

<div class="col-12 col-sm-6">
<div class="form-group">
<label>fevrier</label>
<input class="form-control"  name="fevrier" type="number">
</div>
</div>


<div class="col-12 col-sm-6">
<div class="form-group">
<label></label>
<input class="form-control btn btn-primary" name="payer" type="submit" value="Paiement">
</div>
</div>


<div class="col-12 col-sm-6">
<div class="form-group">
<label>mars</label>
<input class="form-control"  name="mars" type="number">
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