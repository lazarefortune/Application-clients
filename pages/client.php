<?php
if (isset($_GET)) {
  # code...
}
?>

<div class="row">
    <div class="col-md-4 order-md-2 mb-4">
      
    </div>
    <div class="col-md-8 order-md-1">
      <h4 class="mb-3">Nouveau client</h4>
      <form class="needs-validation" method="POST" novalidate>
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

        <div class="mb-3">
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


        <div class="mb-3">
          <label for="address2">Contact 2 <span class="text-muted">(Optional)</span></label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">+241</span>
            </div>
            <input type="text" class="form-control" id="Contact2" placeholder="Contact2" name="contact_2">
          </div>
          

        </div>

        <!-- <div class="mb-3">
          <label for="email">Email <span class="text-muted">(Optional)</span></label>
          <input type="email" class="form-control" id="email" placeholder="you@example.com">
          <div class="invalid-feedback">
            Please enter a valid email address for shipping updates.
          </div>
        </div> -->

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

        
                


        <hr class="mb-4">
        <!-- <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="save-info">
          <label class="custom-control-label" for="save-info">Save this information for next time</label>
        </div>
        <hr class="mb-4"> -->

        <h4 class="mb-3">Carte visa</h4>
        <div class="row">
          
          <div class="col-md-6 mb-3">
            <label for="country">Banque</label>
            <select class="custom-select d-block w-100" id="country" >
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
            <input type="text" class="form-control" id="cc-number" placeholder="" >
            <div class="invalid-feedback">
              Credit card number is required
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 mb-3">
            <label for="cc-expiration">Code de la carte</label>
            <input type="text" class="form-control" id="cc-expiration" placeholder="" >
            <div class="invalid-feedback">
              Cart code required
            </div>
          </div>
          
        </div>

        <hr class="mb-4">
        
        <h4 class="mb-3">Emprunt</h4>
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
              <option value="">Choisir...</option>
              <option value="20">20%</option>
              <option value="25">25%</option>
              <option value="30">30%</option>
              <option value="35">35%</option>
              <option value="40">40%</option>
              <option value="45">45%</option>
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