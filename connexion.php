<?php require 'session.php';?>
<?php if(isset($_POST['email']) && isset($_POST['password'])){
  $userlogin = $_POST;
  header('Location: /index.php', true, 302);
  exit();
} ?>
<?php $title = 'Connexion'; ?>
<?php require 'header.php'; ?>
<h1>Connexion</h1>

<?php if(!isset($_SESSION['LOGGED_USER'])) :?>
  <?php if (isset($_SESSION['LOGIN_ERROR_MESSAGE'])) : ?>
  <div class="alert alert-danger" role="alert">
  <?php echo $_SESSION['LOGIN_ERROR_MESSAGE'];
  unset($_SESSION['LOGIN_ERROR_MESSAGE']); ?>
  </div>
  <?php endif; ?>
  <form action="submit_connexion.php" method="post">
    <div class="form-group">
      <label for="email" class="from-label">Email : </label>
      <input type="email" class="form-control" name="email" placeholder="Entrez votre email" required>
      <label for="password" class="">Mot de passe : </label>
      <input type="password" class="form-control" name="password" placeholder="Entrez votre mot de passe" required>
    </div>
    <button type="submit" class="btn btn-primary">Se connecter</button>
  </form>
<?php else : ?>
  <div class="alert alert-success" role="alert">
  Bonjour <?php echo $_SESSION['LOGGED_USER']['email']; ?> et bienvenue sur le site !
  </div>
<?php endif; ?>

<?php require 'footer.php'; ?>