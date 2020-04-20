<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6"> -->
    <title><?= App\App::getSiteTitle(); ?></title>

    <!-- DataTables -->
  <link rel="stylesheet" href="../pages/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../pages/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Ionicons -->
  <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
  

   
    <!-- Custom styles for this template -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">

    <style>

      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      /* Show it is fixed to the top */
      body {
        min-height: 75rem;
        padding-top: 4.5rem;
      }
      .container {
        width: auto;
        /*max-width: 680px;*/
        /*padding: 0 15px;*/
      }
      /* CSS du formu carte visa */
      .container {
        max-width: 960px;
      }

      .lh-condensed { line-height: 1.25; }

      
      </style>
  </head>


  <body>

    <?php require 'nav-menu.php'; ?>

    <main role="main" class="container">

      <div class="starter-template">
        <?= $content ?>
      </div>



    </main><!-- /.container -->

      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2017-2019 Company Name</p>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="#">Privacy</a></li>
          <li class="list-inline-item"><a href="#">Terms</a></li>
          <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
      </footer>

      <script src="bootstrap/js/bootstrap.min.js"></script> 
      <script type="text/javascript" src="../pages/js/form-validation.js"></script>

      <script src="bootstrap/js/jquery.js"></script>
      <script src="bootstrap/js/bootstrap.bundle.min.js" ></script>

      <!-- DataTables -->
<script src="../pages/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../pages/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../pages/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../pages/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
      
      


  </body>
</html>
