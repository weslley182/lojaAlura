<?php require_once("cabecalho.php");	  
	  require_once("banco-categoria.php"); ?>

	<?php

		$nome = $_POST["nome"];

		$conectou = inserirCategoria($conexao, $nome);

	if ($conectou){
	?>	
		<p class="text-success">
			Categoria <?= $nome; ?> adicionada com sucesso!
		</p>
	<?php
	} else{
		$msg = mysqli_error($conexao);

	?>
		<p class="text-danger">
			Categoria <?= $nome; ?> não foi adicionada: <?= $msg ?>.
		</p>
	<?php
	}
	?>	

<?php require_once("rodape.php"); ?>