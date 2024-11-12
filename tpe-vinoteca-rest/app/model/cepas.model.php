<?php

class cepasModel {
    private $db;

    public function __construct() {
       $this->db = new PDO('mysql:host=localhost;dbname=db_vinoteca;charset=utf8', 'root', '');
    }

    public function getcepas() {
        $sql = 'SELECT * FROM cepa';

        // 2. Ejecuto la consulta
        $query = $this->db->prepare($sql);
        $query->execute();
    
        // 3. Obtengo los datos en un arreglo de objetos
        $cepas = $query->fetchAll(PDO::FETCH_OBJ); 
    
        return $cepas;
    }

    public function getcepaindividual($id) {
        $query= $this->db->prepare('SELECT * FROM cepa  WHERE `id_cepa` = ?');
        $query->execute([$id]);
        $cepa= $query->fetch(PDO::FETCH_OBJ);

        return $cepa;
    }
 

    public function eliminarcepa($id) {
        $query = $this->db->prepare('DELETE FROM cepa WHERE id_cepa = ?');
        $query->execute([$id]);
    }


    public function insertcepa($nombre_cepa, $aroma, $maridaje, $textura) { 
        $query = $this->db->prepare('INSERT INTO cepa( nombre_cepa, aroma, maridaje, textura) VALUES (?, ? ,? ,?)');
        $query->execute([$nombre_cepa, $aroma, $maridaje, $textura]);
    
        $id = $this->db->lastInsertId();
    
        return $id;
    }
#agrege $id_cepa para probar si funcona
    function updatecepas($nombre_cepa, $aroma, $maridaje, $textura, $id_cepa) {    
        $query = $this->db->prepare('UPDATE cepa SET nombre_cepa= ?, aroma= ?, maridaje= ?, textura= ? WHERE id_cepa = ?');
        $query->execute([$nombre_cepa, $aroma, $maridaje, $textura, $id_cepa]);
    }
}