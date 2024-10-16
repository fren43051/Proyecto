<?php /** @noinspection ALL */

require_once ('../../Conexion.php');

class Materias extends Conexion{
    public function __construct(){
        $this->db = parent::__construct();
    }

    public function add($Materia){
        $statement = $this->db->prepare("INSERT INTO materias (MATERIA) VALUES (:Materia)");
        $statement->bindParam(':Materia', $Materia);
        if($statement->execute()){
            header('Location: ../Page/index.php');
        }else{
            header('Location: ../Page/agregar.php');
        }

    }

    public function get(){
        $rows = null;
        $statement = $this->db->prepare("SELECT * FROM materias");
        $statement->execute();
        while($result = $statement->fetch()){
            $rows[] = $result;
        }
        return $rows;

    }

    public function getById($Id){
        $rows = null;
        $statement = $this->db->prepare("SELECT * FROM materias WHERE ID_MATERIA = :Id");
        $statement->bindParam(':Id', $Id);
        $statement->execute();
        while($result = $statement->fetch()){
            $rows[] = $result;
        }
        return $rows;

    }

    public function update($Id, $Materia){
        $statement = $this->db->prepare("UPDATE materias SET MATERIA = :Materia WHERE ID_MATERIA = :Id");
        $statement->bindParam(':Id', $Id);
        $statement->bindParam(':Materia', $Materia);
        if($statement->execute()){
            header('Location: ../Page/index.php');
        }else{
            header('Location: ../Page/actualizar.php');
        }

    }

    public function delete($Id){
        $statement = $this->db->prepare("DELETE FROM materias WHERE ID_MATERIA = :Id");
        $statement->bindParam(':Id', $Id);
        if($statement->execute()){
            header('Location: ../Page/index.php');
        }else{
            header('Location: ../Page/eliminar.php');
        }

    }

}
?>