<?php 

    include("ConexionBD.php");

    $boletaEditar = $_POST["boletaEditar"];

    $consulta = new Conexion();
    
    $alumnor = new Alumno();
	$agendaAlum = new Agenda();

    $alumnor = $consulta->consultarAlumno($boletaEditar);
	$agendaAlum = $consulta->consultaAgendaAlumno($boletaEditar);	
    $horariosDisponibles = $consulta->ConsultaAgenda();	
    

    $otra= true;
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

<script type="text/javascript" src="../Vista/JS/validaciones.js"></script>

</head>

<body>
    <header>
        <div class="collapse bg-dark" id="navbarHeader">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-md-7 py-4">
                        <h4 class="text-white">Cancelación de registro</h4>
                        <p class="text-muted">¿Estas seguro de querer cancelar tu registro?</p>
                    </div>
                    <div class="col-sm-4 offset-md-1 py-4">
                        <div class="d-grid gap-2">
                           <button type="button" class="btn btn-danger" onclick="location.href='CancelarRegistro.php'">Cancelar </button>
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
                        <h2>Edición de información</h2>
                    </bold>
                </div>
            </div>
        </section>

        <div class="album py-2 bg-light">
            <div class="container">

            <!--Aqui empieza el formulario-->

            <form method="post" action="ActualizaAlumno.php" onsubmit="return validarRegistroDatos()">

                <div class="row g-5">

                     <!--Seccion de contacto-->
                    
                    <div class="col-md-6 col-lg-6 order-md-last">
                        <br/>
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-primary">Contacto</span>
                        </h4>
                        <hr class="my-4">
                        <div class="row g-3">

                            <div class="col-6">
                                <label for="username" class="form-label">Correo electronico</label>
                                <div class="input-group">
                                    <span class="input-group-text"> @ </span>
                                    <input class="form-control" type="email" id="correo" name="correo" placeholder="ej. juan@gmail.com" maxlength="50" value="<?php echo $alumnor->Email; ?>" required>
                                </div>
                            </div>

                            <div class="col-6">
                                <label for="telefono" class="form-label">Telefono o celular</label>
                                <div class="input-group">
                                    <span class="input-group-text"> # </span>
                                    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="ej. 5561631096" value="<?php echo $alumnor->Telefono; ?>" minlength="10" maxlength="10" onkeyup="soloDigitos('telefono')" required>
                                </div>
                            </div>

                            <div class="col-6">
                                <label for="calle" class="form-label">Calle y Numero</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="calle" name="calle" placeholder="ej. Algebra #55" maxlength="50" onkeyup="alfanumericoYEspaciosYPuntos('calle')" value="<?php echo $alumnor->Calle; ?>" required>
                                </div>
                            </div>

                            <div class="col-6">
                                <label for="username" class="form-label">Colonia</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="colonia" name="colonia" placeholder="ej. Juan Escutia" maxlength="50" value="<?php echo $alumnor->Colonia; ?>" onkeyup="alfanumericoYEspaciosYPuntos('colonia')" required>
                                </div>
                            </div>

                            <div class="col-6">
                                <label for="alcaldia" class="form-label">Alcaldia</label>
                                <select class="form-select" name="alcaldia" id="alcaldia" required>
                                    <option value="Ninguna" selected disabled>Seleccione una alcaldia</option>
                                    <option value="Azcapotzalco" <?php echo ($alumnor->Alcaldia=='Azcapotzalco'?"selected":"");  ?> >Azcapotzalco</option>
                                    <option value="Álvaro Obregón" <?php echo ($alumnor->Alcaldia=='Álvaro Obregón'?"selected":""); ?> >Álvaro Obregón</option>
                                    <option value="Benito Juárez" <?php echo ($alumnor->Alcaldia=='Benito Juárez'?"selected":""); ?> >Benito Juárez</option>
                                    <option value="Coyoacán" <?php echo ($alumnor->Alcaldia=='Coyoacán'?"selected":""); ?> >Coyoacán</option>
                                    <option value="Cuajimalpa de Morelos" <?php echo ($alumnor->Alcaldia=='Cuajimalpa de Morelos'?"selected":""); ?> >Cuajimalpa de Morelos</option>
                                    <option value="Cuauhtémoc" <?php echo ($alumnor->Alcaldia=='Cuauhtémoc'?"selected":""); ?> >Cuauhtémoc</option>
                                    <option value="Gustavo A. Madero" <?php echo ($alumnor->Alcaldia=='Gustavo A. Madero'?"selected":""); ?> >Gustavo A. Madero</option>
                                    <option value="Iztacalco" <?php echo ($alumnor->Alcaldia=='Iztacalco'?"selected":""); ?> >Iztacalco</option>
                                    <option value="Iztapalapa" <?php echo ($alumnor->Alcaldia=='Iztapalapa'?"selected":""); ?> >Iztapalapa</option>
                                    <option value="Magdalena Contreras" <?php echo ($alumnor->Alcaldia=='Magdalena Contreras'?"selected":""); ?> >Magdalena Contreras</option>
                                    <option value="Milpa Alta" <?php echo ($alumnor->Alcaldia=='Milpa Alta'?"selected":""); ?> >Milpa Alta</option>
                                    <option value="Tlalpan" <?php echo ($alumnor->Alcaldia=='Tlalpan'?"selected":""); ?> >Tlalpan</option>
                                    <option value="Tláhuac" <?php echo ($alumnor->Alcaldia=='Tláhuac'?"selected":""); ?> >Tláhuac</option>
                                    <option value="Venustiano Carranza" <?php echo ($alumnor->Alcaldia=='Venustiano Carranza'?"selected":""); ?> >Venustiano Carranza</option>
                                    <option value="Xochimilco" <?php echo ($alumnor->Alcaldia=='Xochimilco'?"selected":""); ?> >Xochimilco</option>
                                </select>
                            </div>

                            <div class="col-6">
                                <label for="cp" class="form-label">Codigo Postal</label>
                                <div class="input-group">
                                    <span class="input-group-text"> # </span>
                                    <input type="text" class="form-control"id="cp" name="cp" placeholder="ej. 09100" minlength="5" maxlength="5" value="<?php echo $alumnor->CodigoPostal; ?>" onkeyup="soloDigitos('cp')" required >
                                </div>
                            </div>

                        </div> 
                        <br/>
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-primary">Agenda de examen</span>
                        </h4>
                        <hr class="my-4">

                        <div class="row g-3">

                            <div class="col-12">
                                <label for="despliegaHorario" class="form-label">Hora y fecha </label>
                                <div class="input-group">
                                    <span class="input-group-text"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-alarm" viewBox="0 0 16 16">
                                        <path d="M8.5 5.5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9V5.5z"/>
                                        <path d="M6.5 0a.5.5 0 0 0 0 1H7v1.07a7.001 7.001 0 0 0-3.273 12.474l-.602.602a.5.5 0 0 0 .707.708l.746-.746A6.97 6.97 0 0 0 8 16a6.97 6.97 0 0 0 3.422-.892l.746.746a.5.5 0 0 0 .707-.708l-.601-.602A7.001 7.001 0 0 0 9 2.07V1h.5a.5.5 0 0 0 0-1h-3zm1.038 3.018a6.093 6.093 0 0 1 .924 0 6 6 0 1 1-.924 0zM0 3.5c0 .753.333 1.429.86 1.887A8.035 8.035 0 0 1 4.387 1.86 2.5 2.5 0 0 0 0 3.5zM13.5 1c-.753 0-1.429.333-1.887.86a8.035 8.035 0 0 1 3.527 3.527A2.5 2.5 0 0 0 13.5 1z"/>
                                        </svg>
                                    </span>
                                    <input class="form-control" type="text" id="despliegaHorario" name="despliegaHorario" value="<?php echo $agendaAlum->Hora; ?> - <?php echo $agendaAlum->fecha; ?>" disabled >
                                    
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="despliegaHorario" class="form-label">Laboratorio y Edificio</label>
                                <div class="input-group">
                                    <span class="input-group-text"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-check-fill" viewBox="0 0 16 16">
                                        <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zm-5.146-5.146-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                                        </svg></span>
                                    <input class="form-control" type="text" id="despliegaHorario" name="despliegaHorario" value="<?php echo $agendaAlum->NombreLab; ?> - <?php echo $agendaAlum->EdificioLab; ?> " disabled >
                                    
                                </div>
                            </div>

                            <select name="cars" id="cars">
                            <?php
                                $todosAlumnos = $consulta->consultarTodosAlumnos();
                                $conteoHorarios = 0;

                                foreach($horariosDisponibles as $currentHorario){
                                    $conteoHorarios = $conteoHorarios + 1;
                            ?>  
                                  <option value="volvo"><?php echo $currentHorario->IdAgenda; ?></option>
                            
                            <?php 
                                }
                            ?>
                            </select>
                            

                           

                           

                            

                            

                        </div>   
                    </div>


                    <!--Seccion de Identidad-->
                    <div class="col-md-6 col-lg-6">
                        <br />
                        <h4 class="mb-3 text-primary" >Identidad</h4>
                        <hr class="my-4">

                        

                            <div class="row g-3">


                                <div class="col-sm-4">
                                    <label for="nombre" class="form-label">Nombre/s</label>
                                    <input type="text" class="form-control"  name="nombre" id="nombre" value="<?php echo $alumnor->Nombre; ?>" placeholder="Nombre" maxlength="30" onkeyup="soloLetras('nombre')" required>
                                </div>


                                <div class="col-sm-4">
                                    <label for="apellido_p" class="form-label">Apellido Paterno</label>
                                    <input type="text" class="form-control" name="apellido_p" id="apellido_p" value="<?php echo $alumnor->ApellidoP; ?>" placeholder="Apellido Paterno" maxlength="30" onkeyup="soloLetras('apellido_p')" required>
                                </div>


                                <div class="col-sm-4">
                                    <label for="apellido_m" class="form-label">Apellido Materno</label>
                                    <input type="text" class="form-control" name="apellido_m" id="apellido_m" value="<?php echo $alumnor->ApellidoM; ?>" placeholder="Apellido Materno" maxlength="30" onkeyup="soloLetras('apellido_m')" required>
                                </div>


                                <div class="col-6">
                                    <label for="boleta" class="form-label">Numero de Boleta</label>
                                    <div class="input-group">
                                        <span class="input-group-text"> # </span>
                                        <input type="text" class="form-control" name="boleta" id="boleta" value="<?php echo $alumnor->NoBoleta; ?>" placeholder="No. de boleta" minlength="10" maxlength="10" onkeyup="alfanumerico('boleta')" required>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <label for="curp" class="form-label">CURP</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="curp" id="curp"  value="<?php echo $alumnor->CURP; ?>" placeholder="CURP" minlength="18" maxlength="18" onkeyup="alfanumerico('curp')" required>
                                    </div>
                                </div>


                                <div class="col-6">
                                    <label for="fecha" class="form-label">Fecha de nacimiento</label>
                                    <input type="date" class="form-control" name="fecha" id="fecha" value="<?php echo $alumnor->FNacimiento; ?>" max="2004-12-31" required>
                                </div>


                                <div class="col-6">
                                    <label for="genero" class="form-label">Genero</label>
                                    <select class="form-select" name="genero" id="genero" required>
                                        <option value="Ninguno" selected disabled>Selecciona tu genero</option>
                                        <option value="Masculino" <?php echo ($alumnor->Genero=='Masculino'?"selected":"");  ?> >Masculino</option>
                                        <option value="Femenino" <?php echo ($alumnor->Genero=='Femenino'?"selected":"");  ?> >Femenino</option>
                                    </select>
                                </div>

                            </div>


                            <br />
                            <!-- Seccion de Procedencia -->
                            <h4 class="mb-3 text-primary" >Procedencia</h4>
                            <hr class="my-4">

                            <div class="row gy-3">

                                <div class="col-12">
                                    <label for="entidad_procedencia" class="form-label">Entidad</label>
                                    <select class="form-select" name="entidad_procedencia" id="entidad_procedencia" required>
                                        <option value="Ninguna" selected disabled>Selecione su entidad federativa de procedencia</option>
                                        <option value="AGUASCALIENTES" <?php echo ($alumnor->Entidad=='AGUASCALIENTES'?"selected":"");  ?> >AGUAS CALIENTES</option>
                                        <option value="BAJACALIFORNIA" <?php echo ($alumnor->Entidad=='BAJACALIFORNIA'?"selected":"");  ?> >BAJA CALIFORNIA</option>
                                        <option value="BAJACALIFORNIASUR" <?php echo ($alumnor->Entidad=='BAJACALIFORNIASUR'?"selected":"");  ?> >BAJA CALIFORNIA SUR</option>
                                        <option value="CAMPECHE" <?php echo ($alumnor->Entidad=='CAMPECHE'?"selected":"");  ?> >CAMPECHE</option>
                                        <option value="COAHUILA" <?php echo ($alumnor->Entidad=='COAHUILA'?"selected":"");  ?> >COAHUILA</option>
                                        <option value="COLIMA" <?php echo ($alumnor->Entidad=='COLIMA'?"selected":"");  ?> >COLIMA</option>
                                        <option value="CHIAPAS" <?php echo ($alumnor->Entidad=='CHIAPAS'?"selected":"");  ?> >CHIAPAS</option>
                                        <option value="CHIHUAHUA" <?php echo ($alumnor->Entidad=='CHIHUAHUA'?"selected":"");  ?> >CHIHUAHUA</option>
                                        <option value="CDMX" <?php echo ($alumnor->Entidad=='CDMX'?"selected":"");  ?> >CDMX</option>
                                        <option value="DURANGO" <?php echo ($alumnor->Entidad=='DURANGO'?"selected":"");  ?> >DURANGO</option>
                                        <option value="GUANAJUATO" <?php echo ($alumnor->Entidad=='GUANAJUATO'?"selected":"");  ?> >GUANAJUATO</option>
                                        <option value="GUERRERO" <?php echo ($alumnor->Entidad=='GUERRERO'?"selected":"");  ?> >GUERRERO</option>
                                        <option value="HIDALGO" <?php echo ($alumnor->Entidad=='HIDALGO'?"selected":"");  ?> >HIDALGO</option>
                                        <option value="JALISCO" <?php echo ($alumnor->Entidad=='JALISCO'?"selected":"");  ?> >JALISCO</option>
                                        <option value="MEXICO" <?php echo ($alumnor->Entidad=='MEXICO'?"selected":"");  ?> >MEXICO</option>
                                        <option value="MICHOACAN"  <?php echo ($alumnor->Entidad=='MICHOACAN'?"selected":"");  ?> >MICHOACAN</option>
                                        <option value="MORELOS"  <?php echo ($alumnor->Entidad=='MORELOS'?"selected":"");  ?> >MORELOS</option>
                                        <option value="NAYARIT"  <?php echo ($alumnor->Entidad=='NAYARIT'?"selected":"");  ?> >NAYARIT</option>
                                        <option value="NUEVOLEON" <?php echo ($alumnor->Entidad=='NUEVOLEON'?"selected":"");  ?> >NUEVO LEON</option>
                                        <option value="OAXACA" <?php echo ($alumnor->Entidad=='OAXACA'?"selected":"");  ?> >OAXACA</option>
                                        <option value="PUEBLA"  <?php echo ($alumnor->Entidad=='PUEBLA'?"selected":"");  ?> >PUEBLA</option>
                                        <option value="QUERETARO" <?php echo ($alumnor->Entidad=='QUERETARO'?"selected":"");  ?> >QUERETARO</option>
                                        <option value="QUINTANA ROO" <?php echo ($alumnor->Entidad=='QUINTANA ROO'?"selected":"");  ?> >QUINTANA ROO</option>
                                        <option value="SAN LUIS POTOSI" <?php echo ($alumnor->Entidad=='SAN LUIS POTOSI'?"selected":"");  ?> >SAN LUIS POTOSI</option>
                                        <option value="SINALOA" <?php echo ($alumnor->Entidad=='SINALOA'?"selected":"");  ?> >SINALOA</option>
                                        <option value="SONORA" <?php echo ($alumnor->Entidad=='SONORA'?"selected":"");  ?> >SONORA</option>
                                        <option value="TABASCO"  <?php echo ($alumnor->Entidad=='TABASCO'?"selected":"");  ?> >TABASCO</option>
                                        <option value="TAMAULIPAS" <?php echo ($alumnor->Entidad=='TAMAULIPAS'?"selected":"");  ?> >TAMAULIPAS</option>
                                        <option value="TLAXCALA" <?php echo ($alumnor->Entidad=='TLAXCALA'?"selected":"");  ?> >TLAXCALA</option>
                                        <option value="VERACRUZ" <?php echo ($alumnor->Entidad=='VERACRUZ'?"selected":"");  ?> >VERACRUZ</option>
                                        <option value="YUCATAN" <?php echo ($alumnor->Entidad=='YUCATAN'?"selected":"");  ?> >YUCATAN</option>
                                        <option value="ZACATECAS" <?php echo ($alumnor->Entidad=='ZACATECAS'?"selected":"");  ?> >ZACATECAS</option>
                                    </select>
                                </div>

                                

                                <div class="col-md-6">
                                    <label for="escuela_procedencia" class="form-label">Escuela de procedencia</label>
                                    <select class="form-select" name="escuela_procedencia" id="escuela_procedencia" onchange="checaOtra()" required>
                                        <option value="Ninguna" selected disabled>Selecione su escuela de procedencia</option>
                                        <option value="CECyT 1 González Vázquez Vega" <?php echo ($alumnor->Escuela=='CECyT 1 González Vázquez Vega'?"selected":""); if($alumnor->Escuela=='CECyT 1 González Vázquez Vega') $otra = false;  ?> >CECyT 1 “González Vázquez Vega”</option>
                                        <option value="CECyT 2 Miguel Bernard" <?php echo ($alumnor->Escuela=='CECyT 2 Miguel Bernard'?"selected":""); if($alumnor->Escuela=='CECyT 2 Miguel Bernard') $otra = false; ?> >CECyT 2 "Miguel Bernard"</option>
                                        <option value="CECyT 3 Estanislao Ramírez Ruiz" <?php echo ($alumnor->Escuela=='CECyT 3 Estanislao Ramírez Ruiz'?"selected":""); if($alumnor->Escuela=='CECyT 3 Estanislao Ramírez Ruiz') $otra = false;  ?> >CECyT 3 "Estanislao Ramírez Ruiz"</option>
                                        <option value="CECyT 4 Lázaro Cárdenas" <?php echo ($alumnor->Escuela=='CECyT 4 Lázaro Cárdenas'?"selected":""); if($alumnor->Escuela=='CECyT 4 Lázaro Cárdenas') $otra = false; ?> >CECyT 4 "Lázaro Cárdenas"</option>
                                        <option value="CECyT 5 Benito Juárez García" <?php echo ($alumnor->Escuela=='CECyT 5 Benito Juárez García'?"selected":""); if($alumnor->Escuela=='CECyT 5 Benito Juárez García') $otra = false; ?> >CECyT 5 "Benito Juárez García"</option>
                                        <option value="CECyT 6 Miguel Othón de Mendizábal" <?php echo ($alumnor->Escuela=='CECyT 6 Miguel Othón de Mendizábal'?"selected":""); if($alumnor->Escuela=='CECyT 6 Miguel Othón de Mendizábal') $otra = false; ?> >CECyT 6 "Miguel Othón de Mendizábal"</option>
                                        <option value="CECyT 7 Cuauhtémoc" <?php echo ($alumnor->Escuela=='CECyT 7 Cuauhtémoc'?"selected":""); if($alumnor->Escuela=='CECyT 7 Cuauhtémoc') $otra = false; ?> >CECyT 7 "Cuauhtémoc"</option>
                                        <option value="CECyT 8 Narciso Bassols García" <?php echo ($alumnor->Escuela=='CECyT 8 Narciso Bassols García'?"selected":""); if($alumnor->Escuela=='CECyT 8 Narciso Bassols García') $otra = false; ?> >CECyT 8 "Narciso Bassols García"</option>
                                        <option value="CECyT 9 Juan de Dios Bátiz" <?php echo ($alumnor->Escuela=='CECyT 9 Juan de Dios Bátiz'?"selected":""); if($alumnor->Escuela=='CECyT 9 Juan de Dios Bátiz') $otra = false;  ?> >CECyT 9 "Juan de Dios Bátiz"</option>
                                        <option value="CECyT 10 Carlos Vallejo Márquez" <?php echo ($alumnor->Escuela=='CECyT 10 Carlos Vallejo Márquez'?"selected":"");  if($alumnor->Escuela=='CECyT 10 Carlos Vallejo Márquez') $otra = false; ?> >CECyT 10 "Carlos Vallejo Márquez"</option>
                                        <option value="CECyT 11 Wilfrido Massieu Pérez" <?php echo ($alumnor->Escuela=='CECyT 11 Wilfrido Massieu Pérez'?"selected":"");  if($alumnor->Escuela=='CECyT 11 Wilfrido Massieu Pérez') $otra = false; ?> >CECyT 11 "Wilfrido Massieu Pérez"</option>
                                        <option value="CECyT 12 José María Morelos y Pavón" <?php echo ($alumnor->Escuela=='CECyT 12 José María Morelos y Pavón'?"selected":""); if($alumnor->Escuela=='CECyT 12 José María Morelos y Pavón') $otra = false;  ?> >CECyT 12 "José María Morelos y Pavón"</option>
                                        <option value="CECyT 13 Ricardo Flores Magón" <?php echo ($alumnor->Escuela=='CECyT 13 Ricardo Flores Magón'?"selected":""); if($alumnor->Escuela=='CECyT 13 Ricardo Flores Magón') $otra = false;  ?> >CECyT 13 "Ricardo Flores Magón"</option>
                                        <option value="CECyT 14 Luis Enrique Erro" <?php echo ($alumnor->Escuela=='CECyT 14 Luis Enrique Erro'?"selected":""); if($alumnor->Escuela=='CECyT 14 Luis Enrique Erro') $otra = false; ?>  >CECyT 14 "Luis Enrique Erro"</option>
                                        <option value="CECyT 15 Diódoro Antúnez Echegaray" <?php echo ($alumnor->Escuela=='CECyT 15 Diódoro Antúnez Echegaray'?"selected":""); if($alumnor->Escuela=='CECyT 15 Diódoro Antúnez Echegaray') $otra = false;  ?> >CECyT 15 "Diódoro Antúnez Echegaray"</option>
                                        <option value="CECyT 19 Leona Vicario" <?php echo ($alumnor->Escuela=='CECyT 19 Leona Vicario'?"selected":""); if($alumnor->Escuela=='CECyT 19 Leona Vicario') $otra = false; ?> >CECyT 19 “Leona Vicario”</option>
                                        <option value="CET 1 Walter Cross Buchanan" <?php echo ($alumnor->Escuela=='CET 1 Walter Cross Buchanan'?"selected":""); if($alumnor->Escuela=='CET 1 Walter Cross Buchanan') $otra = false;  ?> >CET 1 “Walter Cross Buchanan”</option>
                                        <option value="Otra" <?php echo ($otra==true?"selected":""); ?> >Otra</option>
                                    </select>
                                </div>

                                

                                <div class="col-md-6">
                                    <label for="nombre_escuela" class="form-label">(Otra escuela)</label>
                                    <input type="text" class="form-control" name="nombre_escuela" id="nombre_escuela" value="<?php echo ($otra==true? $alumnor->Escuela:""); ?>" placeholder="Nombre de la escuela" maxlength="50" onkeyup="alfanumericoYEspaciosYPuntos('nombre_escuela')" disabled>
                                    <small class="text-muted">Si perteneces a una escuela externa al IPN</small>
                                </div>

                                <div class="col-md-6">
                                    <label for="cc-number" class="form-label">Promedio</label>
                                    <input type="number" class="form-control" name="promedio" id="promedio" value="<?php echo $alumnor->Promedio; ?>" placeholder="Promedio" step="0.01" min="0" max="10" required>
                                    <small class="text-muted">El promedio debe tener 2 decimales</small>
                                </div>

                                <div class="col-md-6">
                                    <label for="cc-expiration" class="form-label">Opcion de ESCOM</label><br/>
                                    <input type="checkbox" name="primera_opcion" id="primera_opcion" value="1" <?php echo ($alumnor->NumeroOp==1?"checked":""); ?> > Escom fue mi primera opción <br/>
                                    <input type="checkbox" name="segunda_opcion" id="segunda_opcion" value="2" <?php echo ($alumnor->NumeroOp==2?"checked":""); ?> > Escom fue mi segunda opción<br/>
                                    <input type="checkbox" name="tercera_opcion" id="tercera_opcion" value="3" <?php echo ($alumnor->NumeroOp==3?"checked":""); ?> > Escom fue mi tercera opción<br/>
                                    <input type="checkbox" name="cuarta_opcion"  id="cuarta_opcion"  value="4" <?php echo ($alumnor->NumeroOp==4?"checked":""); ?> > Escom fue mi cuarta opción<br/>
                                    
                                </div>

                               
                            </div>

                            <hr class="my-4">

                    </div>
                </div>

                <input type="hidden" id="EscomOpcion" name="EscomOpcion">
                <input type="hidden" id="EscuelaProcedencia" name="EscuelaProcedencia">
                
                <input type="submit" class="btn btn-primary btn-lg btn-block" value="Actualizar información">
                

                <br/>
                <br/>
                
            </form>
            <!--Aqui termina el formulario-->

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