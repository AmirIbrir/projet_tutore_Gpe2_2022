<?php

require('actions/database.php');

//Valider le formulaire
if (isset($_POST['validate'])){
    //Vérifier si les champs ne sont pas vides
    if(!empty($_POST['title']) AND !empty($_POST['description']) AND !empty($_POST['content'])){
        //Stocker toutes les données dans des variables
        //Récupere toutes les données de l'utilisateur
        $question_title = nl2br(htmlspecialchars($_POST['title'])); //'htmlspecialchars'=> Eviter que l'utilisateur rentre du code html. 'nl2br'=> Accepter saut de ligne dans les champs
        $question_description = nl2br(htmlspecialchars($_POST['description']));
        $question_content = nl2br(htmlspecialchars($_POST['content']));
        $question_date = date('d/m/Y');
        $question_id_author = $_SESSION['id'];
        $question_pseudo_author = $_SESSION['pseudo'];

        //Insérer la question sur le site
        $insertQuestionOnWebsite = $bdd->prepare('INSERT INTO questions(titre,description,contenu,id_auteur,pseudo_auteur,date_publication)VALUES (?,?,?,?,?,?)');
        $insertQuestionOnWebsite->execute(
            array(
                $question_title,
                $question_description,
                $question_content,
                $question_id_author,
                $question_pseudo_author,
                $question_date
            )
        );

        //Afficher le message dans publish-question.php
        $successMsg = "Votre question a bien été publié sur le site";

    }else{
        $errorMsg = "Veuillez svp compléter tout les champs ...";
    }
}