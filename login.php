<?php require_once("banco-usuario.php");
	  require_once("logica-usuario.php");

$email = $_POST["email"];
$senha = $_POST["senha"];

$usuario = buscarUsuario($conexao, $email, $senha);
if($usuario == null){
	$_SESSION["danger"] = "Usuário ou senha inválido.";
	header("location: index.php");
}else{
	$_SESSION["success"] = "Usuário logado com sucesso.";
	logarUsuario($usuario["email"]);
	header("location: index.php");
}
