<?php

//Permet à l'utilisateur de rester connecté
session_start();
require('actions/database.php');

// On vérifie si notre variable existe pour executer le bouton 's'inscrire'
if(isset($_POST['validate'])){
    //On vérifie si l'utilisateur remplie bien tout les champs
    if(!empty($_POST['pseudo']) AND !empty($_POST['password']) ){

        //On stocke toutes les données récupérées dans des variables
        //'htmlspecialchars'=> éviter qu'un utilisateur mette du code HTML dans les champs
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
       
        //On vérifie si le mot de passe correspond bien au MDP de la BDD
        $user_password = htmlspecialchars($_POST['password']);

        //On vérifie si l'utilisateur existe dans la table users
        //$bdd -> variable qui stocke la base de données (database.php) 
        //Récupérer les données dans la table 'users' qui correspond au pseudo dans la BDD
        //La méthode 'prepare' nous permer de récupérer les données dans la table 'users'
        $checkIfUserExists = $bdd->prepare('SELECT * FROM users WHERE pseudo = ?');
        $checkIfUserExists->execute(array($user_pseudo));

        //'rowCount'=> permet de recuperer le nombre de données lors de la requete
        if($checkIfUserExists->rowCount() > 0){

            //'$usersInfos'=> Variable qui stocke toutes les données de l'utilisateur lors de la requete sous forme de tableau (fetch)
            $usersInfos = $checkIfUserExists->fetch(); //Récupérer les données de l'utilisateur
            if(password_verify($user_password, $usersInfos['mdp'])){ //On vérifie que le pseudo correspond au mdp crypté

            //Authentifier l'utilisateur sur le site et récupérer ses données dans des variables globales sessions
                $_SESSION['auth'] = true;
                $_SESSION['id'] = $usersInfos['id'];
                $_SESSION['lastname'] = $usersInfos['nom'];
                $_SESSION['firstname'] = $usersInfos['prenom'];
                $_SESSION['pseudo'] = $usersInfos['pseudo'];

                //Rediriger l'utilisateur vers la page d'accueil
                header('Location: index.php');


            }else{
                $errorMsg = "Votre mot de passe est incorrect !"; 
            }


        }else{
            $errorMsg = "Votre pseudo est incorrect !"; 
        }

 
}else{
    $errorMsg = "Veuillez svp compléter tous les champs !"; 
}
}