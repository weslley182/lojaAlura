<?php

require_once("PHPMailerAutoload.php");

session_start();

$sNome = $_POST["nome"];
$sEmail = $_POST["email"];
$sMensagem = $_POST["mensagem"];

$oMail = new PHPMailer();

$oMail->isSMTP();
$oMail->Host = 'smtp.gmail.com';
$oMail->Port = 587;
$oMail->SMTPSecure = 'tls';
$oMail->SMTPAuth = true;
$oMail->Username = "weslley182@gmail.com";
$oMail->Password = md5("5df20b1ada0ead9fc832424f520e674b");

$oMail->setFrom($sEmail, $sNome);
$oMail->addAddress("weslley182@gmail.com");
$oMail->Subject = "Email de contato da loja";

$oMail->msgHTML("<html>de: {$sNome}<br/>email: {$sEmail}<br/>mensagem: {$sMensagem}</html>");
$oMail->AltBody = "de: {$sNome} \n email:{$sEmail} \n mensagem: {$sMensagem}";

if($oMail->send()) {
    $_SESSION["success"] = "Mensagem enviada com sucesso";
    header("Location: index.php");
} else {
    $_SESSION["danger"] = "Erro ao enviar mensagem " . $oMail->ErrorInfo;
    header("Location: contato.php");
}
die();