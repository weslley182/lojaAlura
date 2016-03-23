<?php require_once("cabecalho.php");
	  require_once("conecta.php");
	  require_once("logica-usuario.php");

verificarUsuario();
$produto = new Produto();
$usado = "";

$categorias = new Categoria();
$oCatDao = new CategoriaDAO($conexao);
$categorias =  $oCatDao->listarCategorias();

?>

	<h1>Formulário de cadastro Produtos</h1>
	<form action = "adiciona-produto.php" method="post">
		<table class="table">			
<?php
			require_once("produto-formulario-base.php");
?>
			<tr>
				<td><input type="submit" value="Cadastrar" class="btn btn-primary" /></td>
			</tr>			
		</table>
	</form>

<?php require_once("rodape.php"); ?>