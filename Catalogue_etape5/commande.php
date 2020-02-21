<?php
include('functions_BDD.php');
include('functions.php');
session_start();
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



<form  method="POST" action="commande_post.php">
    <input class="submit" type="submit" value="Commander">
</form>



<form method="POST" action="commande_post.php">
    <p>
        <input type="text" name="idClients" placeholder="N° Client">

        <input type="submit" value="Envoyer" />


     </p>
</form>

<?php

$bdd = connection();

$reponse = $bdd->query('SELECT date, clients_idClients FROM commandes');

while ($donnees = $reponse->fetch())
{
    echo '<p>Client n° ' . htmlspecialchars($donnees['clients_idClients']) . ' commande du : ' . htmlspecialchars($donnees['date']) . '</p>';
}


$reponse->closeCursor();
?>


</body>
</html>

