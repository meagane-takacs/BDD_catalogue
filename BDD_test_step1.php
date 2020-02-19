<?php

include('functions_BDD.php');

$bdd = connection();

// On récupère tout le contenu de la table
$tableArticle = $bdd->query('SELECT * FROM articles');

// On affiche chaque entrée une à une
while ($donnees = $tableArticle->fetch())
{
    ?>
    <p>
        Article n°  <?php echo $donnees['idArticles']; ?> <?php echo $donnees['nom']; ?>
    </p>
    <?php
}

$tableArticle->closeCursor(); // Termine le traitement de la requête

?>