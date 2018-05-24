
<?php

function getMovies($pdo): array {

  $statement = $pdo->getInstance()->prepare("SELECT * FROM movies");
  $statement->execute();

  $data = $statement->fetchAll();

  return $data;

}

function getDetails($pdo, $id): array {

  $data = [];

  // movie
  $request = "SELECT *
              FROM movies
              WHERE id = ?";

  $statement = $pdo->getInstance()->prepare($request);
  $statement->execute([$id]);
  $step = $statement->fetch();
  array_push($data, ['movie' => $step]);

  // directors
  $request = "SELECT firstname, lastname
              FROM directors d
              INNER JOIN movies_directors m_d   ON d.id = m_d.directors_id
              INNER JOIN movies m               ON m_d.movies_id = m.id
              WHERE m.id = ?";

  $statement = $pdo->getInstance()->prepare($request);
  $statement->execute([$id]);
  $step = $statement->fetchAll();
  array_push($data, ['directors' => $step]);

  // actors
  $request = "SELECT firstname, lastname
              FROM actors a
              INNER JOIN actors_movies a_m   ON a.id = a_m.actors_id
              INNER JOIN movies m            ON a_m.movies_id = m.id
              WHERE m.id = ?";

  $statement = $pdo->getInstance()->prepare($request);
  $statement->execute([$id]);
  $step = $statement->fetchAll();
  array_push($data, ['actors' => $step]);

  // genres
  $request = "SELECT name
              FROM genres g
              INNER JOIN movies_genres m_g   ON g.id = m_g.genres_id
              INNER JOIN movies m            ON m_g.movies_id = m.id
              WHERE m.id = ?";

  $statement = $pdo->getInstance()->prepare($request);
  $statement->execute([$id]);
  $step = $statement->fetchAll();
  array_push($data, ['genres' => $step]);

  return $data;

}

?>
