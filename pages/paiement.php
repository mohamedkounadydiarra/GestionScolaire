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
 if(isset($_POST['recherche']))
{
 if(!empty($_POST['id_eleve']) || !empty($_POST['id_annee_scolaire']) || !empty($_POST['id_classe'])){
 $id_eleve = $_POST['id_eleve'];
 $id_annee_scolaire = $_POST['id_annee_scolaire'];
 $id_classe = $_POST['id_classe'];
 $select = $pdo->prepare("
 SELECT DISTINCT 
 eleve.id_eleve,
 eleve.nom,
 eleve.prenom,
 eleve.telephone,
 annee_scolaire.id_annee_scolaire,
 classe.id_classe,
 annee_scolaire.nom_annee,
 classe.nomClasse,
 id_inscription,
 frais_inscription,
 date_inscription
 FROM inscription
 INNER JOIN eleve ON eleve.id_eleve = inscription.id_eleve
 INNER JOIN annee_scolaire ON annee_scolaire.id_annee_scolaire = inscription.id_annee_scolaire
 INNER JOIN classe ON classe.id_classe = inscription.id_classe
 WHERE eleve.id_eleve= ? || annee_scolaire.nom_annee=? || classe.nomClasse=? 
 ");
 $select->execute(array($id_eleve,$id_annee_scolaire,$id_classe));
 
  }
}else{
 $select = $pdo->prepare("
 SELECT 
 eleve.id_eleve,
 eleve.nom,
 eleve.prenom,
 eleve.telephone,
 annee_scolaire.nom_annee,
 classe.nomClasse,
 id_inscription,
 frais_inscription,
 date_inscription
 FROM inscription
 INNER JOIN eleve ON eleve.id_eleve = inscription.id_eleve
 INNER JOIN annee_scolaire ON annee_scolaire.id_annee_scolaire = inscription.id_annee_scolaire
 INNER JOIN classe ON classe.id_classe = inscription.id_classe


 ");
 $select->execute();
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

   <input type="text"  name="id_annee_scolaire" class="form-control">

</div>
</div>


<div class="col-12 col-sm-6">
<div class="form-group">
<label>classe</label>
<input type="text" name="id_classe" class="form-control">
</div>
</div>

<div class="col-12 col-sm-6">
<div class="form-group">
<label></label>
<input class="form-control btn btn-primary" name="recherche" type="submit" value="Recherche">
</div>
</div>
<table class="datatable table table-stripped">
<thead>
<tr style="background-color:rgba(0,11,200,.3);">
<th>code</th>
<th>Nom</th>
<th>prenom</th>
<th>annee</th>
<th>classe</th>
<th>Frais</th>
<th>action</th>
<th>action</th>
<th>action</th>
</tr>
</thead>
<tbody>

<?php foreach($select as $resultat){ ?>
<tr>
<td><?php echo $resultat['id_eleve']; ?></td>
<td><?php echo $resultat['nom']; ?></td>
<td><?php echo $resultat['prenom']; ?></td>
<td><?php echo $resultat['nom_annee']; ?></td>
<td><?php echo $resultat['nomClasse']; ?></td>
<td><?php echo $resultat['frais_inscription']; ?></td>
<td><a href="editerInscription.php?id_inscription=<?php echo $resultat['id_inscription']; ?>" onclick="return confirm('Voulez-vous vraiment modifier ce élément?');">Editer</a></td>
<td><a href="enregisterpaiement.php?id_inscription=<?php echo $resultat['id_inscription']; ?>" onclick="return confirm('Voulez-vous effectuer ce paiement?');">Payer</a></td>
<td><a href="detailInsccription.php?id_inscription=<?php echo $resultat['id_inscription']; ?>" onclick="return confirm('Voulez-vous vraiment voir la fiche de cet élève?');">Fiche</a></td>
</tr>
<?php } ?>

</tbody>
</table>
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