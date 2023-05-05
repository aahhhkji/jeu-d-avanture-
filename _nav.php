<ul id="nav">
      <?php require_once('_header.php'); ?>
    <?php if (!isset($_SESSION['user'])) { ?>
        <li><a href="register.php">Créer un compte</a></li>
        <li><a href="login.php">Connexion</a></li>
        
    <?php } else { ?>
        <li><a href="persos.php"><?php echo $_SESSION['user']['email'] ?></a></li>
        <li><a href="logout.php">Logout</a></li>
        <li><a href="account.php">mon compte</a></li>
    <?php } ?>
</ul>
