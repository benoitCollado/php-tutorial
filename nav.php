<?php require_once 'functions.php';?>

<?php
// la balise ouvrante <?= est équivaene à <?php echo 
?>
<?=  nav_item('/index.php', 'Accueil'); ?>
<?= nav_item('/jeu.php', 'Jeu'); ?> 
<?=  nav_item('/contact.php', 'Contact'); ?>
<?= nav_item('/connexion.php', 'Connexion'); ?>

<?php