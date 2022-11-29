<?php 
session_start();
if (!$_SESSION['autoriser'])
{
 header("location:../index.php");
}
require '../includes/head.php'; 
require_once("../codePHP/connexion.php");

//la requette pour affichez la liste des annee sccolaires
$req=$pdo->prepare("SELECT * FROM classe");
$req->execute();

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
<h3 class="page-title">Ajouter Année !</h3>

</div>
</div>
</div>
<body>

<div class="main-wrapper">
<div class="card-body">
<div class="table-responsive">
<table class="datatable table table-stripped">
<thead>
<tr style="background-color:rgba(0,11,200,.3);">
<th>nom</th>
<th>description</th>
<th>nombre d'élève</th>
<th>Montant annuel</th>
<th>action</th>
<th>action</th>

</tr>
</thead>
<tbody align="center">

<?php foreach($req as $resultat){ ?>
<tr>
<td><?php echo $resultat['nomClasse']; ?></td>
<td><?php echo $resultat['description']; ?></td>
<td><?php echo $resultat['nbre_par_classe']; ?></td>
<td><?php echo $resultat['montant_annuelle']; ?></td>
<td><a href="editerClasse.php?id_classe=<?php echo $resultat['id_classe']; ?>"><input type="submit" class="btn btn-primary" value="Editer"></a></td>
<td><a href="ajouterClasse.php"><input type="submit" class="btn btn-success" value="Nouveau"></a></td>
</tr>
<?php } ?>

</tbody>
</table>
</div>
</div>
</div>


<footer>
<p>Pour tout probleme contacter le 92-85-99-00(Mohamed kounady)</p>
</footer>

</div>

</div>


<script src="../assets/js/jquery-3.6.0.min.js"></script>

<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="../assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/plugins/datatables/datatables.min.js"></script>

<script src="../assets/js/script.js"></script>
</body>
</html>