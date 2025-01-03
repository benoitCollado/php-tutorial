<?php

if(!function_exists('nav_item')){

  function nav_item(String $lien, String $name):String{
    $active = $_SERVER['REQUEST_URI'] === $lien ? ' active' : '';
  
    return <<<HTML
      <li class="nav-item">
      <a class="nav-link $active " href="$lien">$name</a>
    </li>
HTML; 
}
}

if(!function_exists('redirectToUrl')){
  function redirectToUrl(String $lien):never{
    header("Location: $lien");
    exit();
  }
}
?>