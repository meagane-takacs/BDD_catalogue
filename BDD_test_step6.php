<?php

include('functions_BDD.php');

$bdd = connection();

$nbcmdcli = $bdd->query('SELECT commandes.clients_idClients, COUNT(commandes.idCommande) as countCmd FROM commandes GROUP BY commandes.clients_idClients');

while ($donnees = $nbcmdcli->fetch())
{
    echo $donnees['clients_idClients']; ?> <br /><?php
    echo $donnees['countCmd']; ?> <br /><?php
}

$nbcmdcli->closeCursor();

?>