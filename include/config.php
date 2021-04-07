<?php

// MYSQL Credentials
define('HOST', 'localhost');
define('DATABASE', 'db02');
define('USER', 'root');
define('PASSWORD', '');

// DB connexion
try {
  $bdd = new PDO('mysql:host='.HOST.';dbname='.DATABASE.';charset=utf8', USER, PASSWORD);
} catch (Exception $e) {
  die('Erreur : '.$e->getMessage());
  exit();
}
  
?>