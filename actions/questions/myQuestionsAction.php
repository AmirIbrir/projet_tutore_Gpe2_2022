<?php

//Fichier qui va nous permettre de récupérer toutes les questions de l'utilisteur connecté

require('actions/database.php');

$getAllQuestions = $bdd->prepare('SELECT id, titre, description FROM questions WHERE id_auteur = ? ORDER BY id DESC');    
$getAllQuestions->execute(array($_SESSION['id']));