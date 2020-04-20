<?php
// var_dump($_SESSION);
if(isset($_SESSION['id'])){
  header("Location: index.php");

}
require_once '../app/Autoloader.php';

App\Autoloader::register();

$config = App\Config::getInstance();

$db = new PDO('mysql:host=localhost;dbname=business', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // On émet une alerte à chaque fois qu'une requête a échoué.

$managerco = new \App\Table\ConnexionManager($db);


if (isset($_POST['connexion'])){
  htmlspecialchars($_POST['identifiant']);
  htmlspecialchars($_POST['mdp']);
  $membre = new \App\Table\Membre();
  $membre-> hydrater($_POST);
  $connexion = $managerco-> connexion($membre-> getidentifiant(),$membre-> getmdp());
  if ($connexion == 'connecte'){
    session_start();
    $_SESSION['id'] = $managerco-> recup_membre('id');
    $_SESSION['identifiant'] = $managerco-> recup_membre('identifiant');
    $_SESSION['mail'] = $managerco->recup_membre('mail');

    header("Location: index.php");

  }
  else
  {
    $erreur = "Identifiant ou mot de passe incorrect";
  }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>Business</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/floating-labels/">

    <!-- Bootstrap core CSS -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/4.4/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/4.4/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/4.4/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon.ico">
<meta name="msapplication-config" content="/docs/4.4/assets/img/favicons/browserconfig.xml">
<meta name="theme-color" content="#563d7c">


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

      html,
      body {
        height: 100%;
      }

      body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        width: 100%;
        max-width: 420px;
        padding: 15px;
        margin: auto;
      }

      .form-label-group {
        position: relative;
        margin-bottom: 1rem;
      }

      .form-label-group > input,
      .form-label-group > label {
        height: 3.125rem;
        padding: .75rem;
      }

      .form-label-group > label {
        position: absolute;
        top: 0;
        left: 0;
        display: block;
        width: 100%;
        margin-bottom: 0; /* Override default `<label>` margin */
        line-height: 1.5;
        color: #495057;
        pointer-events: none;
        cursor: text; /* Match the input under the label */
        border: 1px solid transparent;
        border-radius: .25rem;
        transition: all .1s ease-in-out;
      }

      .form-label-group input::-webkit-input-placeholder {
        color: transparent;
      }

      .form-label-group input:-ms-input-placeholder {
        color: transparent;
      }

      .form-label-group input::-ms-input-placeholder {
        color: transparent;
      }

      .form-label-group input::-moz-placeholder {
        color: transparent;
      }

      .form-label-group input::placeholder {
        color: transparent;
      }

      .form-label-group input:not(:placeholder-shown) {
        padding-top: 1.25rem;
        padding-bottom: .25rem;
      }

      .form-label-group input:not(:placeholder-shown) ~ label {
        padding-top: .25rem;
        padding-bottom: .25rem;
        font-size: 12px;
        color: #777;
      }

      /* Fallback for Edge
      -------------------------------------------------- */
      @supports (-ms-ime-align: auto) {
        .form-label-group > label {
          display: none;
        }
        .form-label-group input::-ms-input-placeholder {
          color: #777;
        }
      }

      /* Fallback for IE
      -------------------------------------------------- */
      @media all and (-ms-high-contrast: none), (-ms-high-contrast: active) {
        .form-label-group > label {
          display: none;
        }
        .form-label-group input:-ms-input-placeholder {
          color: #777;
        }
      }

    </style>
    <!-- Custom styles for this template -->
    <link href="floating-labels.css" rel="stylesheet">
  </head>
  <body>
<form method="POST" class="form-signin">
    <div class="text-center mb-4">
      <img class="mb-4" src="/docs/4.4/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Connexion</h1>
      <?php
          if (isset($erreur) AND !empty($erreur)):?>
            <div class="alert alert-danger" role="alert">
              <font color="red">  <?= $erreur ?></font>
            </div>
      <?php endif; ?>
      
    </div>

    <div class="form-label-group">
      <input type="text" id="inputEmail" name="identifiant" class="form-control" placeholder="Identifiant ou mail" required autofocus>
      <label for="inputEmail">Identifiant ou adresse mail</label>
    </div>

    <div class="form-label-group">
      <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="mdp" required>
      <label for="inputPassword">mot de passe</label>
    </div>

    <!-- <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div> -->
    <button class="btn btn-lg btn-primary btn-block" type="submit" name="connexion">Connexion</button>
  
    <a href="" >Mot de passe oublié ?</a>
   

    <p class="mt-5 mb-3 text-muted text-center">&copy; 2020</p>
</form>
</body>
</html>
