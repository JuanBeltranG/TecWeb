<?php
include("ConexionBD.php");

$conexion = new Conexion();
    
$alumnoE = new Alumno();
$alumnoE->NoBoleta = $_POST["boletaEliminar"];


$conexion->EliminarAlumno($alumnoE);
	
?>