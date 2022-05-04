<?php

require('actions/database.php');

//Vérifier si l'id de la question est bien passé en paramètre dans l'URL
if(isset($_GET['id']) AND !empty($_GET['id'])){
    
    //On recupere l'id d'une question dans la table question qui possede l'id qui a été passé '
    $idOfQuestion = $_GET['id'];

    //Vérifier si la question existe
    $checkIfQuestionExists= $bdd->prepare('SELECT * FROM questions WHERE id = ?');
    $checkIfQuestionExists->execute(array($idOfQuestion));

    if($checkIfQuestionExists->rowCount() > 0){ //"rowCount"=> permet de compter le nombre de données récupérer par la requete
        
        //On récupère toutes les données de la requete
        $questionInfos = $checkIfQuestionExists->fetch();
        //Par sécurité on vérifie si l'auteur de la question est bien celui connecté
        if($questionInfos['id_auteur'] == $_SESSION['id']){

            $question_title = $questionInfos['titre'];
            $question_description = $questionInfos['description'];
            $question_content = $questionInfos['contenu'];
           

            //'str_replace'=> Remplace les sauts de ligne (<br />) par un champs vide dans 'description' et 'contenu'
            $question_description = str_replace('<br />', '', $question_description);
            $question_content = str_replace('<br />', '', $question_content);
           


        }else{
            $errorMsg = "Vous n'êtes pas l'auteur de cette question";
        }
    }else{
        $errorMsg = " Aucune question n'a été trouvée";
    }
}else{
    $errorMsg = " Aucune question n'a été trouvée";
}

