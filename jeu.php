<?php session_start();?>
<? $title = 'Jeu'; ?>

<?php require 'header.php'; ?>
<?php 
  srand(floor(time() / (60*60*24)));
  $adeviner = rand(0,1000);
  if(isset($_GET['chiffre'])){
    $valeur = (int)htmlentities($_GET['chiffre']);
  }else{
    $valeur = (int)'';
  }
  if(isset($_GET['text'])){
    $text = htmlentities($_GET['text']);
  }else{
    $text = '';
  }
  if(isset($_GET['chiffre']) && $valeur > $adeviner){
    $message = 'vous avez entré : '.$valeur.' <br> Le chiffre à devniner est plus petit';
  } elseif (isset($_GET['chiffre']) && $valeur < $adeviner){
    $message = 'vous avez entré : '.$valeur.' <br> Le chiffre à deviner est plus grand';
  } elseif(isset($_GET['chiffre']) && $valeur === $adeviner){
    $message = 'vous avez entré : '.$valeur.' <br> Bravo ! vous avez trouver le bon chiffre';
  }
?>


<h1>Jeu</h1>
<?php echo (isset($_GET['chiffre']))? '<h5>'.$message.'</h5>' : ''?>
<!--<?= '<h7>'.$adeviner.'</h7>' ?> -->
<form actions='jeu.php' method='get'>
  <div class="form-group col-md-4"></div>
  <input type='number' class="form-control" name='chiffre' placeholder='Entrez un chiffre en 0 et 1000' min="0" max="1000" <?php echo (isset($_GET['chiffre'])) ? 'value="'.$valeur.'"' : ''; ?> >
  <input type='text' class="form-control"name='text' placeholder='test' <?= (isset($_GET['text'])) ? 'value="'.$text.'"' : ''; ?> >
  <button type='submit' class="btn btn-primary">Deviner</button>
</div>
  
</form>

<?php require 'footer.php'; ?>
