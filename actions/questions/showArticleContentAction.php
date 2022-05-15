<?php

require('actions/database.php');

//Vérifier si l'id de la question est rentré dans l'URL
if(isset($_GET['id']) AND !empty($_GET['id'])){

    //Récupérer l'identifiant de la question
    $idOfTheQuestion = $_GET['id'];

    //Vérifier si l'identifiant correspond a la question dans la table "questions"
    $checkIfQuestionExists = $bdd->prepare('SELECT * FROM questions WHERE id = ? ');
    $checkIfQuestionExists->execute(array($idOfTheQuestion)); //Récupérer une question qui se trouve dans la table "questions" et qui a pour id ($idOfTheQuestion) rentré dans l'URL
    
    if($checkIfQuestionExists->rowCount() > 0){

        $questionsInfos = $checkIfQuestionExists->fetch(); //récupère toutes les données lors de la requete
        
        // Stocker toutes les données dans différentes variables
        $question_title = $questionsInfos['titre'];
        //$question_description = $questionsInfos['description'];
        $question_content = $questionsInfos['contenu'];
        $question_id_author = $questionsInfos['id_auteur'];
        $question_pseudo_author = $questionsInfos['pseudo_auteur'];
        $question_publication_date = $questionsInfos['date_publication'];

    }else{
        $errorMsg = "Aucune question trouvée";
    }
}else{
    $errorMsg = "Aucune question n'a été trouvée";
}