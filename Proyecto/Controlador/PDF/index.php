<?php
	//llamamos al archivo fpdf
	require('fpdf/fpdf.php');
	include('../ConexionBD.php');

	$conexion = new Conexion();
	$alumno = new Alumno();

	



	//$fpdf->Image(ruta, posicionx, posiciony, alto, ancho, tipo, link)

	class PDF extends FPDF
	{
		// Cabecera de página
		function Header()
		{
			
			// Logo
			//$this->Image('escudoESCOM.png',160,8,35, 30);
			//$this->Image('logo-ipn.png',10,8,35, 30, 30, 50, 'png');
			$this->Image('../../Recursos/Imagenes/encabezado.png',3,5,200);
			// Arial bold 15
			$this->SetFont('Arial','B',15);
			// Movernos a la derecha
			$this->Cell(60);
				// Título con un borde de rectangulo
				//$this->Cell(80,10,utf8_decode('Título del documento'),1,0,'C');
			//titulo sin borde
			$this->Cell(70,80,utf8_decode('Título del documento'),0,0,'C');
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
	//establecemos las fuentes
	$pdf->SetFont('Arial','B',12);
	//CELL nos pone el texto en tipo tablas
	$pdf->Cell(30,80, 'Hola Mundo');
	//utf8_decode() ayuda a que las ñ y acentos se vean sin problemas
	$pdf->Cell(40, 80, utf8_decode('Cómo estás?'));
	$pdf ->AddPage();
	//agregar texto especifico con Write
	$pdf->Write(80,'Hola Mundo otra vez');
	//le damos salida en el navegador
	$pdf ->Output();

	
?>
