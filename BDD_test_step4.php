<?php

include('functions_BDD.php');

$bdd = connection();

$bdd->exec("DELETE FROM articles WHERE idArticles=18");

echo 'L\'article a bien été supprimé !';

?>