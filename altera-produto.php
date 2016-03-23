<?php require_once("cabecalho.php");
	  require_once("banco-produto.php");  
	  require_once("class/Produto.php")
?>

	<?php

		$oCat = new Categoria();
		$oCat->id = $_POST["categoria_id"];

		$oProd = new Produto();
		$oProd->id = $_POST["id"];
		$oProd->nome = $_POST["nome"];
		$oProd->preco = $_POST["preco"];
		$oProd->descricao = $_POST["descricao"];
		$oProd->categoria = $oCat;
		
		if(array_key_exists('usado', $_POST)){
			$bUsado = "true";
		}else{
			$bUsado = "false";
		}
		$oProd->usado = $bUsado;

		$conectou = alterarProduto($conexao, $oProd);

	if ($conectou){
	?>	
		<p class="text-success">
			Produto <?= $nome; ?>, <?= $preco; ?> alterado com sucesso!
		</p>
	<?php
	} else{
		$msg = mysqli_error($conexao);

	?>
		<p class="text-danger">
			Produto <?= $nome; ?> não foi alterado: <?= $msg ?>.
		</p>
	<?php
	}
	?>	

<?php require_once("rodape.php"); ?>