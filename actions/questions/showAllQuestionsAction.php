<?php

require('actions/database.php');

//Récupérer les questions par défaut sans recherche
$getAllQuestions = $bdd->query('SELECT id, id_auteur,titre, description, pseudo_auteur, date_publication FROM questions ORDER BY id DESC LIMIT 0,5');

//Vérifier si la variable "search" existe et n'est pas vide
if(isset($_GET['search']) AND !empty($_GET['search'])){

    //La recherche
    $usersSearch = $_GET['search'];

    //Récupérer toutes les questions dans la table "questions" et où le titre ressemble à la recherche
    $getAllQuestions = $bdd->query('SELECT id, id_auteur,titre, description, pseudo_auteur, date_publication FROM questions WHERE titre LIKE "%'.$usersSearch.'%" ORDER BY id DESC');

}
