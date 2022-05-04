<?php

//Permet à l'utilisateur de rester connecté
session_start();

//'require' permet de planter la page si erreur au niveau du chemin
require('actions/database.php');

// On vérifie si notre variable existe pour executer le bouton 's'inscrire'
if(isset($_POST['validate'])){
    //On vérifie si l'utilisateur remplie bien tout les champs
    if(!empty($_POST['pseudo']) AND !empty($_POST['lastname']) AND !empty($_POST['firstname']) AND !empty($_POST['password']) ){
        //On stocke toutes les données récupérées dans des variables
        //'htmlspecialchars'=> éviter qu'un utilisateur mette du code HTML dans les champs
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $user_lastname = htmlspecialchars($_POST['lastname']);
        $user_firstname = htmlspecialchars($_POST['firstname']);
        //'password_hash'=> 2 parametres: crypte les MDP dans la BDD et utilise l'algorythme de cryptage par défault
        $user_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        //Verifier en fonction du pseudo si l'utilisateur est inscrit sur le site
        //Récupère tout les pseudos de la table users dont le pseudo existe bien
        $checkIfUserAlreadyExists = $bdd->prepare('SELECT pseudo FROM users WHERE pseudo = ?');
        $checkIfUserAlreadyExists->execute(array($user_pseudo));

        if($checkIfUserAlreadyExists->rowCount()==0){

            //Insérer l'utilisateur dans la BDD
            $insertUserOnWebsite= $bdd->prepare('INSERT INTO users(pseudo, nom, prenom, mdp) VALUES(?,?,?,?)');
            $insertUserOnWebsite->execute(array($user_pseudo, $user_lastname, $user_firstname, $user_password));
            
            $getInfosOfThisUserReq = $bdd->prepare('SELECT id, pseudo, nom, prenom FROM users WHERE nom = ? AND prenom = ? AND pseudo = ?');
            $getInfosOfThisUserReq->execute(array($user_lastname, $user_firstname, $user_pseudo));
        
            $usersInfos = $getInfosOfThisUserReq->fetch();

            //Authentifier l'utilisateur sur le site et récupérer ses données dans des variables globales sessions
            $_SESSION['auth'] = true;
            $_SESSION['id'] = $usersInfos['id'];
            $_SESSION['lastname'] = $usersInfos['nom'];
            $_SESSION['firstname'] = $usersInfos['prenom'];
            $_SESSION['pseudo'] = $usersInfos['pseudo'];

            //Rediriger l'utilisateur vers la page d'aucceuil
            header('Location: index.php');
        }else{
            $errorMsg = "L'utilsateur existe déja !";
        }

    }else{
    $errorMsg = "Veuillez svp compléter tous les champs !"; 
    }
}