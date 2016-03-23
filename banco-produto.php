<?php

require_once("conecta.php");
require_once("class/Produto.php");

function inserirProduto($psConexao, $poProd){
	$sNome = mysqli_real_escape_string($psConexao, $poProd->nome); 
	$sDescricao = mysqli_real_escape_string($psConexao, $poProd->descricao); 
	$sSql = "insert into produtos(nome, preco, descricao, categoria_id, usado) " .
			"values('{$sNome}', {$poProd->preco}, '{$sDescricao}', {$poProd->categoria->id}, {$poProd->usado})";

	return mysqli_query($psConexao, $sSql);
}

function  listarProdutos($psConexao){
	$produtos = array();
	$sSql = " Select pro.*, cat.nome as catNome from produtos pro " .
			" left join categorias cat " .
			" on cat.id = pro.categoria_id";
	$resultado = mysqli_query($psConexao, $sSql);

	while($produto = mysqli_fetch_assoc($resultado)){
		$oProd = new Produto();
		$oProd->id = $produto['id'];
		$oProd->nome = $produto['nome'];
		$oProd->descricao = $produto['descricao'];
		$oProd->preco = $produto['preco'];
		$oProd->usado = $produto['usado'];

		array_push($produtos, $oProd);
	}	

	return $produtos;
}

function removerProduto($psConexao, $id){
	$sSql = "delete from produtos where id = {$id}";
	return mysqli_query($psConexao, $sSql);
}

function buscarProduto($psConexao, $pnId){
	$sSql = "select * from produtos where id = {$pnId}"	;
	$result = mysqli_query($psConexao, $sSql);
	$resultado =  mysqli_fetch_assoc($result);

	$oCat = new Categoria();
	$oCat->id = $resultado['categoria_id'];

	$oProd = new Produto();
	$oProd->id = $resultado['id'];
	$oProd->nome = $resultado['nome'];
	$oProd->preco = $resultado['preco'];
	$oProd->descricao = $resultado['descricao'];
	$oProd->usado = $resultado['usado'];
	$oProd->categoria = $oCat;

	return ($oProd);
}

function alterarProduto($psConexao, $poProd){
	$sNome = mysqli_real_escape_string($psConexao, $poProd->nome); 
	$sDescricao = mysqli_real_escape_string($psConexao, $poProd->descricao); 	
	$sSql = "Update produtos set nome = '{$sNome}', preco = {$poProd->preco}, descricao = '{$sDescricao}', ". 
			" categoria_id = {$poProd->categoria}, usado = {$poProd->usado}" .
			" Where id = {$poProd->id} ";
	return mysqli_query($psConexao, $sSql);	
}