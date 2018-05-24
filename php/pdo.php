
<?php

class Database {

  private $pdo;

  function __construct() {

    $this->connect();

  }

  public function getInstance() {

    return $this->pdo;

  }

  private function connect() {

    $host       = 'localhost';
    $db         = 'movies';
<<<<<<< HEAD
    $user       = 'r4ph';
    $password   = '**playWithData1337';
=======
    $user       = 'root';
    $password   = 'root';
>>>>>>> 9d7acf20b360ccb3c9f6f6838e25a436b6575e81

    try {

      // data source name
      $dsn     = 'mysql:host='.$host.';dbname='.$db.';charset=utf8';
      $options = [

        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC

      ];

      $this->pdo = new PDO($dsn, $user, $password, $options);

    } catch(PDOException $e) {

      $this->pdo = null;

    }

  }

}

?>
