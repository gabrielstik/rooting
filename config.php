<?php
define('DB_HOST','localhost');
define('DB_NAME','database');
define('DB_USER','root');
define('DB_PASS','root');

try {
  $pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PASS);
  $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
  $pdo->exec("SET CHARACTER SET utf8");
}
catch (Exception $e) {
  echo('Could not connect to database, please verify config.php')
}
?>
