<?php
	//llamamos al archivo fpdf
	require('fpdf/fpdf.php');
	
	include('ConexionBD.php');
	

	/*$consultaAlumno = new Conexion();
	$consultaAgenda = new Conexion();

	$alumno = new Alumno();
	$agendaAlum = new Agenda();

	$alumno = $consultaAlumno->consultarAlumno("2020630244");
	$agendaAlum = $consultaAgenda->consultaAgendaAlumno("2020630244");
	*/

	$consulta = new Conexion();

	$alumno = new Alumno();
	$agendaAlum = new Agenda();

	$alumno = $consulta->consultarAlumno("2020630244");
	$agendaAlum = $consulta->consultaAgendaAlumno("2020630244");	

	//echo $alumno->CURP;
	//echo $agendaAlum->fecha; 

	class PDF extends FPDF
	{
		// Cabecera de página
		function Header()
		{
			// encabezado
			$this->Image('../Recursos/Imagenes/encabezado.png',3,5,200);
			// Movernos a la derecha
			$this->Cell(60);
			//titulo sin borde
			$this->SetFont('Arial','B',15);
			$this->Cell(70,90,utf8_decode('Registro de Datos Generales para Alumnos de Nuevo Ingreso (Enero 2021)'),0,0,'C');
			// Salto de línea
			$this->Ln(30);
		}		

		// Pie de página
		function Footer()
		{
			// Posición: a 1,5 cm del final
			$this->SetY(-15);
			// Arial italic 8
			$this->SetFont('Arial','I',8);
			// Número de página
			$this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
		}
	}

	//instanciamos la clase
	$pdf = new PDF();
	//agregar un alias de pie de paginas
	$pdf-> AliasNbPages();
	//agregamos una pagina al pdf
	$pdf ->AddPage();
<<<<<<< HEAD
	//establecemos las fuentes
	$pdf->SetFont('Arial','B',12);
	//CELL nos pone el texto en tipo tablas
	$pdf->Cell(30,80, $alumno->Nombre);
	//utf8_decode() ayuda a que las ñ y acentos se vean sin problemas
	$pdf->Cell(40, 80, utf8_decode('Cómo estás?'));
=======

	//------------------1RA PAGINA------------------------------
	$pdf->Ln(25);
	$pdf->SetFont('Arial','I',12);
	$pdf->SetTextColor(128);
    $pdf->Cell(190,10,utf8_decode("NOTA: Los datos presentados en esta página fueron introducidos por el alumno durante el registro."));
	$pdf->Ln(20);

	//Identidad
    $pdf->SetFont('Arial','B',12);
    $pdf->SetFillColor( 111, 28, 70);
	$pdf->SetTextColor(255,255,255);
    $pdf->Cell(0,8,utf8_decode("IDENTIDAD"),0,1,'C',1);
    $pdf->Ln(5);
    //Datos identidad
    $pdf->SetFillColor(255,255,255);
	$pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(39,10,utf8_decode("Nombre completo:"));
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(0,10,utf8_decode("$alumno->ApellidoP $alumno->ApellidoM $alumno->Nombre"));
    $pdf->Ln(10);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(16,10,utf8_decode("Boleta:"));
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(0,10,utf8_decode("$alumno->NoBoleta"));
    $pdf->Ln(10);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(77,10,utf8_decode("Fecha de nacimiento (AAAA-MM-DD):"));
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(0,10,utf8_decode("$alumno->FNacimiento"));
    $pdf->Ln(10);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(18,10,utf8_decode("Género:"));
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(0,10,utf8_decode("$alumno->Genero"));
    $pdf->Ln(10);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(15,10,utf8_decode("CURP:"));
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(0,10,utf8_decode("$alumno->CURP"));
    $pdf->Ln(15);

	//Contacto
    $pdf->SetFont('Arial','B',12);
    $pdf->SetFillColor( 111, 28, 70);
	$pdf->SetTextColor(255,255,255);
    $pdf->Cell(0,8,utf8_decode("CONTACTO"),0,1,'C',1);
    $pdf->Ln(5);
    //Datos Contacto
    $pdf->SetFillColor(255,255,255);
	$pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(22,10,utf8_decode("Dirección:"));
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(0,10,utf8_decode("Calle $alumno->Calle , Col. $alumno->Colonia , Alcaldía $alumno->Alcaldia , C.P. $alumno->CodigoPostal"));
    $pdf->Ln(10);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(20,10,utf8_decode("Teléfono:"));
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(0,10,utf8_decode("$alumno->Telefono"));
    $pdf->Ln(10);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(40,10,utf8_decode("Correo electrónico:"));
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(0,10,utf8_decode("$alumno->Email"));
    $pdf->Ln(15);

	//Procedencia
    $pdf->SetFont('Arial','B',12);
    $pdf->SetFillColor( 111, 28, 70);
	$pdf->SetTextColor(255,255,255);
    $pdf->Cell(0,8,utf8_decode("PROCEDENCIA"),0,1,'C',1);
    $pdf->Ln(5);
    //Datos procedencia
    $pdf->SetFillColor(255,255,255);
	$pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(52,10,utf8_decode("Escuela de procedencia:"));
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(0,10,utf8_decode("$alumno->Escuela"));
    $pdf->Ln(10);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(40,10,utf8_decode("Entidad federativa:"));
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(0,10,utf8_decode("$alumno->Entidad"));
    $pdf->Ln(10);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(38,10,utf8_decode("Promedio escolar:"));
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(0,10,utf8_decode("$alumno->Promedio"));
    $pdf->Ln(10);
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(0,10,utf8_decode("ESCOM corresponde a tu opción número $alumno->NumeroOp en tu selección de universidades."));
    $pdf->Ln(15);



	//------------------------2DA PAGINA-----------------------
>>>>>>> 32bfddadba934b42a8cc09c271e7bba759d88501
	$pdf ->AddPage();

	$pdf->Ln(25);
	$pdf->SetFont('Arial','I',12);
	$pdf->SetTextColor(128);
	$pdf->Cell(190,10,utf8_decode("NOTA: Los datos presentados en esta página corresponden a la asignación de horario, fecha y lugar"));
	$pdf->Ln(1);  
	$pdf->Cell(20,20,utf8_decode("del examen."));
	$pdf->Ln(25);

	//Horario de aplicacion
    $pdf->SetFont('Arial','B',12);
    $pdf->SetFillColor( 112, 28, 70);
	$pdf->SetTextColor(255,255,255);
    $pdf->Cell(0,8,utf8_decode("FECHA & HORARIO"),0,1,'C',1);
    $pdf->Ln(5);
	//Datos fecha y hora
	$pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(77,10,utf8_decode("Fecha de aplicación (AAAA-MM-DD):"));
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(60,10,utf8_decode("$agendaAlum->fecha"));
	$pdf->Ln(10);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(14,10,utf8_decode("Hora:"));
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(0,10,utf8_decode("$agendaAlum->Hora"));
    $pdf->Ln(20);

	//Lugar de aplicacion
    $pdf->SetFont('Arial','B',12);
    $pdf->SetFillColor( 112, 28, 70);
	$pdf->SetTextColor(255,255,255);
    $pdf->Cell(0,8,utf8_decode("LUGAR"),0,1,'C',1);
    $pdf->Ln(5);
	//Datos lugar
	$pdf->SetTextColor(0,0,0);
	$pdf->SetFont('Arial','B',12);
    $pdf->Cell(18,10,utf8_decode("Edificio:"));
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(0,10,utf8_decode("$agendaAlum->EdificioLab"));
    $pdf->Ln(10);
	$pdf->SetFont('Arial','B',12);
    $pdf->Cell(28,10,utf8_decode("Laboratorio:"));
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(0,10,utf8_decode("$agendaAlum->NombreLab"));

	//le damos salida en el navegador
	$pdf ->Output();

<<<<<<< HEAD
	
=======
>>>>>>> 32bfddadba934b42a8cc09c271e7bba759d88501
?>
