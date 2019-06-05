<hgroup>
    <h3 class="aligner txtGras">Produits  </h3>
    <h4 class="text-muted aligner">La meilleure qualité au prix équitable.</h4>
</hgroup>

<?php
//récupération des types pour la liste déroulante
$typ = new TypeDB($cnx);
$types = $typ->getType();
$nbr_type = count($types);

//récupération des produits
$vue = new Vue_carDB($cnx);

$liste = array();
$liste = null;
//sans filtre de produits
if (!isset($_GET['submit_choix_type'])) {
    $liste = $vue->getAllProduits();
}
//avec filtre si on a fait un choix dans la liste déroulante: 
else {
    if (isset($_GET['choix_type']) && $_GET['choix_type'] != "") {
        $liste = $vue->getProduitsByType($_GET['choix_type']);
    } else {
        $liste = $vue->getAllProduits();
    }
}
?>

<div class="container text-left">
    <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get">
        <div class="row">  
            <div class="col-sm-1 hidden-sm txtGras text-right">Type de produit : </div>
            <div class="col-sm-11">
                <select name="choix_type" id="choix_type">
                    <option value="">Choix</option>
                    <option value="">Tous les produits</option>
                    <?php
                    for ($i = 0; $i < $nbr_type; $i++) {
                        ?>
                        <option value="<?php print $types[$i]->id_type; ?>">
                            <?php
                            print $types[$i]->nom_type;
                            ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
                <input value="Valider" type="submit" name="submit_choix_type" id="submit_choix_type">

            </div>
        </div>
    </form>
</div>

<?php
if ($liste != null) {
    $nbr = count($liste);
    ?>
    <div class="container ecartTop3pc">
        <?php
        for ($i = 0; $i < $nbr; $i++) {
            ?>
            <div class="row">
                <div class="col-sm  demiContour text-left">
                    <br><img width="500" src="admin/images/<?php print $liste[$i]['image']; ?>" alt="produit"/><br><br>
                </div>
                <div class="col-sm text-right borderBottom">
                    <?php
                    $perm = $liste[$i]['nom_type'];
                    print "<br/> <b>Nom : </b>" . $liste[$i]['nom_produit'];
                    print "<br/> <b>Type : </b>" . $liste[$i]['nom_type'];
                    print "<br/> <b>Description : </b>" . $liste[$i]['description'];
                    if ($liste[$i]['stock'] > 0) {
                        print "<br/><br/>Il reste " . $liste[$i]['stock'] . " exemplaire";
                        if ($liste[$i]['stock'] > 1) {
                            print "s";
                        }
                        print " en stock<br/> ";
                    }
                    print "<br/> <b>Prix : </b>" . $liste[$i]['prix']. "€";
                    ?>
                </div>
            </div>
            <br><br><br>
            <?php
        }
        ?>
    </div>
    <?php
}//fin if $nbr >0
else {
    ?>
    <div class="container">
        <h2>Pas de produits disponibles actuellement !</h2>
    </div>
    <?php
}
