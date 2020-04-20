<?php
session_start();
// var_dump($_SESSION);
require_once '../app/Autoloader.php';

App\Autoloader::register();

$config = App\Config::getInstance();
// $test = $config->get('db_user');
// var_dump($test);
// die();

if(!isset($_SESSION['id'])){
	header("Location: connexion.php");
}

if(isset($_GET['p']))
{
    $p = $_GET['p'];
}
else{
    $p = 'home';
}




ob_start(); //tout ce qui sera afficher sera stoquer dans la variable $content

if($p === 'home'){
    require '../pages/home.php';
}
elseif( $p === 'article'){
    require '../pages/single.php';
}
elseif ($p === 'categorie') {
	require '../pages/categorie.php';
}
elseif ($p === 'form') {
	require '../pages/form.php';
}
elseif ($p === 'compte') {
	require '../pages/compteadmin.php';
}
elseif ($p === 'client') {
	require '../pages/client.php';
}
elseif ($p === 'listeclients') {
	require '../pages/data.php';
}
elseif ($p === 'compteclient') {
	require '../pages/compteclient.php';
}
elseif ($p === 'emprunt') {
	require '../pages/oldemprunt.php';
}
elseif ($p === 'admin') {
	require '../pages/admin.php';
}else{
	require '../pages/home.php';
}

$content = ob_get_clean();

//on appelle le template
require_once '../pages/templates/default.php';


?>
