<?php

require_once ('../../Usuarios/Modelo/Usuarios.php');

$ModeloUsuarios = new Usuarios();
$ModeloUsuarios->validateSession();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sistema de Notas</title>
</head>
<body>
    <h1>Registrar Materia</h1>
    <form method="post" action="../Controladores/agregar.php" >
        Nombre <br>
        <input type="text" name="Nombre" required="" autocomplete="off" placeholder="Nombre Materia"> <br><br>
        <input type="submit" value="Registrar Materia">
    </form>
</body>
</html>

