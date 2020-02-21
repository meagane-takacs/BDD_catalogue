<?php
include('functions_BDD.php');
include('functions.php');


?>

<!DOCTYPE html>
<html>
<head>
    <title>Catalogue</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style_catalogue5.css">
</head>
<body>


<?php


//$bdd = connection();
//
//$reponse = $bdd->query('SELECT date, clients_idClients FROM commandes');
//
////while ($donnees = $reponse->fetch())

insertCommandef();

//$reponse->closeCursor();

?>

<form method="POST" action="catalogue5_panier.php">
    <input class="submit" type="submit" value="Ok, retour à la boutique">
</form>


</body>
</html>

