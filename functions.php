<?php
//permet de démarrer une session PHP et de stocker des variables de session pour une utilisation ultérieure.
    session_start();
//affiche les informations de débogage d'une variable sous forme de tableau préformaté et arrête l'exécution du script.

    function dd($var) {
        echo "<pre>";
        var_dump($var);
        echo "</pre>";
        
        die();
    }
// se connecter à une base de données MySQL en utilisant PDO.
    function connect () {
        $link = new PDO(
            'mysql:dbname=game;host=localhost', 
            'root', 
            ''
        );

        return $link;
    }
    
