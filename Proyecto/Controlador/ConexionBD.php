<?php
	include("../../Modelo/Alumno.php");
    class Conexion {
        public $url = "localhost";
        public $user = "root";
        public $psw = "n0m3l0";
        public $bd = "NuevoIngresoESCOM";
        public $port = 3306;
        public $mysqli;

        function __construct() {
            $this->mysqli = mysqli_connect($this->url, $this->user, $this->psw, $this->bd, $this->port);
        }

        public function registrarAlumno($alumno){        
            $query = "CALL AltaAlumno (
                $alumno->NoBoleta,
                $alumno->Nombre,
                $alumno->ApellidoP,
                $alumno->ApellidoM,
                $alumno->FNacimiento,
                $alumno->Genero,
                $alumno->CURP,
                $alumno->Calle,
                $alumno->Colonia,
                $alumno->CodigoPostal,
                $alumno->Telefono,
                $alumno->CURP,
                $alumno->Email,
                $alumno->Escuela,
                $alumno->Entidad,
                $alumno->Promedio,
                $alumno->NumeroOp
            )";
            $this->mysqli->query($query);
        } 

        public function consultarAlumno($boleta){
            $alumno = new Alumno;
            $alumno->boleta=0;
            $query = "Call procedureAlumno(2, '$boleta', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', 0)";
            if($result =  $this->mysqli->query($query)){
                while ($row = mysqli_fetch_assoc($result)){
                    $alumno->boleta = $row['boleta'];  
                    $alumno->nombre = $row['nombre'];
                    $alumno->paterno = $row['apellidoPat'];
                    $alumno->materno = $row['apellidoMat'];
                    $alumno->email = $row['email'];
                    $alumno->nacimiento = $row["nacimiento"];
                    $alumno->genero = $row['genero'];
                    $alumno->curp = $row['curp'];
                    $alumno->calle = $row['calle'];
                    $alumno->colonia = $row['colonia'];
                    $alumno->cp = $row['cp'];
                    $alumno->tel = $row['tel'];
                    $alumno->promedio = $row['promedio'];
                    $alumno->opcion = $row['opcionEscom'];
                    $alumno->procedencia = $row['escuela'];
                    $alumno->estado = $row['estado'];
                    $alumno->laboratorio = $row['laboratorio'];
                    $alumno->hora = $row['hora'];
                    $alumno->fechaAplicacion = $row['fecha'];
                    $alumno->idEstado = $row['idEstado'];
                    $alumno->idEscuela = $row['idEscuela'];
                    $alumno->otra = $alumno->procedencia;
                }
            }
            return $alumno;
        }

        public function editarAlumno($alumno){
            $query = "CALL ProcedureAlumno (3, '$alumno->boleta', '$alumno->nombre', '$alumno->paterno', '$alumno->materno',
                 '$alumno->email', '$alumno->nacimiento', '$alumno->genero', '$alumno->curp', '$alumno->calle', 
                 '$alumno->colonia', '$alumno->cp', '$alumno->tel', '$alumno->promedio', '$alumno->opcion', 
                 $alumno->procedencia, '$alumno->otra', $alumno->estado)";
            $this->mysqli->query($query);
        }

        public function eliminarAlumno($boleta){
            $query = "Call procedureAlumno(4, '$boleta', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', 0)";
            $this->mysqli->query($query);
        }

        public function consultarTodosAlumnos(){ //Devuvelve un array de alumnos    
            $Alumnos= [];
            $query = "Call procedureAlumno(5, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', 0);";
            if($result =  $this->mysqli->query($query)){
                while ($row = mysqli_fetch_assoc($result)){
                    $alumno = new Alumno;
                    $alumno->boleta = $row['boleta'];  
                    $alumno->nombre = $row['nombre'];
                    $alumno->paterno = $row['apellidoPat'];
                    $alumno->materno = $row['apellidoMat'];
                    $alumno->email = $row['email'];
                    $alumno->nacimiento = $row["nacimiento"];
                    $alumno->genero = $row['genero'];
                    $alumno->curp = $row['curp'];
                    $alumno->calle = $row['calle'];
                    $alumno->colonia = $row['colonia'];
                    $alumno->cp = $row['cp'];
                    $alumno->tel = $row['tel'];
                    $alumno->promedio = $row['promedio'];
                    $alumno->opcion = $row['opcionEscom'];
                    $alumno->procedencia = $row['escuela'];
                    $alumno->estado = $row['estado'];
                    $alumno->laboratorio = $row['laboratorio'];
                    $alumno->hora = $row['hora'];
                    $alumno->fechaAplicacion = $row['fecha'];
                    array_push($Alumnos, $alumno);
                }
            }
            return $Alumnos;
        }
		
		public function sendpdfforcurp($curp){
            $alumno = new Alumno;
            $alumno->curp=0;
            $query = "Call procedureAlumno(6, '', '', '', '', '', '', '', '$curp', '', '', '', '', '', '', 0, '', 0)";
            if($result =  $this->mysqli->query($query)){
                while ($row = mysqli_fetch_assoc($result)){
                    $alumno->boleta = $row['boleta'];  
                    $alumno->nombre = $row['nombre'];
                    $alumno->paterno = $row['apellidoPat'];
                    $alumno->materno = $row['apellidoMat'];
                    $alumno->email = $row['email'];
                    $alumno->nacimiento = $row["nacimiento"];
                    $alumno->genero = $row['genero'];
                    $alumno->curp = $row['curp'];
                    $alumno->calle = $row['calle'];
                    $alumno->colonia = $row['colonia'];
                    $alumno->cp = $row['cp'];
                    $alumno->tel = $row['tel'];
                    $alumno->promedio = $row['promedio'];
                    $alumno->opcion = $row['opcionEscom'];
                    $alumno->procedencia = $row['escuela'];
                    $alumno->estado = $row['estado'];
                    $alumno->laboratorio = $row['laboratorio'];
                    $alumno->hora = $row['hora'];
                    $alumno->fechaAplicacion = $row['fecha'];
                    $alumno->idEstado = $row['idEstado'];
                    $alumno->idEscuela = $row['idEscuela'];
                    $alumno->otra = $alumno->procedencia;
                }
            }
            return $alumno;
        }

        public function validarAdmin($usuario, $contrasena){
            $consulta = "SELECT * FROM ADMIN WHERE usuario = '$usuario' and clave = '$contrasena'";
            $resul = $this->mysqli->query($consulta);
		    $filas = mysqli_num_rows($resul);
            return $filas;
        }

        public function getEstado($idEstado){
            $estado = "";
            $consulta = "select estado from Estados where idEstado = $idEstado;";
            if($result =  $this->mysqli->query($consulta)){
                while ($row = mysqli_fetch_assoc($result)){
                    $estado = $row['estado']; 
                }
            }
            return $estado;
        }
		
	}
?>