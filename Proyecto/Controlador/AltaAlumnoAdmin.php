<?php
include("ConexionBD.php");

$conexion = new Conexion();

    session_start();

    if(isset($_SESSION["AlumnoSesion"]) && $_SESSION["PermisoEdicion"]== true ){
        $alumnor = $_SESSION["AlumnoSesion"];
        $estadoRegistro = $conexion->registrarAlumno($alumnor);

        if($estadoRegistro == "Alumno registrado"){

            echo '<script>alert("Tu registro se completo, tu PDF se presenta a continuación y se enviara a tu correo");</script>';

            echo "<form name='envia' method='POST' action='ComprobantePDF,php'>
            <input type='hidden' name='BoletaPDF' id='BoletaPDF' value=$alumnor->NoBoleta >
            <input type='hidden' name='CURPPDF' id='CURPPDF' value=$alumnor->CURP >
            </form>
            <script language='JavaScript'>
                document.envia.submit()
            </script>";

            $_SESSION["PermisoEdicion"] = false;
            unset($_SESSION['AlumnoSesion']);
            session_destroy();


        }else if($estadoRegistro == "Alumno existente"){
           
            $_SESSION["PermisoEdicion"] = true;
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