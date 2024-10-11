<?php

require_once ('../../Usuarios/Modelo/Usuarios.php');
require_once ('../Modelo/Materias.php');

$ModeloUsuarios = new Usuarios();
$ModeloUsuarios->validateSession();

$Modelo = new Materias();

$Id = $_GET['Id'];
$InformacionMateria = $Modelo->getByID($Id);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Sistema de Notas</title>
</head>
<body>
    <h1>Actualizar Materia</h1>
    <form  method="POST" action="../Controladores/actualizar.php">
        <input type="hidden" name="Id" value="<?php echo $Id ?>">
        <?php
        if($InformacionMateria !== null){
            foreach ($InformacionMateria as $Info) {
        ?>
        Nombre <br>
        <input type="text" name="Nombre" required="" autocomplete="off" placeholder="Nombre Materia" value="<?php echo $Info['MATERIA'] ?>"> <br><br>
        <?php
            }
        }
        ?>
        <input type="submit" value="Actualizar Materia">
    </form>
</body>
</html>

