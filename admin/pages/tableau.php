<?php
//en tête de toutes les pages de admin/pages
include ('lib/php/verifier_connexion.php');
?>

<?php
//récupération des produits
$vue = new Vue_carDB($cnx);
$liste = array();
$liste = null;

$liste = $vue->getAllProduits();
$nbr = count($liste);
?>

<br/>

<h2 id="titre">Tableau dynamique</h2>
<h3>Les valeurs reprenant les descriptions, les stocks ainsi que les prix peuvent être modifiées.</h3>


<div class="container table" style="width:80%">
    <table class="table-responsive">
        <tr>
            <th class="ecart">Id</th>
            <th class="ecart">Nom du produit</th>
            <th class="ecart">Description</th>
            <th class="ecart">Stock</th>
            <th class="ecart">Type de produit</th>
            <th class="ecart">Prix</th>
        </tr>
        <?php
        for ($i = 0; $i < $nbr; $i++) {
            ?>
            <tr>
                <td class="ecart"><?php print $liste[$i]['id_produit']; ?></td>
                <td class="ecart"><?php print $liste[$i]['nom_produit']; ?></td>
                <td><span contenteditable="true" name="description" class="ecart" id="<?php print $liste[$i]['id_produit']; ?>">
                        <?php print $liste[$i]['description']; ?></span>
                </td>
                <td><span contenteditable="true" name="stock" class="ecart" id="<?php print $liste[$i]['id_produit']; ?>">
                        <?php print $liste[$i]['stock']; ?></span>
                </td>
                <td class="ecart"><?php print $liste[$i]['nom_type']; ?></td>
                <td><span contenteditable="true" name="prix" class="ecart" id="<?php print $liste[$i]['id_produit']; ?>">
                        <?php print $liste[$i]['prix']; ?></span>
                </td>

            </tr>
            <?php
        }
        ?>
    </table>  
</div>