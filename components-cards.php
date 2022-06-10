<?php
 session_start();
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Templates - Sending mails</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        
        <span class="d-none d-lg-block">Sending mails</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

       
  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

     

      <li class="nav-item ">
        <a class=" nav-link collapsed"  href="forms-elements.php">
          <i class="bi bi-journal-text"></i><span>Envoyer un email</span>
        </a>
        
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed"  href="components-cards.php">
          <i class="bi bi-layout-text-window-reverse"></i><span>Templates</span></i>
        </a>
        
      </li>
      
      <li class="nav-item">
        <a class="nav-link collapsed"  href="historique.php">
          <i class="bi bi-gem"></i><span>Historique</span></i>
        </a>
     </li> 
      <!-- End Tables Nav -->

      
      <!-- End Blank Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Templates</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          
          <li class="breadcrumb-item active">templates</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Ajouter un template
</button>
    <section class="section">
      <div class="row align-items-top">
        <div class="col-lg-6">

          
          
          <!-- Card with header and footer -->
          <?php
include_once 'connexiondb.php';
$id=$_SESSION['id'];
$query = "SELECT * FROM template WHERE iduser = $id";
$result = mysqli_query($conn,$query);
if($result){
  while($row = mysqli_fetch_assoc($result)){
   echo "
          <div class='card'>
            
            <div class='card-body'>
              <h5 class='card-title'>".$row["objet"]."</h5>
              <form action='code.php' method='post'>
              <input type='text' name='objet' id='del' value='".$row['objet']."'>
              <input type='text' name='message' id='del' value='".$row['message']."'>
              <button type='submit' class='btn btn-primary btn-sm' name='choisir'>Choisir</button></form>
              <form action='code.php' method='post'>
              <input type='text' name='ids' id='del' value='".$row['id']."'>
              <button type='submit' class='btn btn-secondary btn-sm' name='supprimer'>Supprimer</button>
              </form>
              <form action='code.php' method='post'>
              <input type='text' name='objet' id='del' value='".$row['objet']."'>
              <input type='text' name='message' id='del' value='".$row['message']."'>
              <input type='text' name='ids' id='del' value='".$row['id']."'>
              <button type='submit' class='btn btn-primary btn-sm' name='modifier'>Modifier</button></form>
              <form action='code.php' method='post'>
              ".$row["message"]."
            </div>
            
          </div>"; }} ?> <!-- End Card with header and footer -->

</div> 

      </div>
    </section>

  </main><!-- End #main -->

  

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div id="register">
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLabel'>Ajouter un template</h5>
        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
      </div>
      <div class='modal-body'>
      <form action="code.php" method="post"  >
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Objet</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="objet">
          
        </div>
        <div class="form-group">
            <label for="name">Message</label>
            <textarea class="form-control" name="message" rows="10" placeholder="Rédiger votre message" required></textarea>
          </div>

      
        <div class='modal-footer'>
        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Fermer</button>
        <button type='submit' class='btn btn-primary' name="ajouter">Ajouter</button>
      </div>
      </form>
      

    </div>
    </div>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>