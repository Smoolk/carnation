<?php
//en tête de toutes les pages de admin/pages
include ('lib/php/verifier_connexion.php');
?>

<h3>Vous êtes maintenant connecté en administrateur</h3>
<?php
echo "Votre identifiant de session : ";
echo $_SESSION['nom']; ?><br/>