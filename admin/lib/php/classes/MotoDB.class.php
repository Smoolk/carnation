<?php

class MotoDB {

    private $_db;
    private $_array = array();

    public function __construct($db) {//contenu de $cnx (index)
        $this->_db = $db;
    }

    public function updateMoto($champ, $nouveau, $id) {
        
        try {
            // PREPARER LA REQUETE
            $query = "UPDATE moto set " . $champ . " = '" . $nouveau . "' where id_moto ='" . $id . "'";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }

    public function getMoto() {
        try {
            $query = "select * from moto";
            $resultset = $this->_db->prepare($query);
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
