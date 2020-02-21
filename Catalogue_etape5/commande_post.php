<?php

include('functions_BDD.php');
include('functions.php');
session_start();

$bdd = connection();

if (empty ($_POST)) {

    echo "Votre commande ne contient aucun article";
} else {
    $cmdArticle = $bdd->prepare('INSERT INTO `commandes` (date, clients_idClients ) VAlUES (CURRENT_DATE, 1)');
    $cmdArticle->execute(array($_POST['date'], $_POST['clients_idClients']));

    echo 'Votre commande à bien été prise en compte';

    header('Location: commande.php');
} ?>

