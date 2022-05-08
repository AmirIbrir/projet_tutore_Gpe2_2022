<?php

require('actions/database.php');

//Vérifier si l'id de la question est rentré dans l'URL
if(isset($_GET['id']) AND !empty($_GET['id'])){

    //Récupérer l'identifiant de la question
    $idOfQuestion = $_GET['id'];

    //Vérifier si l'identifiant correspond a la question dans la table "questions"
    $checkIfQuestionExists = $bdd->prepare('SELECT * FROM questions WHERE id = ? ');
    $checkIfQuestionExists->execute(array($idOfQuestion)); //Récupérer une question qui se trouve dans la table "questions" et qui a pour id ($idOfTheQuestion) rentré dans l'URL
    
    if($checkIfQuestionExists->rowCount() > 0){

        $questionInfos = $checkIfQuestionExists->fetch(); //récupère toutes les données lors de la requete
        
        // Stocker toutes les données dans différentes variables
        $question_title = $questionInfos['titre'];
        //$question_description = $questionInfos['description'];
        $question_content = $questionInfos['contenu'];
        $question_pseudo_author = $questionInfos['pseudo_auteur'];
        $question_publication_date = $questionInfos['date_publication'];

    }else{
        $errorMsg = "Aucune question trouvée";
    }
}else{
    $errorMsg = "Aucune question n'a été trouvée";
}