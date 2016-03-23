<?php

require_once("conecta.php"); 

function buscarUsuario($psConexao, $psEmail, $psSenha){
	$sSenhaMD5 = md5($psSenha);
	$sEmail = mysqli_real_escape_string($psConexao, $psEmail); 
	$sSql = "select * from usuarios where email = '{$sEmail}' and senha = '{$sSenhaMD5}' ";
	$resultado = mysqli_query($psConexao, $sSql);
	return mysqli_fetch_assoc($resultado);
}