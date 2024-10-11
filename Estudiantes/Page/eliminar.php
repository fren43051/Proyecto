<?php
require_once ('../../Usuarios/Modelo/Usuarios.php');

$ModeloUsuarios = new Usuarios();
$ModeloUsuarios->validateSession();

$Id = $_GET['Id'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Notas</title>
</head>
<body>
    <h1>Eliminar Estudiante</h1>
    <form method="post" action="../Controladores/eliminar.php">
        <input type="hidden" name="Id" value="<?php echo $Id; ?>">
        <p>¿Está seguro que deseas eliminar este estudiante?</p>
        <input type="submit" value="Eliminar Estudiante">
    </form>
</body>
</html>