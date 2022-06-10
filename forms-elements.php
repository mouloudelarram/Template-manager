<?php
 session_start();
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Envoyer mail - Sending mails</title>
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

     

      <li class="nav-item">
        <a class="nav-link collapsed"  href="forms-elements.php">
          <i class="bi bi-journal-text"></i><span>Envoyer un e-mail</span>
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
      <h1>Envoyer un mail</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          
          <li class="breadcrumb-item active">Envoyer un mail</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Envoyer un mail</h5>
                <!-- zizo  -->
              <form action="code.php" method="post" enctype="multipart/form-data">
                   <div class=" row mb-3" >
                  
                  <label for="inputNumber" class="col-sm-2 col-form-label">Importer un nouveau fichier excel (.csv)</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" id="formFile" name="file">
                  </div>
                </div>
                <input type="submit" name='test' Value='Importer'>
</form>
              <!-- General Form Elements-->
              <form action="phpmailer/index.php" method="post" enctype="multipart/form-data">
              <?php
if(isset($_COOKIE["csv"])) {  echo "<div class='alert alert-danger' role='alert'>
  ".$_COOKIE["csv"]."
</div>" ;} ?>
<?php
if(isset($_COOKIE["sent"])) {  echo "<div class='alert alert-success' role='alert'>
  ".$_COOKIE["sent"]."
</div>" ;} ?>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">A:</label>
                  <div class="col-sm-10">
                  <div class="form-check">
  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" onclick="check1()" checked>
  <label class="form-check-label" for="flexRadioDefault1">
    Un seul personne
  </label>
</div>
<div class="form-check">
  <input  class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" onclick="check2()">
  <label class="form-check-label" for="flexRadioDefault2" >
    Plusieurs personnes
  </label>
</div>
                    <input type="email" class="  form-control" id="input1" name="recepteur" placeholder="Ecrire l'adresse e-mail">
                   <div class=" row mb-3" id="excel1">
                   



                    <!-- <form action="code.php" method="post" enctype="multipart/form-data">
                   <div class=" row mb-3" >
                  
                  <label for="inputNumber" class="col-sm-2 col-form-label">etpe 1 (.csv)</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" id="formFile" name="file">
                  </div>
                </div>
                <input type="submit" name='test' Value='Importer'>
</form> -->






                  <label for="inputNumber" class="col-sm-2 col-form-label">etape 2</label>


                  <div class="col-sm-10">
                    <input class="form-control" type="file" id="formFile" name="file">
                  </div>
                </div>
              </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label">De:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="from" value="Test@test.com">
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Mot de passe d'e-mail:</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" name="password" value="Test@test.com">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Objet:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="objet" value="<?php
if(isset($_COOKIE["objet"])) {  echo $_COOKIE["objet"] ;} ?>">

                  </div>
                </div>
               
               
               

                

                <div class="form-group">
            <label for="name">Message</label>
            <textarea class="form-control" name="message" rows="10" placeholder="Rédiger votre message"  required><?php
if(isset($_COOKIE["message"])) {
  
  echo $_COOKIE["message"] ;
} 
?></textarea>
          </div>

             

                <div class="row mb-3">
                  
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary" name="envoyer">Envoyer</button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>

    </section>

  </main><!-- End #main -->
  
 

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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