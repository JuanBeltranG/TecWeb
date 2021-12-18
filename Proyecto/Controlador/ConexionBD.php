<?php
	include("../Modelo/Alumno.php");
    include("../Modelo/Agenda.php");

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

        function IniciaConexion(){
            $this->mysqli = mysqli_connect($this->url, $this->user, $this->psw, $this->bd, $this->port);
        }

        public function registrarAlumno($alumno){  
            
            self::IniciaConexion();
                        
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

            self::IniciaConexion();

            $alumno = new Alumno();
            $query = "Call ConsultaAlumnos($boleta)";

            if($result =  $this->mysqli->query($query)){
                while ($row = mysqli_fetch_assoc($result)){

                    $alumno->NoBoleta = $row['NoBoleta'];  
                    $alumno->Nombre = $row['Nombre'];
                    $alumno->ApellidoP = $row['ApellidoP'];
                    $alumno->ApellidoM = $row['ApellidoM'];
                    $alumno->FNacimiento= $row['FechaNacimiento'];
                    $alumno->Genero= $row['Genero'];
                    $alumno->CURP= $row['CURP'];
                    $alumno->Calle= $row['Calle'];
                    $alumno->Colonia= $row['Colonia'];
                    $alumno->Alcaldia= $row['Alcaldia'];
                    $alumno->CodigoPostal= $row['CodigoPostal'];
                    $alumno->Telefono= $row['Telefono'];
                    $alumno->Email= $row['Email'];
                    $alumno->Escuela= $row['Escuela'];
                    $alumno->Entidad= $row['Entidad'];
                    $alumno->Promedio= $row['Promedio'];
                    $alumno->NumeroOp= $row['NumOpcion'];

                }
            }
            return $alumno;
        }

        public function consultaAgendaAlumno($boleta){

            self::IniciaConexion();

            $agenda = new Agenda();
            $query = "Call ConsultaAgendaAlumno($boleta)";

            if($result =  $this->mysqli->query($query)){

              

                while ($row = mysqli_fetch_assoc($result)){

                    $agenda->IdAgenda = $row['Id_Agenda'];  
                    $agenda->IdLab = $row['Id_Laboratorio'];
                    $agenda->NombreLab = $row['Nombre'];
                    $agenda->EdificioLab = $row['Edificio'];
                    $agenda->Hora = $row['Hora'];
                    $agenda->fecha = $row['fecha'];
                }
            }
            return $agenda;
        }

		
	}
?>