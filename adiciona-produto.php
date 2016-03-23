<?php require_once("cabecalho.php");
	  require_once("conecta.php");
	  require_once("logica-usuario.php"); 

?>

	<?php
		verificarUsuario();
		$oProd = new Produto();
		$oCat = new Categoria();
		$oCat->setId($_POST["categoria_id"]);
		$oProd->setNome($_POST["nome"]);
		$oProd->setPreco($_POST["preco"]);
		$oProd->setDescricao($_POST["descricao"]);
		$oProd->setCategoria($oCat);
		
		if(array_key_exists('usado', $_POST)){
			$bUsado = "true";
		}else{
			$bUsado = "false";
		}
		$oProd->setUsado($bUsado);
		$oProdDao = new ProdutoDAO($conexao);


		$conectou = $oProdDao->inserirProduto($oProd);

	if ($conectou){
	?>	
		<p class="text-success">
			Produto <?= $oProd->getNome(); ?>, <?= $oProd->getPreco(); ?> adicionado com sucesso!
		</p>
	<?php
	} else{
		$msg = mysqli_error($conexao);

	?>
		<p class="text-danger">
			Produto <?= $oProd->getNome(); ?> não foi adicionado: <?= $msg ?>.
		</p>
	<?php
	}
	?>	

<?php require_once("rodape.php"); ?>