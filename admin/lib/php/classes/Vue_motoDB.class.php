<?php

class Vue_motoDB {

    private $_db;
    private $_array = array();

    public function __construct($db) {//contenu de $cnx (index)
        $this->_db = $db;
    }
    public function getProduitsByType($id_permis) {
        try {
            $this->_db->beginTransaction();
            $query = "select * from vue_moto where id_permis=:id_permis and vendu=0 order by idmoto";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':id_permis', $id_permis);
            $resultset->execute();
            $this->_db->commit();
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

    public function getAllProduits() {
        try {
            $this->_db->beginTransaction();
            $query = "select * from vue_moto order by idmoto";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
            $this->_db->commit();
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
    
    public function getPasVendu() {
        try {
            $this->_db->beginTransaction();
            $query = "select * from vue_moto where vendu=0 order by idmoto";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
            $this->_db->commit();
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
