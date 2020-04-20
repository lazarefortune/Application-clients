

<div class="wrapper">
  <!-- Navbar -->
 
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  

  <!-- Content Wrapper. Contains page content -->
  <div class="">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><b>Liste des Clients</b></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">MesClients</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          
            
            

          <div class="card">
            
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <?php $compt = 1;
                $clients = \App\Table\Client::all();
                ?>
                <thead>
                <tr>
                  <th>numero</th>
                  <th>Nom(s) et prénom(s)</th>
                  <th>Statut du clients</th>
                  <th>Options</th>
                </tr>
                </thead>
                <tbody>
                <?php  
                foreach ($clients as $cat) : ?>
                <tr>
                  <td><?= $compt; ?></td>
                  <td><?= $cat->getnom() ?> <?= $cat->getprenom() ?>
                  </td>
                  <td>
                    <?php $test = $cat->getstatut_client();
                    if ($test == 'Bon payeur'): ?>  
                      <h5><span class="badge badge-success"><?= $test ?></span></h5>
                    <?php else: ?>
                      <h5><span class="badge badge-danger"><?= $test ?></span></h5>
                    <?php endif; ?>
                  </td>
                  <td>
                    <a href="index.php?p=compteclient&id_client=<?= $cat->getid() ?>"><button class="btn btn-primary">Consulter</button></a>
                    <a href=""><button class="btn btn-danger">Supprimer</button></a>
                  </td>
                </tr>
                <?php $compt += 1;
                endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Numéro</th>
                  <th>Nom(s) et prénom(s)</th>
                  <th>Statut du client</th>
                  <th>Options</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<!-- <script src="../pages/admin/plugins/jquery/jquery.min.js"></script> -->
<!-- Bootstrap 4 -->
<!-- <script src="../pages/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->


