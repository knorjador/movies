<?php

/*intégration de TWIG et de la page fonctions.php*/

require_once __DIR__.'/vendor/autoload.php';

define('ROOT_FOLDER', 'root');

$twig = new Twig_Environment(new Twig_Loader_Filesystem(__DIR__.'/templates'), [

    /* Ajouter un dossier templates aux projets */

'cache' => false,
'debug' => true

]);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/foundation-sites@6.4.3/dist/css/foundation.min.css" integrity="sha256-GSio8qamaXapM8Fq9JYdGNTvk/dgs+cMLgPeevOYEx0= sha384-wAweiGTn38CY2DSwAaEffed6iMeflc0FMiuptanbN4J+ib+342gKGpvYRWubPd/+ sha512-QHEb6jOC8SaGTmYmGU19u2FhIfeG+t/hSacIWPpDzOp5yygnthL3JwnilM7LM1dOAbJv62R+/FICfsrKUqv4Gg==" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="assets/css/index.css" type="text/css">
    <title>CSV - FILM</title>
</head>
<body>

    <header>
        <h1>SEARCH MOVIES</h1>
        <input class="champ" type="text" placeholder="► SEARCH ◄"/>
        <input class="bouton" type="button" value="FIND" />
    </header>

<div id="container">

<section>
    <div class="grid-x grid-padding-x align-spaced">
        <div class="cell small-6 medium-4 large-2">
            <div class="overlay-image"><a href="#">
                <img class="posterWaterworld" src="assets/posters/waterworld.jpg" alt="image poster du film Waterworld" />
            <div class="text">WATERWORLD</div>
                </a></div>
        </div>

            <div class="cell small-6 medium-4 large-2">
                <div class="overlay-image"><a href="#">
                    <img class="posterDeath" src="assets/posters/death_note.jpg" alt="image poster du film Death Note" />
                <div class="text">DEATH NOTE</div>
                    </a></div>
            </div>

            <div class="cell small-6 medium-4 large-2">
                <div class="overlay-image"><a href="#">
                    <img class="posterDeath" src="assets/posters/donnie_darko.jpg" alt="image poster du film Death Note" />
                <div class="text">DEATH NOTE</div>
                    </a></div>
            </div>

            <div class="cell small-6 medium-4 large-2">
                <div class="overlay-image"><a href="#">
                    <img class="posterDeath" src="assets/posters/into_the_wild.jpg" alt="image poster du film Death Note" />
                <div class="text">DEATH NOTE</div>
                    </a></div>
            </div>
    </div>
</section>

    <section>
        <div class="grid-x grid-padding-x align-spaced">
            <div class="cell small-6 medium-4 large-2">
                <div class="overlay-image"><a href="#">
                    <img class="posterDonnie" src="assets/posters/donnie_darko.jpg" alt="image poster du film Donnie Darko" />
                <div class="text">DONNIE DARKO</div>
                    </a></div>
            </div>

                <div class="cell small-6 medium-4 large-2">
                    <div class="overlay-image"><a href="#">
                        <img class="posterInto" src="assets/posters/into_the_wild.jpg" alt="image poster film Into the Wild" />
                    <div class="text">INTO THE WILD</div>
                        </a></div>
                    </div>
        </div>
    </section>

</div>

<footer>
Copyright © 2018 Default Corporation.
</footer>

</body>
</html>

<?php

// echo 'Index';

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
