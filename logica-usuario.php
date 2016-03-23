<?php

session_start();

function usuarioEstaLogado(){
	return isset($_SESSION["usuario_logado"]);
}

function usuarioLogado(){
	return $_SESSION["usuario_logado"];
}

function verificarUsuario(){	
	if (!usuarioEstaLogado()){
		$_SESSION["danger"] = "Você não tem acesso a esta funcionalidade";
		header("Location: index.php");
		die();
	}
}

function logarUsuario($psEmail){
	$_SESSION["usuario_logado"] = $psEmail;
}

function logout(){
	session_destroy();
	session_start();
}