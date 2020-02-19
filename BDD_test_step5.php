<?php

include('functions_BDD.php');

$bdd = connection();

$sumArticles = $bdd->query('SELECT sum(articles.prix*commandes_has_articles.qte) as total FROM commandes_has_articles INNER JOIN articles ON articles.idArticles = commandes_has_articles.articles_idArticles INNER JOIN commandes ON commandes.idCommande = commandes_has_articles.commandes_idCommande GROUP BY commandes_has_articles.commandes_idCommande HAVING total BETWEEN \'100\' AND \'550\'
');
while ($donnees = $sumArticles->fetch())
{
    echo $donnees['total']; ?> <br /><?php
}
echo 'La somme à bien été calculée';

$sumArticles->closeCursor();

?>