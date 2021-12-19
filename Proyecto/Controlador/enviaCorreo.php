<?php
    include("./phpMailer/class.phpmailer.php");
    include("./phpMailer/class.smtp.php");
    include("./phpMailer/class.smtp.php");

    class enviaCorreo{
        public $email_user = "SistemaEquipo3@gmail.com"; //OJO. Debes actualizar esta línea con tu información
        public $email_password = "belverlopran123"; //OJO. Debes actualizar esta línea con tu información
        public $from_name = "Sistema Nuevo Ingreso ESCOM";
        public $phpmailer = new PHPMailer();

        function __construct() {
            $this->phpmailer->Username = $this->email_user;
            $this->phpmailer->Password = $this->email_password;
            
            $this->phpmailer->SMTPSecure = 'ssl';
            $this->phpmailer->Host = "smtp.gmail.com"; // Gmail
            $this->phpmailer->Port = 465;
            $this->phpmailer->IsSMTP(); // use SMTP
            $this->phpmailer->SMTPAuth = true;

            $this->phpmailer->setFrom($this->phpmailer->Username,$this->from_name);
        }

        function enviar($correoDestino, $asunto, $mensaje){
            $this->phpmailer->AddAddress($correoDestino);
            $this->phpmailer->Subject = $asunto;	
            $this->phpmailer->Body .="<h1 style='color:#3498db;'>Hola chicas y chicos del grupo 2CM13!</h1><p>";
            $this->phpmailer->Body .= $mensaje;
            $this->phpmailer->Body .= "</p><p>Fecha y Hora: ".date("d-m-Y h:i:s")."</p>";
            $this->phpmailer->IsHTML(true);

            $this->phpmailer->Send();
        }
    }

?>