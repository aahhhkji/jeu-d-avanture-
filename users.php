<?php require_once('functions.php');

    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
    }

    $bdd = connect();

    $sql = "SELECT * FROM persos WHERE user_id = :user_id";

    $sth = $bdd->prepare($sql);
        
    $sth->execute([
        'user_id'     => $_SESSION['user']['id']
    ]);

    $persos = $sth->fetchAll();

    // dd($persos);

?>
<?php require_once('_header.php'); ?>
<?php
session_start();
if(!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}
include('config.php');

if(isset($_POST['delete_account'])) {
    $user_id = $_SESSION['user_id'];
    $query = "DELETE FROM users WHERE id = $user_id";
    $result = mysqli_query($conn, $query);
    session_destroy();
    header("Location: index.php");
}

if(isset($_POST['update_email'])) {
    $user_id = $_SESSION['user_id'];
    $email = $_POST['email'];
    $query = "UPDATE users SET email = '$email' WHERE id = $user_id";
    $result = mysqli_query($conn, $query);
    header("Location: account.php");
}

$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM users WHERE id = $user_id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

$email = $row['email'];
?>

<div class="container">
    <h1>Mon Compte</h1>
    <form method="post">
        <div class="form-group">
            <label for="email">Adresse email:</label>
            <input type="email" name="email" value="<?php echo $email; ?>" required>
        </div>
        <button type="submit" name="update_email" class="btn btn-blue mt-2">Modifier l'adresse email</button>
    </form>
    <form method="post">
        <button type="submit" name="delete_account" class="btn btn-red mt-4">Supprimer mon compte</button>
    </form>
</div>
<div class="account-buttons">
    <a href="update_email.php">Modifier mon adresse e-mail</a>
    <a href="delete_account.php">Supprimer mon compte</a>
</div>
