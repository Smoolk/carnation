<?php

class Vue_carDB {

    private $_db;
    private $_array = array();

    public function __construct($db) {//contenu de $cnx (index)
        $this->_db = $db;
    }

    public function getProduitsByType($id_type) {
        try {
            $this->_db->beginTransaction();
            $query = "select * from vue_car where id_type=:id_type";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':id_type', $id_type);
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
            $query = "select * from vue_car order by id_type, prix";
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
