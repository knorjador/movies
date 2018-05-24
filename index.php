
<?php

require_once './vendor/autoload.php';
require './php/controller.php';
require './php/pdo.php';

$loader = new Twig_Loader_Filesystem('./views');

$twig = new Twig_Environment($loader, [

  'cache' => false

]);

$pdo = new Database();

switch (true) {

  case !empty($_GET['id']):
    return ctrlDetails($twig, $pdo, $_GET['id']);
    break;

  default:
    return ctrlMovies($twig, $pdo);
    break;

}

?>
