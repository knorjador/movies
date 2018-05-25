
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

<<<<<<< HEAD
    require 'config.php';

    $host       = $config['host'];
    $db         = $config['database'];
    $user       = $config['user'];
    $password   = $config['password'];
=======
    $host       = 'localhost';
    $db         = 'movies';
    $user       = 'root';
    $password   = 'root';
>>>>>>> 193f8df01f46542b1bd11b60792822019bf78198

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
