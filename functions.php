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

if (!function_exists('createUser')){
  function createUser(String $firstname, String $lastname, String $email, String $password){
    $source_db = "pgsql:host=$_ENV[PGHOST];port=$_ENV[PGPORT];dbname=$_ENV[PGDATABASE];user=$_ENV[PGUSER];password=$_ENV[PGPASSWORD]";
    $sqliteClient = new PDO($source_db);
    $createUser = $sqliteClient->prepare('
      INSERT INTO users(firstname, lastname, email, password)
        VALUES(:firstname, :lastname, :email, :password)
    ');
    $createUser->execute([
      'firstname' => $firstname,
      'lastname' => $lastname,
      'email' => $email,
      'password' => $password
    ]);
    //$reussite = $createUser->fetchAll();
    //var_dump($reussite);
  }
}

if (!function_exists('deleteUser')){
  function deleteUser(String $email){
    $source_db = "pgsql:host=$_ENV[PGHOST];port=$_ENV[PGPORT];dbname=$_ENV[PGDATABASE];user=$_ENV[PGUSER];password=$_ENV[PGPASSWORD]";
    $sqliteClient = new PDO($source_db);
    $deleteUser = $sqliteClient->prepare('
      DELETE FROM users WHERE email = :email
    ');
    $deleteUser->execute([
      'email' => $email,
    ]);
    //$reussite = $createUser->fetchAll();
    //var_dump($reussite);
  }
}

if (!function_exists('getUser')){
  function getUser(String $email):Array{
    $source_db = "pgsql:host=$_ENV[PGHOST];port=$_ENV[PGPORT];dbname=$_ENV[PGDATABASE];user=$_ENV[PGUSER];password=$_ENV[PGPASSWORD]";
    $sqliteClient = new PDO($source_db);
    $getUser = $sqliteClient->prepare('
    SELECT * FROM users WHERE email = :email
    ');
    $getUser->execute([
      'email' => $email,
    ]);
    $user = $getUser->fetchAll();

    return $user;
    //$reussite = $createUser->fetchAll();
    //var_dump($reussite);
  }
}

if (!function_exists('getTables')){
  function getTables():Array{
    $source_db = "pgsql:host=$_ENV[PGHOST];port=$_ENV[PGPORT];dbname=$_ENV[PGDATABASE];user=$_ENV[PGUSER];password=$_ENV[PGPASSWORD]";
    echo $_ENV['PGDATABASE'];
    $sqliteClient = new PDO($source_db);
    $getTables = $sqliteClient->prepare("
     SELECT *
FROM pg_catalog.pg_tables
WHERE schemaname != 'pg_catalog' AND
    schemaname != 'information_schema'");
    $getTables->execute();
    $tables = $getTables->fetchAll();

    return $tables;
    //$reussite = $createUser->fetchAll();
    //var_dump($reussite);
  }
}

  if (!function_exists('getRecipes')){
    function getRecipes(int $index):Array{
      $source_db = "pgsql:host=$_ENV[PGHOST];port=$_ENV[PGPORT];dbname=$_ENV[PGDATABASE];user=$_ENV[PGUSER];password=$_ENV[PGPASSWORD]";
      echo $_ENV['PGDATABASE'];
      $sqliteClient = new PDO($source_db);
      $getRecipe = $sqliteClient->prepare("
      SELECT * FROM recipes 
      WHERE index = :index
      LEFT INNER JOIN users WHERE recipes.author = users.index
       ");
      $getRecipe->execute([
        'index' => $index
      ]);
      $Recipe = $getRecipe->fetchAll();

      return $Recipe;
      //$reussite = $createUser->fetchAll();
      //var_dump($reussite);
    }
  }

    if (!function_exists('createRecipes')){
      function createRecipes(String $title, String $recipe, int $athor, bool $enabled){
        $source_db = "pgsql:host=$_ENV[PGHOST];port=$_ENV[PGPORT];dbname=$_ENV[PGDATABASE];user=$_ENV[PGUSER];password=$_ENV[PGPASSWORD]";
        echo $_ENV['PGDATABASE'];
        $sqliteClient = new PDO($source_db);
        $createRecipe = $sqliteClient->prepare("
          INSERT INTO recipes(title, recipe, author, is_enabled)
          VALUES (:title, :recipe, :author, :enabled)
         ");
        $createRecipe->execute([
          'title'=>$title,
          'recipe'=>$recipe,
          'author'=>$author,
          'enabled'=>$enabled
        ]);
        //$reussite = $createUser->fetchAll();
        //var_dump($reussite);
      }
    }

?>