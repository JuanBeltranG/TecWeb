<?php

    $conexion = new Conexion;
    $conexion->registrarAlumno($alumno);
	$alumno = new Alumno;
    $alumno->boleta = $_POST["boleta"];
    $alumno->nombre = $_POST["nombre"];
    $alumno->paterno = $_POST["apellido_p"];
    $alumno->materno = $_POST["apellido_m"];    
    $alumno->nacimiento = $_POST["fecha"];
    $alumno->genero = $_POST["genero"];
    $alumno->curp = $_POST["curp"];
    //Contacto
    $alumno->calle = $_POST["calle"];
    $alumno->colonia = $_POST["colonia"];
    $alumno->cp = $_POST["cp"];
    $alumno->tel = $_POST["telefono"];
    $alumno->email = $_POST["correo"];
    //Procedencia
    $alumno->procedencia = $_POST["escuela_procedencia"];
    $alumno->estado = $_POST["entidad_procedencia"];
    $alumno->promedio = $_POST["promedio"];
    $alumno->opcion = $_POST["primera_opcion"];
	
?>