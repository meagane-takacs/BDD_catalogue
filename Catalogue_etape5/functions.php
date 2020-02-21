

<!--CE FICHIER EST UNE BOITE A OUTIL OU IL Y A TOUTES MES FONCTIONS-->

<?php


function connection()
{
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=commandes;charset=utf8', 'mtakacs', 'Eebslpdmv1904', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    return $bdd;
}


// Ma première fonction permet d'appeler chaque article de façon indépendante.
function afficheArticle1()
{
    $article1 = array('photos/Bracelet1.jpg', 'Bracelet', 200);
    echo $article1[0];
    echo $article1[1];
    echo $article1[2];
}


function afficheArticle2()
{
    $article2 = array('photos/Montre.jpg', 'Montre', 300);
    echo $article2[0];
    echo $article2[1];
    echo $article2[2];
}

function afficheArticle3()
{
    $article3 = array('photos/collier.jpg', 'Collier', 300);
    echo $article3[0];
    echo $article3[1];
    echo $article3[2];
}


//function afficheArticle($article)
//
//// fonction avec le foreach de base vu avec Alexandre (On rentre dans un tableau dans une première boucle puis dans un second dans une deuxième)
//{
//
//    ?>
<!--    <div class="--><?php //echo 'container1'?><!--">-->
<!--        --><?php
//        foreach ($article as $key2=> $attribut) {
//            if  ($key2 === 0) {
//                ?>
<!--                <img class="photos" src="--><?php //echo $attribut ?><!--"/>-->
<!--                --><?php
//
//            } elseif ($key2 === 1) {
//                ?>
<!--                <div class="articles">-->
<!--                    --><?php //echo $attribut ?>
<!--                </div>-->
<!--                --><?php
//
//            } elseif  ($key2 === 2) {
//                ?>
<!--                <div class="price">-->
<!--                    <p>-->
<!--                        --><?php //echo  $attribut ?><!-- euros-->
<!--                    </p>-->
<!--                </div>-->
<!--                --><?php
//            }
//        } ?>
<!--    </div>-->
<!--    --><?php
//}


// deuxième fonction qui est plus simple que la première mais fait la même chose et répond au consigne

function afficheArticle($key, $name, $price, $img)
{
    ?>
    <div class="<?php echo 'container1' ?>">

        <img class="photos" src="<?php echo $img ?>"/>
        <div class="articles"><p><?php echo $name ?></p>

        </div>
        <div class="price"><p><?php echo $price ?> euros</p>
        </div>

        <input type="checkbox" name="choix[]" class="choice" value="<?php echo $key ?>">

        <div class="buttonQte">
            <label for="tentacles">Quantité:</label>
            <!-- Création d'un tableau tentacles pour stocker les données-->
            <input type="number" id="tentacles" name="tentacles[<?= $key ?>]"
                   min="1" max="100">
        </div>
    </div>

    <?php

}

function afficheArticlePanier($key, $name, $price, $img, $Qte)
{
    ?>
    <div class="<?php echo 'container1' ?>">

        <img class="photos" src="<?php echo $img ?>"/>
        <div class="articles"><p><?php echo $name ?></p>

        </div>
        <div class="price"><p><?php echo $price ?> euros</p>
        </div>

        <input type="hidden" name="choix[]" class="choice" value="<?php echo $key ?>">

        <div class="buttonQtePanier">
            <label for="tentacles">Modifier la quantité:</label>
            <input type="number" id="tentacles" name="tentacles[<?= $key ?>]"
                   min="1" max="100" value="<?php echo $Qte ?>" placeholder="1">
        </div>

        <input class="delete" type="submit" value="Supprimer du panier">
    </div>

    <?php

}


function totalPanier($sum, $price_article, $qteArticle)

{
    if (empty ($qteArticle)) {
        $qteArticle = 1 ;
    }
//    var_dump($sum, $price_article, $qteArticle);
    return $sum = $sum + $price_article * $qteArticle;
}



function insertCommandef ()

{
    $bdd = connection ();
    if (empty ($_POST)) {
        echo "Votre commande ne contient aucun article";
        var_dump($_POST);
    } else {
        $cmdArticle = $bdd->prepare('INSERT INTO `commandes` (date, clients_idClients ) VAlUES (CURRENT_DATE, 1)');
        $cmdArticle->execute();

        $id_nouveau = $bdd->lastInsertId();
        var_dump($id_nouveau);
var_dump($_POST);
        $cmdHasArt = $bdd->prepare('INSERT INTO `commandes_has_articles` (commandes_idCommande, articles_idArticles,qte) VAlUES (?, ?, ?)');

        foreach ($_POST['choix'] as $idArticle) {
            $cmdHasArt->execute(array($id_nouveau, $idArticle, $_POST['tentacles'][$idArticle]));
        }

        echo 'Votre commande à bien été prise en compte';

    }
}

function insertStockf()
{
    $cmdStock = $bdd->prepare('UPDATE `articles` (idArticles, Stock) SET (lastInsetId, ?)');
    $cmdStock->execute(array($_POST['idArticles'], $_POST['Stock']));
}
?>