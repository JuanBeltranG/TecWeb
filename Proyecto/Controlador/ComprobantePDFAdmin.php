<?php

    include("ConexionBD.php");

    $Boleta = $_POST["BoletaPDF"];
    $CURP = $_POST["CURPPDF"];

    $consulta = new Conexion();

    $alumno = new Alumno();

    $alumno = $consulta->consultarAlumno($Boleta);

   

    if($alumno->NoBoleta == ""){
        //Si entra a este if significa que el alumno que se busca no esta registrado
        echo '<script>alert("Los datos ingresados son erroneos, por favor verificalos");</script>';
        echo '<script>window.location.href="../Vista/Paginas/index.html"</script>';
    }else if($Boleta != $alumno->NoBoleta || $CURP != $alumno->CURP){
        //Si entra a este if significara que si encontro la boleta pero los datos no coinciden
        echo '<script>alert("Los datos ingresados son erroneos, por favor verificalos");</script>';
        echo '<script>window.location.href="../Vista/Paginas/index.html"</script>';

    }


?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Alumnos Nuevo Ingreso - Comprobante Registro</title>


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

        .embed-container {
            position: relative;
            padding-bottom: 70%;
            height: 0;
            overflow: hidden;
        }

        .embed-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>

    <!--Estilos para los iconos de las opciones del alumno-->
    <link href="features.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


    <script>
        var myModal = document.getElementById('myModal')
        var myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', function() {
            myInput.focus()
        })
    </script>

    <script type="text/javascript" src="../JS/validaciones.js"></script>

</head>

<body>
    <header>
        <div class="collapse bg-dark" id="navbarHeader">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-md-7 py-4">
                        <h4 class="text-white">Regresar al panel</h4>
                        <p class="text-muted">Presiona el boton para regresar al panel de administración</p>
                    </div>
                    <div class="col-sm-4 offset-md-1 py-4">
                        <div class="d-grid gap-2">
                            <button type="button" class="btn btn-danger" onclick="location.href='PanelAdmin.php'">Regresar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar navbar-dark bg-dark shadow-sm">
            <div class="container">

                <a href="#" class="navbar-brand d-flex align-items-center">
                    <img src="../Recursos/Imagenes/logo-ipn-blanco.png" width="30">
                    <strong>&nbsp; &nbsp;IPN ESCOM - UPIS &nbsp; &nbsp;</strong>
                    <img src="../Recursos/Imagenes/escom-recortado.png" width="50">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <strong>Salir</strong>
                </button>
            </div>
        </div>
    </header>


    <main>
        <section class="py-2 text-center container">
            <div class="row py-lg-2">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <bold>
                        <h2>Comprobante de registro</h2>
                    </bold>
                </div>
            </div>
        </section>
        <section class="py-2 text-center container">
            <div class="row py-lg-2">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <bold>
                        <div class="embed-container">
                            <iframe src="GenerarPDF.php?BoletaPDF=<?php echo $Boleta; ?>&CURPPDF=<?php echo $CURP; ?>" " frameborder=" 0" allowfullscreen></iframe>
                        </div>
                    </bold>
                </div>
            </div>
        </section>

    </main>

    <footer class="text-muted py-4">
        <div class="container">

            <p class="mb-1 text-center">Propiedad del Equipo 3 &copy; Derechos Reservados </p>
            <p class="mb-0 text-center">Plataforma destinada para la materia de Tecnologias Web -Grupo 2CM13</p>
        </div>
    </footer>

</body>

</html>