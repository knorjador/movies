
<?php

require 'model.php';

function ctrlMovies($twig, $pdo) {
  
  echo $twig->render('index.html', ['data' => getMovies($pdo)]);

}

function ctrlDetails($twig, $pdo, $id) {

  echo $twig->render('details.html', ['data' => getDetails($pdo, $id)]);

}

?>
