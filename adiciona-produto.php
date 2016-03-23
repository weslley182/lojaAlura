<?php require_once("cabecalho.php");
	  require_once("banco-produto.php"); 
	  require_once("logica-usuario.php"); 
	  require_once("class/Produto.php");
      require_once("class/Categoria.php");
?>

	<?php
		verificarUsuario();
		$oProd = new Produto();
		$oCat = new Categoria();
		$oCat->id = $_POST["categoria_id"];
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


		$conectou = inserirProduto($conexao, $oProd);

	if ($conectou){
	?>	
		<p class="text-success">
			Produto <?= $oProd->nome; ?>, <?= $oProd->preco; ?> adicionado com sucesso!
		</p>
	<?php
	} else{
		$msg = mysqli_error($conexao);

	?>
		<p class="text-danger">
			Produto <?= $oProd->nome; ?> não foi adicionado: <?= $msg ?>.
		</p>
	<?php
	}
	?>	

<?php require_once("rodape.php"); ?>