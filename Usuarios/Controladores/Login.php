<?php

require_once('../Modelo/Usuarios.php');

if($_POST){
    $Usuario = $_POST['Usuario'];
    $Password = $_POST['Contrasena'];

    $Modelo = new Usuarios();
    $Modelo->login($Usuario, $Password);
    if($Modelo->login($Usuario, $Password)){
        header('Location: ../../Estudiantes/Page/Index.php');
    }else{
        header('Location: ../../Index.php');
    }

}else{
    header('Location: ../../Index.php');
}

?>