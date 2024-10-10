<?php /** @noinspection ALL */

require_once ('../../Conexion.php');

class Administradores extends Conexion{

    public function __construct(){
        $this->db =parent::__construct();
    }

    public function add($Nombre, $Apellido, $Usuario, $Password){
        $statement = $this->db->prepare("INSERT INTO usuarios (Nombre, Apellido, Usuario, Password, Perfil, Estado) VALUES (:Nombre, :Apellido, :Usuario, :Password, :Administrador, :Activo)");
        $statement->bindParam(':Nombre', $Nombre);
        $statement->bindParam(':Apellido', $Apellido);
        $statement->bindParam(':Usuario', $Usuario);
        $statement->bindParam(':Password', $Password);
        if($statement->execute()){
            header('Location: ../Page/index.php');
        }else{
            header('Location: ../Page/agregar.php');
        }
    }

    public function get(){
        $rows = null;
        $statement = $this->db->prepare("SELECT * FROM usuarios WHERE Perfil = 'Administrador'");
        $statement->execute();
        while($result = $statement->fetch()){
            $rows[] = $result;
        }
        return $rows;

    }

    public function getById($Id){
        $rows = null;
        $statement = $this->db->prepare("SELECT * FROM usuarios WHERE Perfil = 'Administrador' AND Id_USUARIO = :Id");
        $statement->bindParam(':Id', $Id);
        $statement->execute();
        while($result = $statement->fetch()){
            $rows[] = $result;
        }
        return $rows;

    }

    public function update($Id, $Nombre, $Apellido, $Usuario, $Password, $Estado){
        $statement = $this->db->prepare("UPDATE usuarios SET Nombre = :Nombre, Apellido = :Apellido, Usuario = :Usuario, Password = :Password, Estado = :Estado WHERE Id_USUARIO = :Id");
        $statement->bindParam(':Id', $Id);
        $statement->bindParam(':Nombre', $Nombre);
        $statement->bindParam(':Apellido', $Apellido);
        $statement->bindParam(':Usuario', $Usuario);
        $statement->bindParam(':Password', $Password);
        $statement->bindParam(':Estado', $Estado);
        if($statement->execute()){
            header('Location: ../Page/index.php');
        }else{
            header('Location: ../Page/actualizar.php');
        }
    }

    public function delete($Id){
        $statement = $this->db->prepare("DELETE FROM usuarios WHERE Id_USUARIO = :Id");
        $statement->bindParam(':Id', $Id);
        if($statement->execute()){
            header('Location: ../Page/index.php');
        }else{
            header('Location: ../Page/eliminar.php');
        }

    }
}
?>