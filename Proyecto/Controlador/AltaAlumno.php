<?php
<<<<<<< HEAD
    include("ConexionBD.php");
    include("../Modelo/Alumno.php");
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
=======

    include("ConexionBD.php");
    //include("../Modelo/Alumno.php");

    $conexion = new Conexion();
    
	$alumnor = new Alumno();
    $alumnor->NoBoleta = $_POST["boleta"];
    $alumnor->Nombre = $_POST["nombre"];
    $alumnor->ApellidoP = $_POST["apellido_p"];
    $alumnor->ApellidoM = $_POST["apellido_m"];    
    $alumnor->FNacimiento = $_POST["fecha"];
    $alumnor->Genero = $_POST["genero"];
    $alumnor->CURP = $_POST["curp"];
>>>>>>> 330dff0998be21f161c60fa53820ba011b33d92f
    //Contacto
    $alumnor->Calle = $_POST["calle"];
    $alumnor->Colonia = $_POST["colonia"];
    $alumnor->Alcaldia = $_POST["alcaldia"];
    $alumnor->CodigoPostal = $_POST["cp"];
    $alumnor->Telefono = $_POST["telefono"];
    $alumnor->Email = $_POST["correo"];
    //Procedencia
    $alumnor->Escuela = $_POST["escuela_procedencia"];
    $alumnor->Entidad = $_POST["entidad_procedencia"];
    $alumnor->Promedio = $_POST["promedio"];
    $alumnor->NumeroOp = $_POST["primera_opcion"];

    echo $alumnor->NumeroOp;

    $conexion->registrarAlumno($alumnor);
	
?>