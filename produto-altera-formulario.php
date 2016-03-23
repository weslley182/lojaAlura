<?php require_once("cabecalho.php");
	  require_once("conecta.php");
	  require_once("logica-usuario.php");

verificarUsuario();

$id = $_GET['id'];
$produto = new Produto();

$oProdDao = new ProdutoDAO($conexao);
$produto = $oProdDao->buscarProduto($id);

$categorias = new Categoria();
$oCatDao = new CategoriaDAO($conexao);
$categorias =  $oCatDao->listarCategorias();

$bUsado = $produto->getUsado() ? "checked='checked' " : "";

?>

	<h1>Alterando Produtos</h1>
	<form action = "altera-produto.php" method="post">
		<table class="table">
			<input type="hidden" name="id" value="<?= $produto->getId(); ?>" />
<?php 
			require_once("produto-formulario-base.php");
?>
			<tr>
				<td><input type="submit" value="Salvar" class="btn btn-primary" /></td>
			</tr>			
		</table>
	</form>

<?php require_once("rodape.php"); ?>