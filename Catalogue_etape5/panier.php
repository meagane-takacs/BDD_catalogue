<!--MA PAGE PANIER EST LA PAGE QUI MONTRE A L'ACHETEUR CE QU'IL A SELECTIONNER DANS SON TABLEAU
 C'EST LE FICHIER QUI RECUPERE LES INFOS QUE L'UTILISATEUR A RENTRE-->

<?php //var_dump($_POST);

include('functions_BDD.php');
include('functions.php');

if (!isset ($_POST['choix'])) {
//J'affiche ceci:
    echo "Votre panier est vide";
} else {

$bdd = connection();
$idIn = implode(",", $_POST['choix']);
$tableArticle = $bdd->query('SELECT * FROM `articles` WHERE articles.idArticles IN (' . $idIn . ')');


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
   <form method="POST" action="panier.php">


        <?php
        $sum = 0;
        $donnees = $tableArticle->fetchAll();
        foreach ($donnees as $produit) {

            afficheArticlepanier($produit['idArticles'], $produit['nom'], $produit['prix'], $produit['img'], $_POST['tentacles'][$produit['idArticles']]);
            $sum = totalPanier($sum, $produit['prix'], $_POST['tentacles'][$produit['idArticles']]);
        }
        ?>
       <div class="TotalPanier">
           <?php
           echo "Total du panier : " . $sum . " euros"; ?>
       </div>

        <input class="submit" type="submit" value="Mettre à jour le panier">

    </form>

   <form  method="POST" action="commande.php">
       <?php foreach ($donnees as $produit) {?>
           <input type="hidden" name="choix[]" class="choice" value="<?php echo $produit['idArticles'] ?>">
           <input type="hidden" id="tentacles" name="tentacles[<?= $produit['idArticles'] ?>]"
                   min="1" max="100" value="<?php echo $_POST['tentacles'][$produit['idArticles']] ?>"><?php
       }
       ?>

       <input class="submit" type="submit" value="Valider ma commande">
   </form>

    <?php
}

?>


</body>
</html>