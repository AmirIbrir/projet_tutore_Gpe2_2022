<?php

require('actions/database.php');

//Récupérer les données d'une réponse dans la table answers qui possede l'id_question passé en paramètre
$getAllAnswersOfThisQuestion = $bdd->prepare('SELECT id_auteur, pseudo_auteur, id_question, contenu FROM answers WHERE id_question = ? ORDER BY id DESC');
$getAllAnswersOfThisQuestion->execute(array($idOfTheQuestion));

