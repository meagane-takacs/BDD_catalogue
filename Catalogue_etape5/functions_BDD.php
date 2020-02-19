<?php
function connection()
{
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=commandes;charset=utf8', 'mtakacs', 'Eebslpdmv1904');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    return $bdd;
}

?>