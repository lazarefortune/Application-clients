
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

</div>