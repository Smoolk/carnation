<h2>Login administration</h2>
<?php 
//si on a cliqué sur le bouton d'envoi du formulaire
if(isset($_POST['submit_login'])){
    //pour pouvoir utiliser les données hors tabl $_GET ou $_POST
    extract($_POST,EXTR_OVERWRITE);
    $log = new AdminDB($cnx);
    //$admin et $password sont les noms des champs du formulaire
    $admin = $log->getAdmin($login, $password);
    //var_dump($admin);
    $nom = $login;
    if(is_null($admin)){
        print "<br/><h2 class='red'> Données incorrectes</h2>";        
    }
    else {
        
        $_SESSION['admin']=1;
        $_SESSION['nom']=$nom;
        unset($_SESSION['page']);        
        print "<meta http-equiv=\"refresh\": Content=\"0;URL=./admin/index.php\">";
    }
    
}
?>

<form action="<?php print $_SERVER['PHP_SELF']; ?>" method="post">

    <label for="login">Login :</label>
    <input type="text" name="login" id="admin" placeholder ="Entre votre nom"/><br/>

    <label for="password">Mot de passe :</label> 
    <input placeholder="Entrez votre mot de passe"type="password" name="password" id="password"/><br/>
    <button class="btn btn-primary" type="submit" name="submit_login" id="submit_login">Se connecter</button>
</form>





