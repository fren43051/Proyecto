<?php /** @noinspection ALL */

require_once ('../../Usuarios/Modelo/Usuarios.php');
require_once ('../Modelo/Materias.php');

$ModeloUsuarios = new Usuarios();
$ModeloUsuarios->validateSession();

$Modelo = new Materias();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sistema de Notas</title>
</head>
<body>
	<h1>Materias</h1>
	<a href="agregar.php" target="blank">Registrar Materia</a> <br><br>
	<table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
        <?php
        $Materias = $Modelo->get();
        if($Materias !== null){
            foreach ($Materias as $Materia) {
        ?>
        <tr>
            <td><?php echo $Materia['ID_MATERIA'] ?></td>
            <td><?php echo $Materia['MATERIA'] ?></td>
            <td>
                <a href="actualizar.php?Id=<?php echo $Materia['ID_MATERIA'] ?>" target="_blank">Actualizar</a>
                <a href="eliminar.php?Id=<?php echo $Materia['ID_MATERIA'] ?>" target="_blank">Eliminar</a>
            </td>
        </tr>
        <?php
            }
        }
        ?>
    </table>
</body>
</html>