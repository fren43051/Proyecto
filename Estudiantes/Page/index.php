<?php

require_once('../../Usuarios/Modelo/Usuarios.php');
require_once('../Modelo/Estudiantes.php');

$ModeloUsuarios = new Usuarios();
$ModeloUsuarios->validateSession();

$Modelo = new Estudiantes();

?>
<!DOCTYPE html>
<html>
<head>
    <title>Sistema de Notas</title>
</head>
<body>
    <h1>Estudiantes</h1>
    <a href="agregar.php" target="_blank">Registrar Estudiante</a> <br><br>
    <table border="1">
        <tr>
            <td>Id</td>
            <td>Nombre</td>
            <td>Apellido</td>
            <td>Documento</td>
            <td>Correo</td>
            <td>Materia</td>
            <td>Docente</td>
            <td>Promedio</td>
            <td>Fecha de Registro</td>
            <td>Acciones</td>
        </tr>

        <?php
        $Estudiantes = $Modelo->get();
        if($Estudiantes !== null){
            foreach($Estudiantes as $Estudiante){

        ?>
        <tr>
            <td><?php echo $Estudiante['ID_Estudiante']; ?></td>
            <td><?php echo $Estudiante['NOMBRE']; ?></td>
            <td><?php echo $Estudiante['APELLIDO']; ?></td>
            <td><?php echo $Estudiante['DOCUMENTO']; ?></td>
            <td><?php echo $Estudiante['CORREO']; ?></td>
            <td><?php echo $Estudiante['MATERIA']; ?></td>
            <td><?php echo $Estudiante['DOCENTE']; ?></td>
            <td><?php echo $Estudiante['PROMEDIO']; ?></td>
            <td><?php echo $Estudiante['FECHA_REGISTRO']; ?></td>
            <td>
                <a href="actualizar.php" target="_blank">Actualizar</a>
                <a href="eliminar.php" target="_blank">Eliminar</a>
            </td>
        </tr>

        <?php
            }
        }
        ?>
    </table>
</body>
</html>