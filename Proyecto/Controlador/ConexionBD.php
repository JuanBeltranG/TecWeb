<?php
	include("../Modelo/Alumno.php");

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
                        
            $query1 = "call AltaAlumno (
                '$alumno->NoBoleta',
                '$alumno->Nombre',
                '$alumno->ApellidoP',
                '$alumno->ApellidoM',
                '$alumno->FNacimiento',
                '$alumno->Genero',
                '$alumno->CURP',
                '$alumno->Calle',
                '$alumno->Colonia',
                '$alumno->Alcaldia',
                '$alumno->CodigoPostal',
                '$alumno->Telefono',
                '$alumno->Email',
                '$alumno->Escuela',
                '$alumno->Entidad',
                '$alumno->Promedio',
                '$alumno->NumeroOp')";
            $this->mysqli->query($query1);
        } 

        public function consultarAlumno($boleta){
            $alumno = new Alumno();
            
            $query = "Call ConsultaAlumnos($boleta)";

            if($result =  $this->mysqli->query($query)){
                while ($row = mysqli_fetch_assoc($result)){

                    $alumno->NoBoleta = $row['NoBoleta'];  
                    $alumno->Nombre = $row['Nombre'];
                    $alumno->ApellidoP = $row['ApellidoP'];
                    $alumno->ApellidoM = $row['ApellidoM'];

                }
            }
            return $alumno;
        }

		
	}
?>