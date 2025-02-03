<?php 
require 'session.php';
require_once 'functions.php';
require_once 'variables.php';

$postData = $_POST;

if(isset($postData['email']) && isset($postData['password'])){
  if(!filter_var($postData['email'], FILTER_VALIDATE_EMAIL)){
    $_SESSION['LOGIN_ERROR_MESSAGE'] = 'Veuillez entrer un email valide';
  }else{

    try{
      $user = getUser($postData['email']);
    }
    catch (Exception $e)
    {
      $_SESSION['LOGIN_ERROR_MESSAGE'] = $e->getMessage();
    }
    if($user[0]['email'] === $postData['email'] && $user[0]['password'] === $postData['password']){
      $_SESSION['LOGGED_USER'] =[ 
        'email' => $user[0]['email'],
        'user_id' => $user[0]['index']
        ];
      setcookie('LOGGED_USER',
      $user[0]['email'], [
                  'expires'=> time() + (60*60),
                  'secure' => true,
                  'httponly'=> true,
         ]);
      }
    }
  
    if (!isset($_SESSION['LOGGED_USER'])) {
    $_SESSION['LOGIN_ERROR_MESSAGE'] = 
    'Les informations envoyées ne permettent pas de vous identifier : (%s/%s)'. $postData['email'];
      redirectToUrl('connexion.php');
      
    }
  }
 
  redirectToUrl('index.php');

?>