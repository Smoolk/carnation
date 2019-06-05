<?php

class produitsDB extends produits {

    private $_db;
    private $_array = array();

    public function __construct($db) {//contenu de $cnx (index)
        $this->_db = $db;
    }

    public function updateProduit($champ, $nouveau, $id) {

        try {
            // PREPARER LA REQUETE
            $query = "UPDATE produits set " . $champ . " = '" . $nouveau . "' where id_produit ='" . $id . "'";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }

    public function getProduit() {
        try {
            $query = "select * from produit";
            $resultset = $this->_db->prepare($query);
            //$resultset->bindValue(':login',$login);
            //$resultset->bindValue(':password',$password);
            $resultset->execute();

            while ($data = $resultset->fetch()) {
                $_array[] = $data;
            }
        } catch (PDOException $e) {
            print $e->getMessage();
        }
        if (!empty($_array)) {
            return $_array;
        } else {
            return null;
        }
    }

}
