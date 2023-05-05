<?php
//sortie
    require_once('functions.php');

    unset($_SESSION['user']);
    session_destroy();
//rediriger vers la page d'acceuille
    header('Location: index.php');
?>