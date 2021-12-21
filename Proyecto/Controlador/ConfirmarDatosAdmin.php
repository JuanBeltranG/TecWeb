<?php 
    include("ConexionBD.php");

    $conexion = new Conexion();
    $alumnor = new Alumno();

    session_start();
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

    
	if(isset($_SESSION["AlumnoSesion"])){
		unset($_SESSION['AlumnoSesion']);
	}

	$_SESSION["AlumnoSesion"]=$alumnor;
	$_SESSION["PermisoEdicion"] = true;
    
	session_write_close();


    if($_SESSION["PermisoEdicion"]== false){
        unset($_SESSION['AlumnoSesion']);
        echo '<script>window.location.href="../Vista/Paginas/index.html"</script>';
    }

    
?> 

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
  <link href="../Vista/Paginas/features.css" rel="stylesheet">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  
  <script>
    var myModal = document.getElementById('myModal')
    var myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', function () {
      myInput.focus()
    })     
  </script>

</head>

<body>
    <header>
        <div class="collapse bg-dark" id="navbarHeader">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-md-7 py-4">
                        <h4 class="text-white"></h4>
                        <p class="text-muted">¿Estás seguro de querer cancelar la confirmación de datos?</p>
                    </div>
                    <div class="col-sm-4 offset-md-1 py-4">
                        <div class="d-grid gap-2">
                            <form id="formSalir" method="post" action="PanelAdmin.php">
                                <input type="hidden" value = "Si" id = "SalirSesion" name = "SalirSesion">
                                
                            </form>
                            <button form="formSalir" class="btn btn-danger" type="submit">Salir</button>
                        
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
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader"
                    aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <strong>Cancelar</strong>
                </button>
            </div>
        </div>
    </header>


    <main>
        <section class="py-2 text-center container">
            <div class="row py-lg-2">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <bold>
                        <h2>Confirmar información</h2>
                        <p>Hola <?php echo $alumnor->Nombre; ?>, verifica que los datos que ingresaste sean correctos: </p>
                    </bold>
                </div>
            </div>
        </section>

        <div class="album py-2 bg-light">
            <div class="container">

            <!--Aqui empieza el formulario-->

            <form>
                <div class="row g-5">

                     <!--Seccion de contacto-->
                    
                    <div class="col-md-5 col-lg-4 order-md-last">
                        <br/>
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-primary"><strong>Contacto</strong></span>
                        </h4>
                        <hr class="my-4">
                        <div class="row g-3">

                            <div class="col-12">
                                <label for="username" class="form-label"><strong>Correo electrónico</strong></label>
                                <div>
                                    <p><?php echo $alumnor->Email; ?></p>
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="telefono" class="form-label"><strong>Teléfono o celular</strong></label>
                                <div>
                                    <p><?php echo $alumnor->Telefono; ?></p>
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="calle" class="form-label"><strong>Calle y Número</strong></label>
                                <div>
                                    <p><?php echo $alumnor->Calle; ?></p>
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="username" class="form-label"><strong>Colonia</strong></label>
                                <div>
                                    <p><?php echo $alumnor->Colonia; ?></p>
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="alcaldia" class="form-label"><strong>Alcaldía</strong></label>
                                <div>
                                    <p><?php echo $alumnor->Alcaldia; ?></p>
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="cp" class="form-label"><strong>Código Postal</strong></label>
                                <div>
                                    <p><?php echo $alumnor->CodigoPostal; ?></p>
                                </div>
                            </div>

                        </div>  
                    </div>


                    <!--Seccion de Identidad-->
                    <div class="col-md-7 col-lg-8">
                        <br />
                        <h4 class="mb-3 text-primary" >Identidad</h4>
                        <hr class="my-4">

                            <div class="row g-3">


                                <div class="col-sm-4">
                                    <label for="nombre" class="form-label"><strong>Nombre(s)</strong></label>
                                    <div>
                                        <p><?php echo $alumnor->Nombre; ?></p>
                                    </div>
                                </div>


                                <div class="col-sm-4">
                                    <label for="apellido_p" class="form-label"><strong>Apellido Paterno</strong></label>
                                    <div>
                                        <p><?php echo $alumnor->ApellidoP; ?></p>
                                    </div>
                                </div>


                                <div class="col-sm-4">
                                    <label for="apellido_m" class="form-label"><strong>Apellido Materno</strong></label>
                                    <div>
                                        <p><?php echo $alumnor->ApellidoM; ?></p>
                                    </div>
                                </div>


                                <div class="col-6">
                                    <label for="boleta" class="form-label"><strong>Número de Boleta</strong></label>
                                    <div>
                                        <p><?php echo $alumnor->NoBoleta; ?></p>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <label for="curp" class="form-label"><strong>CURP</strong></label>
                                    <div>
                                        <p><?php echo $alumnor->CURP; ?></p>
                                    </div>
                                </div>


                                <div class="col-6">
                                    <label for="fecha" class="form-label"><strong>Fecha de nacimiento</strong></label>
                                    <div>
                                        <p><?php echo $alumnor->FNacimiento; ?></p>
                                    </div>
                                </div>


                                <div class="col-6">
                                    <label for="genero" class="form-label"><strong>Género</strong></label>
                                    <div>
                                        <p><?php echo $alumnor->Genero; ?></p>
                                    </div>
                                </div>

                            </div>


                            <br />
                            <!-- Seccion de Procedencia -->
                            <h4 class="mb-3 text-primary" >Procedencia</h4>
                            <hr class="my-4">

                            <div class="row gy-3">

                                <div class="col-6">
                                    <label for="entidad_procedencia" class="form-label"><strong>Entidad</strong></label>
                                    <div>
                                        <p><?php echo $alumnor->Entidad; ?></p>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <label for="escuela_procedencia" class="form-label"><strong>Escuela de procedencia</strong></label>
                                    <div>
                                        <p><?php echo $alumnor->Escuela; ?></p>
                                    </div>
                                </div>



                                <div class="col-md-6">
                                    <label for="cc-number" class="form-label"><strong>Promedio</strong></label>
                                    <div>
                                        <p><?php echo $alumnor->Promedio; ?></p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="cc-expiration" class="form-label"><strong>Opción de ESCOM</strong></label><br/>
                                    <div>
                                        <p>Escom fue tu opción numero <?php echo $alumnor->NumeroOp; ?></p>
                                    </div>
                                    
                                </div>

                               
                            </div>

                            <hr class="my-4">

                    </div>
                </div>
                <br/>
                <br/>
                
            </form>
            <!--Aqui termina el formulario-->
            <form  method="POST" action="AltaAlumnoAdmin.php">
			        <input type="submit"  class="btn btn-primary btn-lg btn-block" value="Datos correctos" style="display: inline-block">
		        </form>

                <form  method="POST" action="EditarInfo.php">
			        <input type="submit" class="btn btn-secondary btn-lg btn-block" value="Modificar datos" style="display: inline-block">
		        </form>

            </div>
            
        </div>
    </main>

    <footer class="text-muted py-4">
        <div class="container">

            <p class="mb-1 text-center">Propiedad del Equipo 3 &copy; Derechos Reservados </p>
            <p class="mb-0 text-center">Plataforma destinada para la materia de Tecnologias Web -Grupo 2CM13</p>
        </div>
    </footer>

</body>

</html>