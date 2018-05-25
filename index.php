
<?php

require_once './vendor/autoload.php';
require './php/controller.php';
require './php/pdo.php';

define('BASE', preg_replace("!^{$_SERVER['DOCUMENT_ROOT']}!", '', __DIR__));

$loader = new Twig_Loader_Filesystem('./views');

$twig = new Twig_Environment($loader, [

  'cache' => false

]);

$twig->addGlobal('BASE', BASE);

$twig->addFunction(new \Twig_SimpleFunction('assets', function ($assets) {

  return sprintf(BASE.'/assets/%s', ltrim($assets, '/'));

}));

$pdo = new Database();

switch (true) {

  case !empty($_GET['add']):
    return ctrlAdd($twig, $pdo);
    break;

  case !empty($_GET['id']):
    return ctrlDetails($twig, $pdo, $_GET['id']);
    break;

  case !empty($_GET['year']):
    return ctrlYear($twig, $pdo, $_GET['year']);
    break;

  case !empty($_GET['genre']):
    return ctrlGenre($twig, $pdo, $_GET['genre']);
    break;

  case !empty($_GET['director']):
    return ctrlDirector($twig, $pdo, $_GET['director']);
    break;

  case !empty($_GET['actor']):
    return ctrlActor($twig, $pdo, $_GET['actor']);
    break;

  default:
    return ctrlMovies($twig, $pdo);
    break;

}

?>
