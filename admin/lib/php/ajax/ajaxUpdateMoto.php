<?php
header('Content-Type: application/json');
require '../pgConnect.php';
require '../classes/Connexion.class.php';
require '../classes/Moto.class.php';
require '../classes/MotoDB.class.php';
require '../classes/Vue_motoDB.class.php';
require '../classes/Vue_moto.class.php';




$cnx = Connexion::getInstance($dsn,$user,$pass);

try{       
   $update= new MotoDB($cnx);
   
   extract($_GET,EXTR_OVERWRITE);
    $parametre = 'id='.$id.'&champ='.$champ.'&nouveau='.$nouveau;
    $update->updateMoto($champ, $nouveau, $id);
    print json_encode($update); //facultatif
}
catch(PDOException $e){
    print $e->getMessage()." ".$e->getLine()." ".$e->getTrace()." ".$e->getCode();
}

