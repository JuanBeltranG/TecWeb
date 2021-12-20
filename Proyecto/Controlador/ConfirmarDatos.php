<?php
    include("ConexionBD.php");

    $conexion = new Conexion();

    $alumnor = new Alumno();

    //Informacion personal 
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
    $alumnor->NumeroOp = $_POST["EscomOpcion"];

    session_start();

	if(isset($_SESSION["AlumnoSesion"])){
		unset($_SESSION['AlumnoSesion']);
	}

	$_SESSION["AlumnoSesion"]=$alumnor;
	$_SESSION["PermisoEdicion"] = true;
	session_write_close();

    echo <<<EOT
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Alumnos Nuevo Ingreso - Registro</title>
        <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/album/">
        <!-- Bootstrap core CSS -->
        <link href="../Vista/Paginas/bootstrap.min.css" rel="stylesheet">
        <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }
        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
            font-size: 3.5rem;
            }
        }
        </style>
    <!--Estilos para los iconos de las opciones del alumno-->
    <link href="features.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        var myModal = document.getElementById('myModal')
        var myInput = document.getElementById('myInput')
        myModal.addEventListener('shown.bs.modal', function () {
        myInput.focus()
        })     
    </script>
    <script type="text/javascript" src="../JS/validaciones.js"></script>
    </head>
    <body>
    EOT;

    echo <<<EOT
    <header>
        <div class="collapse bg-dark" id="navbarHeader">
            <div class="container">
                <div class="row">
                <div class="col-sm-8 col-md-7 py-4">
                    <h4 class="text-white">Cerrar sesión</h4>
                    <p class="text-muted">¿Está seguro de querer salir?</p>
                </div>
                <div class="col-sm-4 offset-md-1 py-4">
                    <div class="d-grid gap-2">
                    <button class="btn btn-danger" type="button">Salir</button>
                    </div>
                </div>
                </div>
            </div>
            </div>
            <div class="navbar navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a href="#" class="navbar-brand d-flex align-items-center">
                <img src="../Recursos/Imagenes/logo-ipn-blanco.png" width="30" >
                <strong>&nbsp; &nbsp;IPN  ESCOM - UPIS &nbsp; &nbsp;</strong>
                <img src="../Recursos/Imagenes/escom-recortado.png" width="50" >
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                <!--<span class="navbar-toggler-icon"></span>-->
                <strong>Cerrar sesión</strong>
                </button>
            </div>
        </div>
    </header>
    EOT;

    echo "<b>Numero Boleta :</b> $alumnor->NoBoleta <br/>";
    echo "<b>Nombre(s) :</b> $alumnor->Nombre <br/>";
    echo "<b>Apellido Paterno :</b> $alumnor->ApellidoP <br/>";
    echo "<b>Apellido Materno :</b> $alumnor->ApellidoM <br/>";
    echo "<b>Fecha Nacimiento :</b> $alumnor->FNacimiento <br/>";
    echo "<b>Genero :</b> $alumnor->Genero <br/>";
    echo "<b>CURP :</b> $alumnor->CURP <br/>";
    echo "<b>Calle :</b> $alumnor->Calle <br/>";
    echo "<b>Colonia :</b> $alumnor->Colonia <br/>";
    echo "<b>Alcaldia :</b> $alumnor->Alcaldia <br/>";
    echo "<b>Codigo Postal :</b> $alumnor->CodigoPostal <br/>";
    echo "<b>Telefono :</b> $alumnor->Telefono <br/>";
    echo "<b>Email :</b> $alumnor->Email <br/>";
    echo "<b>Escuela :</b> $alumnor->Escuela <br/>";
    echo "<b>Entidad :</b> $alumnor->Entidad <br/>";
    echo "<b>Promedio :</b> $alumnor->Promedio <br/>";
    echo "<b>Opcion de ESCOM :</b> $alumnor->NumeroOp <br/>";

    echo"<form  method='POST' action='registrarAlumno.php'>
			<input type='submit' value='Registrar Información' name='Aceptar' class='button'>
		</form>";
    
    echo"<form  method='POST' action='EditarInfo.php'>
			<input type='submit' value='Modificar Información' name='Aceptar' class='button'>
		</form>";

    echo <<<EOT
    </body>
    </html>
    EOT;



?>