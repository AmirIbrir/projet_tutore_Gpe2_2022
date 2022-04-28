<?php
//Eviter failles de sécurités lorsque l'utilisateur ne se connecte pas et est redirigé vers la page index.php

session_start();

//Vérifier si l'utilisateur est authentifié/Vérifier si la variable n'est pas déclarée
if(!isset($_SESSION['auth'])){
    header('Location: login.php');
}