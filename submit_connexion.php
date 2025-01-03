<?php 
session_start();
require_once 'functions.php';
require_once 'variables.php';

$postData = $_POST;

if(isset($postData['email']) && isset($postData['password'])){
  if(!filter_var($postData['email'], FILTER_VALIDATE_EMAIL)){
    $_SESSION['LOGIN_ERROR_MESSAGE'] = 'Veuillez entrer un email valide';
  }else{
    foreach($users as $user){
      if($user['email'] === $postData['email'] && $user['password'] === $postData['password']){
        $_SESSION['LOGGED_USER'] =[ 
          'email' => $user['email'],
          'user_id' => $user['user_id']
          ];
      }
    }
  
    if (!isset($_SESSION['LOGGED_USER'])) {
    $_SESSION['LOGIN_ERROR_MESSAGE'] = 
    'Les informations envoyées ne permettent pas de vous identifier : (%s/%s)'. $postData['email'];
      redirectToUrl('connexion.php');
      
    }
  }
  redirectToUrl('index.php');
}
?>