<?php /** @noinspection ALL */


require_once('../../Conexion.php');
session_start();
class Usuarios extends Conexion {
    public function __construct() {
        $this->db = parent::__construct();
    }
    public function login($Usuario, $Password) {
        $rows = null;
        $statement = $this->db->prepare("SELECT * FROM usuarios WHERE USUARIO = :Usuario AND PASSWORD = :Password");
        $statement->bindParam(':Usuario', $Usuario);
        $statement->bindParam(':Password', $Password);
        $statement->execute();
        if ($statement->rowCount() == 1) {
            $result = $statement->fetch();
            $_SESSION['NOMBRE'] = $result['NOMBRE'] . " " . $result['APELLIDO'];
            $_SESSION['ID'] = $result['ID_USUARIO'];
            $_SESSION['PERFIL'] = $result['PERFIL'];
            return true;
        }
        return false;
    }

    public function getNombre() {
        return $_SESSION['NOMBRE'];
    }
    public function getId() {
        return $_SESSION['ID'];
    }
    public function getPerfil() {
        return $_SESSION['PERFIL'];
    }

    public function validateSession() {
        if ($_SESSION['ID'] == null) {
            header('Location: ../../index.php');
        }
    }

    public function validateSessionAdministrator(){
        if ($_SESSION['ID'] !== null) {
            if ($_SESSION['PERFIL'] == 'Docente') {
                header('Location: ../../Estudiantes/Page/index.php');
            }else{
                header('Location: ../../index.php');
            }
        }
    }
}
?>