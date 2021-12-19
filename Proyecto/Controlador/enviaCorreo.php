<?php
    include("./phpMailer/class.phpmailer.php");
    include("./phpMailer/class.smtp.php");
    //require('fpdf/fpdf.php');

    class enviaCorreo{
        public $phpmailer;

        function __construct() {
            $this -> phpmailer = new PHPMailer();
            $this->phpmailer->Username = "sistemaequipo3@gmail.com";
            $this->phpmailer->Password = "belverlopran123";
            
            $this->phpmailer->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
            $this->phpmailer->Host = "smtp.gmail.com"; // Gmail
            $this->phpmailer->Port = 465;
            $this->phpmailer->IsSMTP(); // use SMTP
            $this->phpmailer->SMTPAuth = true;

            $this->phpmailer->setFrom($this->phpmailer->Username, "Sistema Nuevo Ingreso ESCOM", 0);
        }

        function enviar($correoDestino, $elPdf){
            $archivoAdjunto = $elPdf->Output('','S');


            //$this->phpmailer->AddAddress($correoDestino);
            $this->phpmailer->AddAddress("juan.beltran2333@gmail.com");
            
            $this->phpmailer->Subject = "Comprobante de inscripcion Nuevo ingreso";	
            $this->phpmailer->Body .="<h1 style='color:#3498db;'>Bienvenido a Escom!</h1><p>";
            $this->phpmailer->Body .= "Este es tu comprobante de inscripcion.";
            $this->phpmailer->AddStringAttachment($archivoAdjunto, 'Comprobante.pdf', 'base64', 'application/pdf');
            $this->phpmailer->Body .= "</p><p>Generado en fecha y hora: ".date("d-m-Y h:i:s")."</p>";
            $this->phpmailer->IsHTML(true);

            if(!$this->phpmailer->Send()){
                echo "Mailer Error: " . $this->phpmailer->ErrorInfo;
            }
        }
    }

?>