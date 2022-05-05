<!--Permet de lier database.ph à la BDD  -->
<?php

try{

    //Permet à l'utilisateur de rester connecté
    session_start();
    
    //Variable qui nous permet d'acceder a la BDD 
    //Nouvelle instance de la classe PDO, pour faire des requetes SQL
    $bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8;', 'root', '');
}catch(Exception $e) { //variable 'e' qui stocke l'exception
    die('Une erreur a été trouvée: ' . $e->getMessage()); //Dabord on plante (die) puis on affiche l'erreur
}



