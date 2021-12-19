<?php
include("ConexionBD.php");

    $conexion = new Conexion();
    
	$alumnor = new Alumno();
    $alumnor->NoBoleta = $_POST["boleta"];
    $alumnor->Nombre = $_POST["nombre"];
    $alumnor->ApellidoP = $_POST["apellido_p"];
    $alumnor->ApellidoM = $_POST["apellido_m"];    
    $alumnor->FNacimiento = $_POST["fecha"];
    echo "$alumnor->FNacimiento \n";
    $alumnor->Genero = $_POST["genero"];
    $alumnor->CURP = $_POST["curp"];
    //Contacto
    $alumnor->Calle = $_POST["calle"];
    $alumnor->Colonia = $_POST["colonia"];
   
    $alumnor->Alcaldia = $_POST["alcaldia"];
    echo "$alumnor->Alcaldia \n";
    $alumnor->Alcaldia = $_POST["cp"];
    $alumnor->Telefono = $_POST["telefono"];
    $alumnor->Email = $_POST["correo"];
    //Procedencia
    $alumnor->Escuela = $_POST["EscuelaProcedencia"];

    echo "$alumnor->Escuela \n";
    $alumnor->Entidad = $_POST["entidad_procedencia"];
    $alumnor->Promedio = $_POST["promedio"];
    $alumnor->NumeroOp = $_POST["EscomOpcion"];

    echo "$alumnor->NumeroOp \n";

    $conexion->registrarAlumno($alumnor);
	
?>