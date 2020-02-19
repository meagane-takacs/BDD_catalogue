<?php

include('functions_BDD.php');

$bdd = connection();

// On récupère tout le contenu de la table
$tableArticle = $bdd->query('SELECT nom FROM articles WHERE stock=\'0\'');

// On affiche chaque entrée une à une
while ($donnees = $tableArticle->fetch())
{
    echo $donnees['nom'] . '<br />';
}
$tableArticle->closeCursor(); // Termine le traitement de la requête

?>