<?php
include("./phpMailer/class.phpmailer.php");
include("./phpMailer/class.smtp.php");

$email_user = "sistemaequipo3@gmail.com"; //OJO. Debes actualizar esta línea con tu información
$email_password = "belverlopran123"; //OJO. Debes actualizar esta línea con tu información
$the_subject = "Prueba de PHPMailer por PEM (Dic 2021)";
$address_to = "juan.beltran2333@gmail.com"; //OJO. Debes actualizar esta línea con tu información
$from_name = "Tec Web - 2CM13";
$phpmailer = new PHPMailer();

// ---------- datos de la cuenta de Gmail -------------------------------
$phpmailer->Username = $email_user;
$phpmailer->Password = $email_password; 
//-----------------------------------------------------------------------
// $phpmailer->SMTPDebug = 1;
$phpmailer->SMTPSecure = 'ssl';
$phpmailer->Host = "smtp.gmail.com"; // GMail
$phpmailer->Port = 465;
$phpmailer->IsSMTP(); // use SMTP
$phpmailer->SMTPAuth = true;

$phpmailer->setFrom($phpmailer->Username,$from_name);
$phpmailer->AddAddress($address_to); // recipients email

$phpmailer->Subject = $the_subject;	
$phpmailer->Body .="<h1 style='color:#3498db;'>Hola chicas y chicos del grupo 2CM13!</h1>";
$phpmailer->Body .= "<p>Mensaje personalizado</p>";
$phpmailer->Body .= "<p>Fecha y Hora: ".date("d-m-Y h:i:s")."</p>";
$phpmailer->IsHTML(true);

if(!$phpmailer->Send()){
    echo "Mailer Error: " . $phpmailer->ErrorInfo;
}
?>