<?php 
session_start();
if (!$_SESSION['autoriser'])
{
 header("location:../index.php");
}
require '../includes/head.php'; 
require_once("../codePHP/connexion.php");

//les projections nombre d'eleves 
$nbreeleve=$pdo->prepare("SELECT count(*) FROM eleve");
$nbreeleve->execute();
$nbreeleves=$nbreeleve->fetchColumn();

//les projections nombre d'inscrit
$nbreinscrit=$pdo->prepare("SELECT  count(*) FROM inscription");
$nbreinscrit->execute();
$nbreinscrits=$nbreinscrit->fetchColumn();


//les projections nombre d'annee scolaire
$nbreannee=$pdo->prepare("SELECT  count(*) FROM annee_scolaire");
$nbreannee->execute();
$nbreannees=$nbreannee->fetchColumn();

//les projections nombre de classe
$nbreclasse=$pdo->prepare("SELECT  count(*) FROM classe");
$nbreclasse->execute();
$nbreclasses=$nbreclasse->fetchColumn();

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


<a class="mobile_btn" id="mobile_btn">
<i class="fas fa-bars"></i>
</a>


<?php  require '../includes/sous.php'; ?>

</div>
<?php  require '../includes/nav.php'; ?>
<div class="page-wrapper">
<div class="content container-fluid">

<div class="page-header">
<div class="row">
<div class="col-sm-12">
<h3 class="page-title">Bienvenue <?php echo $_SESSION['pseudo']; ?>!</h3>
<ul class="breadcrumb">
<li class="breadcrumb-item active">Tableau de Bord</li>
</ul>
</div>
</div>
</div>


<div class="row">
<div class="col-xl-3 col-sm-6 col-12 d-flex">
<div class="card bg-one w-100">
<div class="card-body">
<div class="db-widgets d-flex justify-content-between align-items-center">
<div class="db-icon">
<i class="fas fa-user-graduate"></i>
</div>
<div class="db-info">
<h3><?php echo $nbreeleves; ?></h3>
<h6>Etudiants</h6>
</div>
</div>
</div>
</div>
</div>
<div class="col-xl-3 col-sm-6 col-12 d-flex">
<div class="card bg-two w-100">
<div class="card-body">
<div class="db-widgets d-flex justify-content-between align-items-center">
<div class="db-icon">
<i class="fas fa-chalkboard-teacher"></i>
</div>
<div class="db-info">
<h3><?php echo $nbreinscrits; ?></h3>
<h6>Inscrit</h6>
</div>
</div>
</div>
</div>
</div>
<div class="col-xl-3 col-sm-6 col-12 d-flex">
<div class="card bg-three w-100">
<div class="card-body">
<div class="db-widgets d-flex justify-content-between align-items-center">
<div class="db-icon">
<i class="fas fa-building"></i>
</div>
<div class="db-info">
<h3><?php echo $nbreannees; ?></h3>
<a href="filieres.php"><h6>Année scolaire</h6></a>
</div>
</div>
</div>
</div>
</div>
<div class="col-xl-3 col-sm-6 col-12 d-flex">
<div class="card bg-four w-100">
<div class="card-body">
<div class="db-widgets d-flex justify-content-between align-items-center">
<div class="db-icon">
<i class="fas fa-file-invoice-dollar"></i>
</div>
<div class="db-info">
<h3><?= $nbreclasses; ?></h3>
<h6>nombre de classe</h6>
</div>
</div>
</div>
</div>
</div>
</div>



  <footer class="text-center">
    <p>Pour tout probleme contacter le 92-85-99-00(Mohamed kounady)</p>
  </footer>

</div>

</div>
<script type="application/javascript">
        function tableSearch() {
            let input,filter,table,tr,td,txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");

            for(let i = 0; i < tr.length; i++){
                td = tr[i].getElementsByTagName("td")[1];
                if(td){
                    txtValue = td.textContent || td.innerText;
                    if(txtValue.toUpperCase().indexOf(filter) > -1){
                        tr[i].style.display = "";
                    }
                    else{
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>

<script src="../assets/js/jquery-3.6.0.min.js"></script>

<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="../assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script src="../assets/plugins/apexchart/apexcharts.min.js"></script>
<script src="../assets/plugins/apexchart/chart-data.js"></script>
<script src="../assets/plugins/datatables/datatables.min.js"></script>

<script src="../assets/js/script.js"></script>
</body>
</html>