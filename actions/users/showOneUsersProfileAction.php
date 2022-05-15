<?php

require('actions/database.php');

//Récupérer lidentifiant de l'utilisateur
if(isset($_GET['id']) AND !empty($_GET['id'])){

    //L'id de l'utilisateur
    $idOfUser = $_GET['id'];

    //Vérifier si l'utilisateur existe
    $checkIfUserExists = $bdd->prepare('SELECT pseudo, nom, prenom FROM users WHERE id = ?');
    $checkIfUserExists->execute(array($idOfUser));
    
    if($checkIfUserExists->rowCount() > 0){

        //Récupérer toutes les données de l'utilisateur
        $usersInfos = $checkIfUserExists->fetch();

        $user_pseudo = $usersInfos['pseudo'];
        $user_lastname = $usersInfos['nom'];
        $user_firstname = $usersInfos['prenom'];

        //Récupérer toutes les questions de l'utilisateur
        $getHisQuestion = $bdd->prepare('SELECT * FROM question WHERE id_auteur = ?');
        $getHisQuestion->execute(array($idOfUser));
    }else{
        $errorMsg = "Aucun utilisateur trouvé";
    }
}else{
    $errorMsg = "Aucun utilisateur trouvé";
}