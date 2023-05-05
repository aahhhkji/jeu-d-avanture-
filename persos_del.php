<?php 
    require_once('functions.php');
//verification si le user est connecté sinnon redirection vers login.php
    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
    }

    if (!isset($_GET['id'])) {
        header('Location: persos.php?msg=id non passé !');
    }

    $bdd = connect();
//to delete
    $sql="DELETE FROM persos WHERE id = :id AND user_id=:user_id;";

    $sth = $bdd->prepare($sql);
        
    $sth->execute([
        'id'          => $_GET['id'],
        'user_id'     => $_SESSION['user']['id']
    ]);
//redirection vers persos.php + msg
    header('Location: persos.php?msg=perso bien supprimé !');
