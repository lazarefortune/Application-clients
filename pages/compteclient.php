<?php
if (isset($_GET['id_client'])) {
  $client = \App\Table\Client::find($_GET['id_client']);
}

    $db = new PDO('mysql:host=localhost;dbname=business', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // On émet une alerte à chaque fois qu'une requête a échoué.
    

    if(isset($_POST['newclient'])){
      $client1 = new \App\Table\Client;
      $client1->setid($client->getid());
      // var_dump($client);
      // var_dump($_POST);
      // var_dump($client1);
      $client1::hydrater($_POST,$client1);
      // var_dump($client1);
      $manager = new \App\Table\ClientManager($db);
      $manager -> update($client1);
       // $test = \App\Table\Client::find($_GET['id_client']);
       // var_dump($test);
      // die();
      header("Location: index.php?p=compteclient&id_client=".$client1->getid());
      // var_dump($client1);
      // var_dump($manager);
    }

    if (isset($_POST['addpret'])) {
      $_POST['id_client'] = $client->getid();
      $emprunt = new \App\Table\Emprunt;
      $emprunt::hydrater($_POST,$emprunt);
      
      $manager = new \App\Table\ClientManager($db);
      $manager -> addEmprunt($emprunt);

      header("Location: index.php?p=compteclient&id_client=".$client->getid());
    }
?>
<?php 

?>
  <a href="index.php?p=admin" class="btn btn-primary btn-sm">
    retour
  </a>
  <div class="row">

    <div class="col-md-4 order-md-2 mb-4">
      <h4>Liste des emprunts de <b><?= $client->getnom() ?></b> </h4>

      <div class="row shadow bg-white rounded">
           
              
              
            
            
              
             

              <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">montant</th>
                    <th scope="col">date echeance</th>
                    <th scope="col">actions</th>
                  </tr>
                </thead>
                <tbody>
      <?php $compt = 1;
      foreach( App\Table\Emprunt::getLast($client->getid()) as $post) : ?>
                  <tr>
                    <th scope="row"><?= $compt ?></th>
                    <td><?= $post-> getmontant(); ?></td>
                    <td><?= $post-> getdate_echeance(); ?></td>
                    <td>
                      <button class="btn btn-primary btn-sm">Consulter</button>
                    </td>
                  </tr>
      <?php $compt+=1;
              endforeach; ?>
                </tbody>
              </table>

              


      </div>

      <hr class="mb-4">
          <h4 class="mb-3"><b>Ajouter un prêt</b></h4>
          <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample2">
          Ajouter
        </button>
        <div class="collapse" id="collapseExample2">

          <form method="POST">
          <div class="row">
            
            <div class="col-md-6 mb-3">
              <label for="montant">Montant de l'emprunt</label>
              <input type="text" class="form-control" id="montant" placeholder=""  onblur="calcul()" name="montant">
              <div class="invalid-feedback">
                Montant de l'emprunt
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="taux">Taux d'intérêt</label>
              <select class="custom-select d-block w-100" id="taux"  onblur="calcul()" name="taux_interet">
                <optgroup label="Choisir...">
                  <option value="20">20%</option>
                  <option value="25">25%</option>
                  <option value="30">30%</option>
                  <option value="35">35%</option>
                  <option value="40">40%</option>
                  <option value="45">45%</option>
                  <option selected></option>
                </optgroup>
              </select>
              <div class="invalid-feedback">
                Please select a valid ratio.
              </div>

            </div>

          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="total">montant dû</label>
              <input type="text" class="form-control" id="total" placeholder="" disabled>
              
            </div>

            <div class="col-md-6 mb-3">
              <label for="example-date-input">Date d'échéance de l'emprunt</label>
              <input class="form-control" type="date"  id="example-date-input" name="date_echeance">
              <div class="invalid-feedback">
                Choisissez une date
              </div>
            </div>   
          
          </div>

          <button class="btn btn-primary btn-block" type="submit" name="addpret">
            Ajouter
          </button>

        </form>
      </div>

        <script type="text/javascript">
          function calcul(){
              var montant = Number(document.getElementById("montant").value);

              var taux = Number(document.getElementById("taux").value);

              var total = Number((montant + (montant * taux)/100));
              document.getElementById("total").value = total;
          }
           
          </script>

        <hr class="mb-4">
      
    </div>
    <div class="col-md-8 order-md-1">
      
      <h4 class="mb-3"><b>Compte du Client</b></h4>
      <form class="needs-validation" method="POST" novalidate>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">nom</label>
            <input type="text" class="form-control" id="firstName" placeholder="" name="nom" value="<?= $client->getnom() ?>" required>
            <div class="invalid-feedback">
              Entrez le nom.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">prenom</label>
            <input type="text" class="form-control" name="prenom" id="lastName" placeholder="" value="<?= $client->getprenom() ?>" required>
            <div class="invalid-feedback">
              Entrez le prenom.
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label for="Contact1">Contact 1</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">+241</span>
            </div>
            <input type="text" class="form-control" id="Contact1" placeholder="Contact1" value="<?= $client->getcontact_1() ?>" name="contact_1">
            <div class="invalid-feedback" style="width: 100%;">
              Entrez le numéro 1.
            </div>
          </div>
        </div>


        <div class="mb-3">
          <label for="address2">Contact 2 <span class="text-muted">(Optional)</span></label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">+241</span>
            </div>
            <input type="text" class="form-control" id="Contact2" placeholder="Contact2" value="<?= $client->getcontact_2() ?>" name="contact_2">
          </div>
          

        </div>


        <div class="mb-3">
          <label for="fonction">Fonction</label>
          <input type="text" class="form-control" id="fonction" placeholder="ex: DG SOTEGA" value="<?= $client->getfonction() ?>" name="fonction">
          <div class="invalid-feedback">
            Entrez la fonction du client.
          </div>
        </div>

        <div class="mb-3">
          <label for="Entreprise">Entreprise</label>
          <input type="text" class="form-control" id="Entreprise" placeholder="ex: SOTEGA" value="<?= $client->getentreprise() ?>" name="entreprise">
          <div class="invalid-feedback">
            Entrez l'entreprise du client.
          </div>
        </div>

        <div class="col-md-6 mb-3">
          <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Statut du client</label>
          <?php $test = $client->getstatut_client();
          if ($test == 'Bon payeur'): ?>  
            <h5><span class="badge badge-success"><?= $client->getstatut_client() ?></span></h5>
          <?php else: ?>
            <h5><span class="badge badge-danger"><?= $client->getstatut_client() ?></span></h5>
          <?php endif; ?>

          <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="statut_client">
            <optgroup label="Choisir..." value="<?= $client->getstatut_client() ?>"> 
              <option name="Bon payeur">Bon payeur</option>
              <option name="Mauvais payeur">Mauvais payeur</option>
              <option name="Intretable">Intrétable</option>
              <option name="<?= $client->getstatut_client() ?>" selected><?= $client->getstatut_client() ?></option>
            </optgroup>
          </select>
        </div>

        <hr class="mb-4">

        <h4 class="mb-3"><b>Carte visa</b> </h4>
        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
          Voir les informations de la carte visa
        </button>
        <div class="collapse" id="collapseExample">
          <div class="row" >
            
            <div class="col-md-6 mb-3">
              <label for="banque">Banque</label>
              <span ><?= $client->getbanque() ?></span>
              <select class="custom-select d-block w-100" id="banque" name="banque" value="<?= $client->getbanque() ?>">
                <optgroup label="Choisir...">
                  <option>BGFI</option>
                  <option>BICIG</option>
                  <option>Orabank</option>
                  <option name="<?= $client->getbanque() ?>" selected><?= $client->getbanque() ?></option>
                </optgroup>
              </select>
              <div class="invalid-feedback">
                Please select a valid Bank.
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="cc-number">Numero de la carte</label>
              <input type="text" class="form-control" id="cc-number" placeholder="" name="numero_cart" value="<?= $client->getnumero_cart() ?>">
              <div class="invalid-feedback">
                Credit card number is required
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3 mb-3">
              <label for="cc-expiration">Code de la carte</label>
              <input type="number" class="form-control" id="cc-expiration" placeholder="" name="code_cart" value="<?= $client->getcode_cart() ?>">
              <div class="invalid-feedback">
                Cart code required
              </div>
            </div>
            
          </div>
        </div>

        <hr class="mb-4">

        

                


        <hr class="mb-4">
        
        <button class="btn btn-primary btn-lg btn-block" type="submit" name="newclient">Mettre à jour le compte du client</button>
      </form>
        <hr class="mb-4">
        
    </div>
  </div>

  
<a class="text-center" href="recuperation.php">Mot de passe oublié ?</a>