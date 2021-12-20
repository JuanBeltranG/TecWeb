<?php

    include("ConexionBD.php");

    $consulta = new Conexion();
    $Admin;
    session_start();

    if(isset($_POST["SalirSesion"])){
      session_destroy();
      echo '<script>alert("Hasta Luego");</script>';
      echo '<script>window.location.href="../Vista/Paginas/index.html"</script>';
    }

    if(!isset($_SESSION["AdminSesion"]) && !isset($_POST["CorreoAdmin"]) && !isset($_POST["ContraAdmin"])){
      session_destroy();
      echo '<script>alert("Inicia Sesion antes");</script>';
      echo '<script>window.location.href="../Vista/Paginas/index.html"</script>';
    }

    if(isset($_SESSION["AlumnoSesion"])){
      session_destroy();
      session_start();

      $Admin = $consulta->consultarAdmin($_POST["CorreoAdmin"], $_POST["ContraAdmin"]);

      if($Admin->Correo == $_POST["CorreoAdmin"] && $Admin->Contra == $_POST["ContraAdmin"]){
        $_SESSION["AdminSesion"] = $Admin;
        echo '<script>alert("Bienvenido '.$Admin->Nombre.'");</script>';
        echo '<script>window.location.href="../Controlador/PanelAdmin.php"</script>';
      }
      else{
        echo '<script>alert("Los datos ingresados son errones, por favor verificalos");</script>';
        echo '<script>window.location.href="../Vista/Paginas/index.html"</script>';
      }
    }
    else{
      if(isset($_SESSION["AdminSesion"])){
        $Admin = $_SESSION["AdminSesion"];
      }
      else{
        $Admin = $consulta->consultarAdmin($_POST["CorreoAdmin"], $_POST["ContraAdmin"]);

        if($Admin->Correo == $_POST["CorreoAdmin"] && $Admin->Contra == $_POST["ContraAdmin"]){
          $_SESSION["AdminSesion"] = $Admin;
          echo '<script>alert("Bienvenido '.$Admin->Nombre.'");</script>';
          echo '<script>window.location.href="../Controlador/PanelAdmin.php"</script>';
        }
        else{
          echo '<script>alert("Los datos ingresados son errones, por favor verificalos");</script>';
          echo '<script>window.location.href="../Vista/Paginas/index.html"</script>';
        }
      }
    }

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
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
  </head>
  <body>
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
            <form id="formSalir" method="post">
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
<main>
  <div class="album py-2 bg-light">
  <section class="py-3 text-center container">
    <div class="row py-lg-3">
      <div class="col-lg-6 col-md-8 mx-auto">
        <bold><h1 class="text-secondary">Panel del Administrador</h1></bold>
      </div>
    </div>
  </section>
  <section class="container">
    <div class="container" >
      <form class="d-flex align-items-center p-3 my-3 text-white bg-dark rounded " >
        <div class="col-lg-3 col-md-8 ">
          <h3 class="text-white">Registrar alumno</h3>
        </div>
        <button class="form-control me-2 btn btn-success btn-lg" type="button" onclick="location.href='../Vista/Paginas/RegistroDatos.html'"> Nuevo alumno </button>
      </form>  
      <form class="d-flex align-items-center p-3 my-3 text-white bg-dark rounded shadow-sm">
        <div class="col-lg-3 col-md-8 ">
          <h3 class="text-white">Buscar alumno</h3>
        </div>
        <input class="form-control me-2" type="search" placeholder="Número de boleta" aria-label="Search">
        <button class="btn btn-success " type="submit">Buscar</button>
      </form>
    </div>
  </section>
</div>
  <section class="py-4 text-center container"></section>
      <div class="album py-2">
        
          <bold><h3 class="text-center">LISTA DE ALUMNOS REGISTRADOS</h3></bold>
        
      </div> 

      <div class="container">
        <div class="table-responsive">
          <table class="table">
              <thead>
                <tr class="table-dark ">
                  <th scope="col">Número de boleta</th>
                  <th scope="col">Nombre(s)</th>
                  <th scope="col">Apellido paterno</th>
                  <th scope="col">Apellido materno</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                  <?php
                      $todosAlumnos = $consulta->consultarTodosAlumnos();
                      $conteoAlumnos = 0;
                      foreach($todosAlumnos as $currentAlumno){
                        $conteoAlumnos = $conteoAlumnos + 1;
                  ?>
                <tr>
                  <th scope="row"><?php echo $currentAlumno->NoBoleta;?></th>
                  <td><?php echo $currentAlumno->Nombre;?></td>
                  <td><?php echo $currentAlumno->ApellidoP;?></td>
                  <td><?php echo $currentAlumno->ApellidoM;?></td>
                  <td class="d-flex justify-content-end">
                    <form action="" method="post">
                      <input type="hidden" value="<?php echo $currentAlumno->NoBoleta;?>" id="boletaConsulta" name="boletaConsulta">
                      <button class="btn btn-outline-primary btn-sm" type="submit">Consultar</button>
                    </form>
                    <form action="" method="post">
                      <input type="hidden" value="<?php echo $currentAlumno->NoBoleta;?>" id="boletaEditar" name="boletaEditar">
                      <button class="btn btn-outline-success btn-sm" type="submit">Editar</button>
                    </form>
                    

                      <!--Boton para abrir la ventana modal-->
                      <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $conteoAlumnos;?>">
                          Eliminar
                      </button>
                      <!-- Ventana modal -->
                      <div class="modal fade" id="staticBackdrop<?php echo $conteoAlumnos;?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <form action="EliminarAlumno.php" method="post">
                              <div class="modal-header">
                                
                                <h5 class="modal-title" id="staticBackdropLabel">¿Está seguro de querer eliminar al alumno?</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-footer">
                                <input type="hidden" value="<?php echo $currentAlumno->NoBoleta;?>" id="boletaEliminar" name="boletaEliminar">
                                <button class="btn btn-outline-danger btn-sm" type="submit">Eliminar</button>
                            
                                <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Cancelar</button>
                              </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>   


                  </td>
                </tr>
                <?php
                      }
                ?>
            </tbody>
          </table>
         </div>
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
    <script src="../Vista/JS/bootstrap.bundle.min.js"></script>
  </body>
</html>
