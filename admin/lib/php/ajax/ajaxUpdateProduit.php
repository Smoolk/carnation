<?php
header('Content-Type: application/json');
require '../pgConnect.php';
require '../classes/Connexion.class.php';
require '../classes/produits.class.php';
require '../classes/produitsDB.class.php';
require '../classes/Vue_carDB.class.php';
require '../classes/vue_car.class.php';




$cnx = Connexion::getInstance($dsn,$user,$pass);

try{       
   $update= new produitsDB($cnx);
   
   extract($_GET,EXTR_OVERWRITE);
    $parametre = 'id='.$id.'&champ='.$champ.'&nouveau='.$nouveau;
    $update->updateProduit($champ, $nouveau, $id);
    print json_encode($update); //facultatif
}
catch(PDOException $e){
    print $e->getMessage()." ".$e->getLine()." ".$e->getTrace()." ".$e->getCode();
}

