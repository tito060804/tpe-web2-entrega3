<?php

class vinotecaModel {
    private $db;

    public function __construct() {
       $this->db = new PDO('mysql:host=localhost;dbname=db_vinoteca;charset=utf8', 'root', '');
    }
 
    public function getvinos() {
        $sql = 'SELECT * FROM db_vinos';

        // 2. Ejecuto la consulta
        $query = $this->db->prepare($sql);
        $query->execute();
    
        // 3. Obtengo los datos en un arreglo de objetos
        $vinos = $query->fetchAll(PDO::FETCH_OBJ); 
    
        return $vinos;
    }

    public function getvinoindividual($id) {
        $query= $this->db->prepare('SELECT * FROM db_vinos  WHERE `id_vino` = ?');
        $query->execute([$id]);
        $vino= $query->fetch(PDO::FETCH_OBJ);

        return $vino;
    }
 

    public function eliminarvino($id) {
        $query = $this->db->prepare('DELETE FROM db_vinos WHERE id_vino = ?');
        $query->execute([$id]);
    }


    public function insertvino($nombre_vino, $tipo) { 
        $query = $this->db->prepare('INSERT INTO db_vinos(nombre_vino, tipo) VALUES (?, ?)');
        $query->execute([$nombre_vino, $tipo]);
    
        $id = $this->db->lastInsertId();
    
        return $id;
    }

    function updatevino($nombre_vino, $tipo) {    
        $query = $this->db->prepare('UPDATE db_vinos SET nombre_vino = ? , tipo= ? WHERE id_vino = ?');
        $query->execute([$nombre_vino, $tipo]);
    }



}