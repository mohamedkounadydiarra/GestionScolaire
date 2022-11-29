<?php 
require 'codePHP/index.php';

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<title>Union</title>

<link rel="shortcut icon" href="assets/img/favicon.png">

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&display=swap">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">

<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="main-wrapper" style="background-color:rgb(240, 240, 240);">
<div class="header">

<div class="header-left">
<a href="index.html" class="logo">
<img src="assets/img/logo.png" alt="Logo">
</a>
<a href="index.html" class="logo logo-small">
<img src="assets/img/logo-small.png" alt="Logo" width="30" height="30">
</a>
</div>

<a href="javascript:void(0);" id="toggle_btn">
<i class="fas fa-align-left"></i>
</a>

<div class="container-scroller" style="margin-top:100px;">
<div class="container-fluid page-body-wrapper full-page-wrapper">
<div class="row w-100 m-0">
<div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
<div class="card col-lg-4 mx-auto">
<div class="card-body px-5 py-5">
<h3 class="card-title text-left mb-3">Login</h3>

<!-- code formulaire -->

<form method="POST"> 

<?php if(isset($error)){ ?>
<div class="container" style="background-color: #FA8072;">
  <p><?php echo $error; ?></p>
</div> 
<?php } ?>   

<div class="form-group">
<label>pseudo *</label>
<input type="pseudo" name="pseudo" autocomplete="off" required class="form-control p_input">
</div>
<div class="form-group">
<label>Mot de passe *</label>
<input type="password" name="password" autocomplete="off" required class="form-control p_input">
</div>
</div>
<div class="text-center">
<input type="submit" name="connexion" class="btn btn-primary btn-block enter-btn" value="Connexion">
</div>                
</form>


</div>
</div>
</div>
          <!-- content-wrapper ends -->
</div>
</div>
</div>




<footer>
<p>Pour tout probleme contacter le 92-85-99-00(Mohamed kounady)</p>
</footer>

</div>

</div>


<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script src="assets/js/form-validation.js"></script>

<script src="assets/js/script.js"></script>
</body>
</html>