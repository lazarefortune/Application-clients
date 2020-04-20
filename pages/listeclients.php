
<?php



?>

<div class="row">
	

	<div class="col-md-12">
		<h3><b>Liste des clients</b></h3>
		<div class="row">
			<div class="col-md-10">
			</div>
			<div class="col-md-2">
			  <label class="my-1 mr-2" for="inlineFormCustomSelectPref"><b>Trier par : </b></label>
			  <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
			    <option selected>Choisir...</option>
			    <option value="1">One</option>
			    <option value="2">Two</option>
			    <option value="3">Three</option>
			  </select>
		  	</div>
		</div>

		<?php $compt = 1;
		$clients = \App\Table\Client::all();
		?>
			<table class="table">
			  <thead>
			    <tr>
			      <th scope="col">numéro</th>
			      <th scope="col">Nom(s) et prenom(s)</th>
			      <th scope="col">Statut du client</th>

			      <th scope="col">Options</th>
			    </tr>
			  </thead>
			  <tbody>

		<?php  
		foreach ($clients as $cat) : ?>
			    <tr>
			      <th scope="row"><?= $compt; ?></th>
			      <td><?= $cat->getnom() ?> <?= $cat->getprenom() ?></td>
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
			
			  </tbody>
		<?php $compt += 1;
			endforeach; ?>
			</table>
		
		
	</div>
	<div class="card-body">
		
		<div class="card">
            <div class="card-header">
              <h3 class="card-title">DataTable with default features</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
                </tr>
                </thead>

                <tbody>
                <tr>
                  <td>Trident</td>
                  <td>Internet
                    Explorer 4.0
                  </td>
                  <td>Win 95+</td>
                  <td> 4</td>
                  <td>X</td>
                </tr>
                <tr>
                  <td>Misc</td>
                  <td>Lynx</td>
                  <td>Text only</td>
                  <td>-</td>
                  <td>X</td>
                </tr>
            	</tbody>

            	<tfoot>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
                </tr>
                </tfoot>
             </table>
           </div>
         </div>
	</div>

	<section class="content">
      <div class="row">
        <div class="col-12">
          
            
            

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">DataTable with default features</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Trident</td>
                  <td>Internet
                    Explorer 4.0
                  </td>
                  <td>Win 95+</td>
                  <td> 4</td>
                  <td>X</td>
                </tr>
                <tr>
                  <td>Trident</td>
                  <td>Internet
                    Explorer 5.0
                  </td>
                  <td>Win 95+</td>
                  <td>5</td>
                  <td>C</td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
                </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
    </div>
</section>

</div>

<!-- jQuery -->
<script src="admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<!-- <script src="admin/dist/js/adminlte.min.js"></script> -->
<!-- AdminLTE for demo purposes -->
<!-- <script src="admin/dist/js/demo.js"></script> -->
<!-- page script -->
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