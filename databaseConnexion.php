<?php
require_once 'functions.php'
?>

<?php
try
{
  //createUser('bruno', 'mars', 'mars@blabla.fr', 'password');
}
catch (Exception $e)
{
  echo 'Erreur : ' . $e->getMessage();
}

try
{  
  $user = getUser('mars@blabla.fr');
  echo $user[0];
  //$tables = getTables();
  //var_dump($tables);

}
catch (Exception $e)
{
  die('Erreur : '.$e->getMessage());
}

//$databaseURL = $_ENV['DATABASE_URL'];

//echo 'L\'url de la base de donnée et '.$databaseURL.'!';
  
?>