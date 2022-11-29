<?php 
// la securisation de la page par la session
session_start();
if (!$_SESSION['autoriser'])
{
 header("location:../index.php");
}
require '../includes/head.php'; 
require '../codePHP/modifierEleve.php';


// la requette pour la liste
$req = $pdo->prepare("SELECT * FROM eleve ORDER BY id_eleve DESC");
$req->execute();


//maintenant la requette pour la reccherche dun eleve

if(isset($_POST['recherche']))
{

if (!empty($_POST['id_eleve']) || !empty($_POST['nom']) || !empty($_POST['prenom']) || !empty($_POST['date_nais']) || !empty($_POST['telephone'])) 
{

$id_eleve = $_POST['id_eleve'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$date_nais = $_POST['date_nais'];
$telephone = $_POST['telephone'];

$req = $pdo->prepare("SELECT * FROM eleve WHERE id_eleve=? OR prenom=? OR nom=? OR date_nais=? OR telephone=?");
$req->execute(array($id_eleve,$prenom,$nom,$date_nais,$telephone));

}

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
<h3 class="page-title">Liste Elève</h3>

</div>
<div class="col-auto text-end float-end ms-auto">
<a href="ajouterEleve.php" class="btn btn-primary"><i class="fas fa-plus"></i></a>
</div>
</div>
</div>

<form method="post">
<div class="row">
<div class="col-12 col-sm-6">
<input type="text" name="id_eleve" maxlength="12" placeholder="code" class="form-control"><br>
<input type="text" name="nom" maxlength="45" placeholder="nom" class="form-control"><br>
</div>

<div class="col-12 col-sm-6">
<input type="text" name="prenom" maxlength="45" placeholder="prenom" class="form-control"><br>
<input type="text" name="telephone" maxlength="15" placeholder="telephone" class="form-control"><br>
</div>

<div class="col-12 col-sm-6">
<input type="date" name="date_nais" placeholder="" class="form-control"><br>
</div>

<div class="col-12 col-sm-6">
<input type="submit" value="Recherche" name="recherche"  class="btn btn-primary form-control">
</div>
</form>


<div class="col-sm-12" style="margin-top:20px;">

<div class="card card-table" >
<div class="card-body">
<div class="table-responsive">
<table class="table table-hover table-center mb-0 datatable">
<thead  style="background-color:rgba(110, 0, 0,.1);">
<tr>
<th>CODE</th>
<th>NOM</th>
<th>PRENOM</th>
<th>TEL</th>
<th>ADRESSE</th>
<th>SEX</th>
<th>DATE NAISSANCE</th>
<th class="text-end">Action</th>
<th class="text-end">Action</th>
</tr>
</thead>

<tbody align="center">

<?php foreach($req as $resultat){ ?>

<tr>
<td> <?php echo $resultat['id_eleve']; ?> </td>
<td> <?php echo $resultat['nom']; ?> </td>
<td> <?php echo $resultat['prenom']; ?> </td>
<td> <?php echo $resultat['telephone']; ?> </td>
<td> <?php echo $resultat['adresse']; ?> </td>
<td> <?php echo $resultat['sex']; ?> </td>
<td> <?php echo $resultat['date_nais']; ?> </td>

<td><a href="editerEleve.php?id_eleve=<?php echo $resultat['id_eleve']; ?>" onclick="return confirm('Voulez-vous vraiment modifier ce élément?');">editer </a></td>

<td><a href="detailEleve.php?id_eleve=<?php echo $resultat['id_eleve']; ?>" onclick="return confirm('Voulez-vous vraiment voir les coordonnés des parents?');">plus </a></td>
</tr>

<?php } ?>

</tbody>
</table>
</div>
</div>
</div>
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

<script src="../assets/plugins/datatables/datatables.min.js"></script>

<script src="../assets/js/script.js"></script>
</body>
</html>