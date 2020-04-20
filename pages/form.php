<?php


    $db = new PDO('mysql:host=localhost;dbname=business', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // On émet une alerte à chaque fois qu'une requête a échoué.
    

    if(isset($_POST['newclient'])){
      $client1 = new \App\Table\Client;
      $client1::hydrater($_POST,$client1);
      $manager = new \App\Table\ClientManager($db);
      $manager -> add($client1);
      header("Location: index.php?p=form");
      // var_dump($client1);
      // var_dump($manager);
    }
?>

  <div class="row">
    <div class="col-md-4 order-md-2 mb-4">
      
    </div>
    <div class="col-md-8 order-md-1">
      <form class="needs-validation" method="POST" novalidate>
      <h4 class="mb-3"><b>Nouveau client </b></h4>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">nom</label>
            <input type="text" class="form-control" id="firstName" placeholder="" name="nom" value="" required>
            <div class="invalid-feedback">
              Entrez le nom.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">prenom</label>
            <input type="text" class="form-control" name="prenom" id="lastName" placeholder="" value="" required>
            <div class="invalid-feedback">
              Entrez le prenom.
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="Contact1">Contact 1</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">+241</span>
              </div>
              <input type="text" class="form-control" id="Contact1" placeholder="Contact1" name="contact_1">
              <div class="invalid-feedback" style="width: 100%;">
                Entrez le numéro 1.
              </div>
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="Contact2">Contact 2</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">+241</span>
              </div>
              <input type="text" class="form-control" id="Contact2" placeholder="Contact2" name="contact_2">
              <div class="invalid-feedback" style="width: 100%;">
                Entrez le numéro 2.
              </div>
            </div>
          </div>
        </div>


        <div class="mb-3">
          <label for="fonction">Fonction</label>
          <input type="text" class="form-control" id="fonction" placeholder="ex: DG SOTEGA" name="fonction">
          <div class="invalid-feedback">
            Entrez la fonction du client.
          </div>
        </div>

        <div class="mb-3">
          <label for="Entreprise">Entreprise</label>
          <input type="text" class="form-control" id="Entreprise" placeholder="ex: SOTEGA" name="entreprise">
          <div class="invalid-feedback">
            Entrez l'entreprise du client.
          </div>
        </div>

        <div class="col-md-6 mb-3">
          <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Statut du client</label>
          <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="statut_client">
            <optgroup label="Choisir...">
              <option name="Bon payeur">Bon payeur</option>
              <option name="Mauvais payeur">Mauvais payeur</option>
              <option name="Intretable">Intrétable</option> 
              <option selected>Aucun</option> 
            </optgroup>
          </select>
        </div>

        

                


        <hr class="mb-4">

        <h4 class="mb-3"><b>Carte visa</b></h4>
        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
          Ajouter carte visa
        </button>
        <div class="collapse" id="collapseExample">
          <div class="row" >
            
            <div class="col-md-6 mb-3">
              <label for="banque">Banque</label>
              <select class="custom-select d-block w-100" id="banque" name="banque" >
                <optgroup label="Choisir...">
                  <option>BGFI</option>
                  <option>BICIG</option>
                  <option>Orabank</option>
                  <option selected></option>
                </optgroup>
              </select>
              <div class="invalid-feedback">
                Please select a valid Bank.
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="cc-number">Numero de la carte</label>
              <input type="text" class="form-control" id="cc-number" placeholder="" name="numero_cart">
              <div class="invalid-feedback">
                Credit card number is required
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3 mb-3">
              <label for="cc-expiration">Code de la carte</label>
              <input type="text" class="form-control" id="cc-expiration" placeholder="" name="code_cart">
              <div class="invalid-feedback">
                Cart code required
              </div>
            </div>
            
          </div>
        </div>
        <hr class="mb-4">
        
        <h4 class="mb-3"><b>Emprunt</b></h4>
        <div class="row">
          
          <div class="col-md-6 mb-3">
            <label for="montant">Montant de l'emprunt</label>
            <input type="text" class="form-control" id="montant" placeholder=""  onblur="calcul()">
            <div class="invalid-feedback">
              Montant de l'emprunt
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="taux">Taux d'intérêt</label>
            <select class="custom-select d-block w-100" id="taux"  onblur="calcul()">
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
            <!-- <label for="taux">taux</label>
            <input type="text" class="form-control" id="taux" placeholder="" required onblur="calcul()">
            <div class="invalid-feedback">
              taux
            </div> -->

          </div>

        </div>


        
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="total">montant dû</label>
            <input type="text" class="form-control" id="total" placeholder="" disabled>
            
          </div> 

         <!--  <div class="col-md-6 mb-3">
            <label for="montant">Date d'échéance</label>
            <input type="text" class="form-control" id="montant" placeholder="">
            <div class="invalid-feedback">
              Choisissez une date
            </div>
          </div>  -->
          <div class="col-md-6 mb-3">
            <label for="example-date-input">Date d'échéance de l'emprunt</label>
            <input class="form-control" type="date"  id="example-date-input" name="dateecheance">
            <div class="invalid-feedback">
              Choisissez une date
            </div>
          </div>   
        
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


        <button class="btn btn-primary btn-lg btn-block" type="submit" name="newclient">Créer le client et valider l'emprunt</button>
      </form>
    </div>
  </div>

  
