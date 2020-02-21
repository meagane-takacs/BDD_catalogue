<?php
session_start();
var_dump($_SESSION);
include('functions_BDD.php');
include('functions.php');


$bdd = connection();

if (empty ($_SESSION)) {

    echo "Votre commande ne contient aucun article";
} else {
    $cmdArticle = $bdd->prepare('INSERT INTO `commandes` (date, clients_idClients ) VAlUES (CURRENT_DATE, 1)');
    $cmdArticle->execute(array($_SESSION['date'], $_SESSION['clients_idClients']));

    echo 'Votre commande à bien été prise en compte';

    header('Location: commande.php');
} ?>

