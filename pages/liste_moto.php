<hgroup>
    <h3 class="aligner txtGras">Nos choix de motos</h3>
    <h4 class="text-muted aligner">Pour tous les profils</h4>
</hgroup>

<?php
//include './admin/lib/php/classes/vue_motoDB.class.php';
//récupération des types pour la liste déroulante
$typ = new PermisDB($cnx);
$types = $typ->getType();
$nbr_type = count($types);

//récupération des produits
$vue = new Vue_motoDB($cnx);

$liste = array();
$liste = null;
//sans filtre de produits
if (!isset($_GET['submit_choix_type'])) {
    $liste = $vue->getPasVendu();
}
//avec filtre si on a fait un choix dans la liste déroulante: 
else {
    if (isset($_GET['choix_type']) && $_GET['choix_type'] != "") {
        $liste = $vue->getProduitsByType($_GET['choix_type']);
    } else {
        $liste = $vue->getPasVendu();
    }
}
//echo $_GET['choix_type'];
?>

<div class="container text-left">
    <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get">
        <div class="row">  
            <div class="col-sm-1 hidden-sm txtGras text-right">Permis</div>
            <div class="col-sm-11">
                <select name="choix_type" id="choix_type">
                    <option value="">Choix</option>
                    <option value="">Tous permis</option>
                    <?php
                    for ($i = 0; $i < $nbr_type; $i++) {
                        ?>
                        <option value="<?php print $types[$i]->id_permis; ?>">
                            <?php
                            print $types[$i]->grade;
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
            <div class="row liste">
                <div class="col-sm-3 offset-1 demiContour text-center">
                    <br><img width="500" src="admin/images/<?php print $liste[$i]['image']; ?>" alt="moto"/><br><br>
                </div>
                <div class="aff col-sm-5 borderBottom">
                    <?php
                    $perm = $liste[$i]['permis'];
                    print "<br/> <b>Marque : </b>" . $liste[$i]['marque'];
                    print "<br/> <b>Modele : </b>" . $liste[$i]['modele'];
                    print "<br/> <b>Année : </b>" . $liste[$i]['annee'];
                    print "<br/> <b>Couleur : </b>" . $liste[$i]['couleur'];
                    print "<br/> <b>Km : </b>" . $liste[$i]['km'];
                    print "<br/> <b>Cylindrée : </b>" . $liste[$i]['cylindree'] . "cc";
                    print "<br/> <b>Puissance : </b>" . $liste[$i]['puissance'] . "kW";
                    if (strcmp($liste[$i]['permis'], "A"))
                        print "<br/> <b>Permis : </b>" . $liste[$i]['permis'] . " (ou supérieur)";
                    else
                        print "<br/> <b>Permis : </b>" . $liste[$i]['permis'];
                    print "<br/> <b>Prix : </b>" . $liste[$i]['prix'] . " €<br/>";
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
        <h2>Aucune moto disponible !</h2>
    </div>
    <?php
}
