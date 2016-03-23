<?php

require_once("conecta.php");
require_once("class/Categoria.php");

function  listarCategorias($psConexao){
	$oCategorias = array();
	$sSql = "select * from categorias";
	$resultado = mysqli_query($psConexao, $sSql);

	while($sCategoria = mysqli_fetch_assoc($resultado)){
		$oCat = new Categoria();
		$oCat->id = $sCategoria['id'];
		$oCat->nome = $sCategoria['nome'];
		array_push($oCategorias, $oCat);
	}	

	return $oCategorias;
}

function removerCategoria($psConexao, $pnId){
	$sSql = "delete from categorias where id = {$pnId}";
	return mysqli_query($psConexao, $sSql);
}

function inserirCategoria($psConexao, $psNome){
	$sNome = mysqli_real_escape_string($psConexao, $psNome); 
	$sSql = "insert into categorias(nome) values('{$sNome}')";
	return mysqli_query($psConexao, $sSql);
}