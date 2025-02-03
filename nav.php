<?php require_once 'functions.php';?>

<?php
// la balise ouvrante <?= est équivaene à <?php echo 
?>
<?=  nav_item('/index.php', 'Accueil'); ?>
<?= nav_item('/jeu.php', 'Jeu'); ?> 
<?=  nav_item('/contact.php', 'Contact'); ?>
<?php if(!isset($_SESSION['LOGGED_USER'])) :?>
  <?= nav_item('/connexion.php', 'Connexion'); ?>
<?php endif; ?>
<?php if(isset($_SESSION['LOGGED_USER'])) :?>
  <?= nav_item('/deconnexion.php', 'Déconnexion'); ?>
<?php endif; ?>
