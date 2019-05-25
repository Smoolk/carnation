<?php
//en tête de toutes les pages de admin/pages
include ('lib/php/verifier_connexion.php');
?>

<?php
//récupération des produits
$vue = new Vue_motoDB($cnx);
$liste = array();
$liste = null;

$liste = $vue->getAllProduits();
$nbr = count($liste);
?>

<br/>

<h2 id="titre">Tableau dynamique</h2>
<h3>Vous pouvez modifier le prix ou mettre le statut à 1 si la moto est vendue</h3>


<div class="container table">
    <table class="table-responsive">
        <tr>
            <th class="ecart">Id</th>
            <th class="ecart">Marque</th>
            <th class="ecart">Modèle</th>
            <th class="ecart">Année</th>
            <th class="ecart">Couleur</th>
            <th class="ecart">KM</th>
            <th class="ecart">Cylindrée</th>
            <th class="ecart">Puissance</th>
            <th class="ecart">Image</th>
            <th class="ecart">Permis</th>
            <th class="ecart">Prix</th>
            <th class="ecart">Statut(vente)</th>
        </tr>
        <?php
        for ($i = 0; $i < $nbr; $i++) {
            ?>
            <tr>
                <td class="ecart"><?php print $liste[$i]['idmoto']; ?></td>
                <td class="ecart"><?php print $liste[$i]['marque']; ?></td>
                <td class="ecart"><?php print $liste[$i]['modele']; ?></td>
                <td class="ecart"><?php print $liste[$i]['annee']; ?></td>
                <td class="ecart"><?php print $liste[$i]['couleur']; ?></td>
                <td class="ecart"><?php print $liste[$i]['km']; ?></td>
                <td class="ecart"><?php print $liste[$i]['cylindree']; ?></td>
                <td class="ecart"><?php print $liste[$i]['puissance']; ?></td>
                <td class="ecart"><?php print $liste[$i]['image']; ?></td>
                <td class="ecart"><?php print $liste[$i]['permis']; ?></td>
                <!--Modifiable : prix,vendu-->
                <td><span contenteditable="true" name="prix" class="ecart" id="<?php print $liste[$i]['idmoto']; ?>">
                        <?php print $liste[$i]['prix']; ?></span>
                </td>
                <td><span contenteditable="true" name="vendu" class="ecart" id="<?php print $liste[$i]['idmoto']; ?>">
                        <?php print $liste[$i]['vendu']; ?></span>
                </td>

            </tr>
            <?php
        }
        ?>
    </table>  
</div>