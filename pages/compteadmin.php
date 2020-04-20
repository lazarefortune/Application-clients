<?php
try
{
  $bdd = new PDO('mysql:host=localhost;dbname=business;charset=utf8', 'root', '');
}
catch(Exception $e)
{
  die('Erreur : ' .$e ->getMessage());
}
  $requser = $bdd -> prepare('SELECT * FROM membres WHERE id =  ?');
  $requser -> execute(array(1));
  $userinfo = $requser -> fetch();


if(isset($_SESSION['id']))
{
	$membre = \App\Table\Membre::findmembre(1);


  if (isset($_POST["formupdate"])) 
  {
    
        if(isset($_POST["newidentifiant"]) AND !empty($_POST["newidentifiant"]) AND ($userinfo["identifiant"] != $_POST["newidentifiant"]))
        { 
          $newpseudo = htmlspecialchars($_POST["newidentifiant"]);
          $newpseudolen = strlen($newpseudo);
          if ($newpseudolen >=20)
          {
            $ErreurPseudo = "Votre pseudo est trop long";
          }
          else
          {
            $verifpseudo = $bdd -> prepare("SELECT * FROM membres WHERE identifiant = ?");
            $verifpseudo -> execute(array($newpseudo));
            $reqverifpseudo = $verifpseudo -> rowCount();
            if ($reqverifpseudo != 0) 
            {
              $Erreuridentifiant = "Identifiant déjà utilisé";
              // die();
            }
            else
            {
              $updatepseudo = $bdd -> prepare("UPDATE membres SET identifiant =? WHERE id=? ");
              $updatepseudo -> execute(array($newpseudo,$_SESSION['id']));
              $successidentifiant = "pseudo changé avec succès";
              // header("Location: index.php?p=compte");
            }
          }
        }
        else
        {
          // $Erreuridentifiant = "Votre pseudo est le même";
        }

        if(isset($_POST["newmail"]) AND !empty($_POST["newmail"]) AND ($userinfo["mail"] != $_POST["newmail"]))
        {
          $newmail = htmlspecialchars($_POST["newmail"]);

          $verifmail = $bdd -> prepare("SELECT * FROM membres WHERE mail = ?");
          $verifmail -> execute(array($newmail));
          $reqverifmail = $verifmail -> rowCount();

          if($reqverifmail == 0)
          {
            $updatemail = $bdd -> prepare("UPDATE membres SET mail = ? WHERE id = ?");
            $updatemail -> execute(array($newmail,$_SESSION["id"]));
            header("Location: index.php?p=compte");
            $_SESSION['successmail'] = "Adresse mail changé avec succès";
          }
          else
          {
            $ErreurMail = "Cette adresse mail existe déjà";
          }        
        }
        else
        {
          // $ErreurMail =  "Il s'agit de la même adresse mail";
        }

        
        

      
  }

  if (isset($_POST["formpassword"])) 
  {
        if (isset($_POST['mdp']) AND !empty($_POST['mdp']) AND isset($_POST['mdp1']) AND !empty($_POST['mdp1']) AND isset($_POST['mdp2']) AND !empty($_POST['mdp2'])) 
        {
          // on transforme //
          $oldmdp = htmlspecialchars($_POST['mdp']);
          $mdp1 = htmlspecialchars($_POST['mdp1']);
          $mdp2 = htmlspecialchars($_POST['mdp2']);
          
          // on vérifie si l'ancien mot de passe est correct
          if(password_verify($oldmdp, $userinfo['mdp'])== 1)
          {
            // On verifie qu'ils sont identiques // la vérification avec le mdp présent dans la BDD fera l'objet d'une MAJ //
            if($mdp1 == $mdp2)
            {
              if(password_verify($mdp1, $userinfo['mdp']) != 1)
              {
                $mdp1 = password_hash($mdp1, PASSWORD_DEFAULT);

                $insertmdp = $bdd -> prepare("UPDATE membres SET mdp =? WHERE id= ?");
                $insertmdp -> execute(array($mdp1, $_SESSION['id']));
                $valide= "Mot de passe changé avec succès";
                header('Location: index.php?p=compte');
              }
              else
              {
                $Erreurmdp = "Votre nouveau mot de passe est identique à l'ancien";
                
              }
              
            }
            else
            {
              $Erreurmdp = "Vos nouveaux mots de passe sont différents !";
              
            }
          }
          else
          {
            $Erreurmdp = "Votre ancien mot de passe est incorrect";
            
          }
          
        }
        else
        {
          $Erreurmdp = "Veuillez remplir tous les champs";
          
        }
      
  }

?>

<div class="row">
    <div class="col-md-4 order-md-2 mb-4">
      
    </div>
    <div class="col-md-8 order-md-1">
      <h4 class="mb-3"><b>Compte Principal</b></h4>
      <form class="needs-validation" method="POST" novalidate>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">Identifiant</label>
            <input type="text" class="form-control" id="firstName" placeholder="" name="newidentifiant" value="<?= $membre->getidentifiant() ?>" required>
            <?php
        	if (isset($Erreuridentifiant) AND !empty($Erreuridentifiant)):?>
        		<div class="alert alert-danger" role="alert">
        			<font color="red">	<?= $Erreuridentifiant ?></font>
        		</div>
        	<?php endif; ?>
            <!-- <div class="invalid-feedback">
              Entrez le nom.
            </div> -->
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">Adresse mail</label>
            <input type="text" class="form-control" name="newmail" id="lastName" placeholder="" value="<?= $membre->getmail() ?>" required>
            <?php
        	if (isset($ErreurMail) AND !empty($ErreurMail)):?>
        		<div class="alert alert-danger" role="alert">
        			<font color="red">	<?= $ErreurMail ?></font>
        		</div>
        	<?php endif; ?>
        	
            <!-- <div class="invalid-feedback">
              Entrez le prenom.
            </div> -->
          </div>
        </div>
        <button class="btn btn-primary btn-lg btn-block" type="submit" name="formupdate">Mettre à jour</button>
    </form>
        <hr class="mb-4">
        <h4><b>Modification du mot de passe</b></h4>
        <?php
        	if (isset($Erreurmdp) AND !empty($Erreurmdp)):?>
        	<div class="alert alert-danger" role="alert">
			  <?= $Erreurmdp ?>
			</div>
        
        <?php endif; ?>
        <form method="POST" onSubmit="return validation(this)">
	        <div class="row">
		        <div class="col-md-6 mb-3">
		            <label for="lastName">Ancien mot de passe</label>
		            <input type="password" class="form-control" name="mdp" id="lastName" placeholder="" required>
		            <div class="invalid-feedback">
		              Entrez l'ancien mdp.
		            </div>
		         </div>
		        <div class="col-md-6 mb-3">
		            <label for="lastName">Mot de passe</label>
		            <input type="password" class="form-control" name="mdp1" id="lastName" placeholder=""  required>
		            <div class="invalid-feedback">
		              Entrez le mdp1.
		            </div>
		        </div>
		    </div>

	        <div class="row">
	        	<div class="col-md-6 mb-3">
		            <label for="lastName">Confirmation du mot de passe</label>
		            <input type="password" class="form-control" name="mdp2" id="lastName" placeholder="" required>
		            <div class="invalid-feedback">
		              Entrez le mdp2.
		            </div>
		        </div>
	        </div>
	        <button class="btn btn-danger btn-lg btn-block" type="submit" name="formpassword">Changer</button>

	        <script language="JavaScript">
			function validation(f) {
			  if (f.mdp1.value == '' || f.mdp2.value == '') {
			    alert('Tous les champs ne sont pas remplis');
			    f.mdp1.focus();
			    return false;
			    }
			  else if (f.mdp1.value != f.mdp2.value) {
			    alert('Les deux nouveaux mot de passe sont différents!');
			    f.mdp1.focus();
			    return false;
			    }
			  else if (f.mdp1.value == f.mdp2.value) {
			    return true;
			    }
			  else {
			    f.mdp1.focus();
			    return false;
			    }
			  }
			</script>

			

	      </form>

                


        <hr class="mb-4">
        <!-- <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="save-info">
          <label class="custom-control-label" for="save-info">Save this information for next time</label>
        </div>
        <hr class="mb-4"> -->

          

        


        
        <hr class="mb-4">
        
    </div>
  </div>

 <?php } ?>