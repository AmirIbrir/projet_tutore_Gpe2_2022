<?php
//Fichier de déconnexion

//Déclarer toutes les sessions puis les mettre dans un tableau ensuite les détruire
session_start();
$_SESSION = [];
session_destroy();

//Rediriger vers la page login.php
header('Location: ../../login.php');



