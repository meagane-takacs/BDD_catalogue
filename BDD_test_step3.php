<?php

include('functions_BDD.php');

$bdd = connection();

$bdd->exec('INSERT INTO articles(description, prix, img, stock, indicateur, poids, nom, catégories_idCatégories)VALUES(\'Voldemort\', \'15\', \'https://s1.thcdn.com/productimg/1600/1600/12017916-1874673805673371.jpg\', \'10\', 1, \'1200\', \'VoldemortPOP\', \'4\')');

echo 'L\'article a bien été ajouté !';

header ('Location: BDD_test_step1.php');

?>