
<?php


 require_once('_header.php'); 
require_once('functions.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST["send"])) {
    $bdd = connect();

    $user_id = $_SESSION['user']['id'];

   

    // Mettre à jour le mot de passe
    if ($_POST['password'] != "") {
        $sql = "UPDATE users SET `password` = :password WHERE id = :id;";
        $sth = $bdd->prepare($sql);
        $sth->execute([
            'password'  => password_hash($_POST['password'], PASSWORD_DEFAULT),
            'id'        => $user_id
        ]);
    }

    header('Location: account.php');
}

if (isset($_POST["delete"])) {
    $bdd = connect();

    $user_id = $_SESSION['user']['id'];

    // Supprimer l'utilisateur de la base de données
    $sql = "DELETE FROM users WHERE id = :id;";
    $sth = $bdd->prepare($sql);
    $sth->execute([
        'id' => $user_id
    ]);

    // Déconnecter l'utilisateur et le rediriger vers la page d'accueil
    session_unset();
    session_destroy();
    header('Location: index.php');
    
}


?>
<form action="" method="post">
    <h1>Mon compte</h1>
    <div class="container">
    <h1>Mon compte</h1>
    <form action="" method="post">
        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?php echo $_SESSION['user']['email']; ?>" required />
        </div>
        <div>
            <label for="password">Nouveau mot de passe</label>
            <input type="password" id="password" name="password" />
        </div>
        <div class="mt-4">
            <input type="submit" class="btn btn-green" name="update" value="Mettre à jour" />
            <button type="button" class="btn btn-grey" onclick="window.location.href='persos.php'">Retour</button>
            <button type="submit" class="btn btn-red" name="delete" onclick="return confirm('Êtes-vous sûr de vouloir supprimer votre compte ?')">Supprimer mon compte</button>
        </div>
    </form>
</div>

