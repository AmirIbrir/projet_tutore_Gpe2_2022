<?php

require('actions/database.php');

//Vérifier que la donnée existe et que l'utilisateur a bien cliqué sur le bouton
if(isset($_POST['validate'])) {
    
    //Si l'utilisateur a répondu
    if(!empty($_POST['answer'])) {
        
        //"nl2br" autoriser saut de ligne. "htmlspecialchars" evite d'insérer du code HTML par sécurité
        $user_answer = nl2br(htmlspecialchars($_POST['answer']));

        $insertAnswer = $bdd->prepare('INSERT INTO answers(id_auteur, pseudo_auteur,id_question, contenu) VALUES (?,?,?,?)');
        $insertAnswer->execute(array($_SESSION['id'], $_SESSION['pseudo'], $idOfTheQuestion, $user_answer)); //'$_SESSION['id']'=> variable globale déclarée dans login.php
    }
}