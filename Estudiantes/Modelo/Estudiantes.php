<?php /** @noinspection ALL */

require_once ('../../Conexion.php');

class Estudiantes extends Conexion{

    public function __construct(){
        $this->db =parent::__construct();
    }

    public function add($Nombre, $Apellido, $Documento, $Correo, $Materia, $Docente, $Promedio, $Fecha){
        $statement = $this->db->prepare("INSERT INTO estudiantes (NOMBRE, APELLIDO, DOCUMENTO, CORREO, MATERIA, DOCENTE, PROMEDIO, FECHA_REGISTRO) VALUES (:Nombre, :Apellido, :Documento, :Correo, :Materia, :Docente, :Promedio, :Fecha)");
        $statement->bindParam(':Nombre', $Nombre);
        $statement->bindParam(':Apellido', $Apellido);
        $statement->bindParam(':Documento', $Documento);
        $statement->bindParam(':Correo', $Correo);
        $statement->bindParam(':Materia', $Materia);
        $statement->bindParam(':Docente', $Docente);
        $statement->bindParam(':Promedio', $Promedio);
        $statement->bindParam(':Fecha', $Fecha);
        if($statement->execute()){
            header('Location: ../Page/index.php');
        }else{
            header('Location: ../Page/agregar.php');
        }
    }

    public function update($Id, $Nombre, $Apellido, $Documento, $Correo, $Materia, $Docente, $Promedio, $Fecha){
        $statement = $this->db->prepare("UPDATE estudiantes SET NOMBRE = :Nombre, APELLIDO = :Apellido, DOCUMENTO = :Documento, CORREO = :Correo, MATERIA = :Materia, DOCENTE = :Docente, PROMEDIO = :Promedio, FECHA_REGISTRO = :Fecha WHERE ID_ESTUDIANTE = :Id");
        $statement->bindParam(':Id', $Id);
        $statement->bindParam(':Nombre', $Nombre);
        $statement->bindParam(':Apellido', $Apellido);
        $statement->bindParam(':Documento', $Documento);
        $statement->bindParam(':Correo', $Correo);
        $statement->bindParam(':Materia', $Materia);
        $statement->bindParam(':Docente', $Docente);
        $statement->bindParam(':Promedio', $Promedio);
        $statement->bindParam(':Fecha', $Fecha);
        if($statement->execute()){
            header('Location: ../Page/index.php');
        }else{
            header('Location: ../Page/actualizar.php');
        }
    }

    public function delete($Id){
        $statement = $this->db->prepare("DELETE FROM estudiantes WHERE Id_ESTUDIANTE = :Id");
        $statement->bindParam(':Id', $Id);
        if($statement->execute()){
            header('Location: ../Page/index.php');
        }else{
            header('Location: ../Page/eliminar.php');
        }

    }

    public function get(){
        $rows = null;
        $statement = $this->db->prepare("SELECT * FROM estudiantes");
        $statement->execute();
        while($result = $statement->fetch()){
            $rows[] = $result;
        }
        return $rows;

    }

    public function getById($Id){
        $rows = null;
        $statement = $this->db->prepare("SELECT ID_ESTUDIANTE, NOMBRE, APELLIDO, DOCUMENTO, CORREO, MATERIA, DOCENTE, PROMEDIO, FECHA_REGISTRO FROM estudiantes WHERE ID_ESTUDIANTE = :Id");
        $statement->bindParam(':Id', $Id);
        $statement->execute();
        while($result = $statement->fetch()){
            $rows[] = $result;
        }
        return $rows;

    }

    public function search($Search){
        $rows = null;
        $statement = $this->db->prepare("SELECT ID_ESTUDIANTE, NOMBRE, APELLIDO, DOCUMENTO, CORREO, MATERIA, DOCENTE, PROMEDIO, FECHA_REGISTRO FROM estudiantes WHERE NOMBRE LIKE concat('%', :Search, '%') OR APELLIDO LIKE concat('%', :Search, '%') OR DOCUMENTO LIKE concat('%', :Search, '%') OR CORREO LIKE concat('%', :Search, '%') OR MATERIA LIKE concat('%', :Search, '%') OR DOCENTE LIKE concat('%', :Search, '%') ");
        $statement->bindParam(':Search', $Search);
        $statement->execute();
        while($result = $statement->fetch()){
            $rows[] = $result;
        }
        return $rows;
    }
}
?>