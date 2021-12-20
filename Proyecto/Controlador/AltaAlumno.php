<?php
include("ConexionBD.php");

$conexion = new Conexion();

    session_start();

    if(isset($_SESSION["AlumnoSesion"]) && $_SESSION["PermisoEdicion"]== true ){
        $alumnor = $_SESSION["AlumnoSesion"];
        $estadoRegistro = $conexion->registrarAlumno($alumnor);

        if($estadoRegistro == "Alumno registrado"){

            $_SESSION["PermisoEdicion"] = false;
            unset($_SESSION['AlumnoSesion']);

            echo '<script>alert("Alumno registrado exitosamente");</script>';
            echo '<script>window.location.href="../Vista/Paginas/index.html"</script>';

        }else if($estadoRegistro == "Alumno existente"){
            //echo "mensaje de registro ya existente";

            echo '<script>alert("La boleta que has ingresado ya ha sido registrada, revisa tu información");</script>';
            echo '<script>window.location.href="EditarInfo.php"</script>';

        }

        
    }

    
   

/*$alumnor = new Alumno();
$alumnor->NoBoleta = $_POST["boleta"];
$alumnor->Nombre = $_POST["nombre"];
$alumnor->ApellidoP = $_POST["apellido_p"];
$alumnor->ApellidoM = $_POST["apellido_m"];    
$alumnor->FNacimiento = $_POST["fecha"];
$alumnor->Genero = $_POST["genero"];
$alumnor->CURP = $_POST["curp"];
//Contacto
$alumnor->Calle = $_POST["calle"];
$alumnor->Colonia = $_POST["colonia"];
$alumnor->Alcaldia = $_POST["alcaldia"];
$alumnor->CodigoPostal = $_POST["cp"];
$alumnor->Telefono = $_POST["telefono"];
$alumnor->Email = $_POST["correo"];
//Procedencia
$alumnor->Escuela = $_POST["EscuelaProcedencia"];
$alumnor->Entidad = $_POST["entidad_procedencia"];
$alumnor->Promedio = $_POST["promedio"];
$alumnor->NumeroOp = $_POST["EscomOpcion"];*/


	
?>