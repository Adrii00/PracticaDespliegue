<?php
$servidor = 'localhost';
$usuario = 'root';
$contrasena = 'medac1234';
$base_datos = 'login';
$conexion = new Mysqli($servidor, $usuario, $contrasena, $base_datos)

    or die("Error en la conexión");

?>