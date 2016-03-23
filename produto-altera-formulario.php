<?php require_once("cabecalho.php"); 
	  require_once("banco-categoria.php"); 
	  require_once("banco-produto.php");
	  require_once("logica-usuario.php");
	  require_once("class/Produto.php");
      require_once("class/Categoria.php");

verificarUsuario();

$id = $_GET['id'];
$produto = new Produto();
$produto = buscarProduto($conexao, $id);

$categorias = new Categoria();
$categorias =  listarCategorias($conexao);

$bUsado = $produto->usado ? "checked='checked' " : "";

?>

	<h1>Alterando Produtos</h1>
	<form action = "altera-produto.php" method="post">
		<table class="table">
			<input type="hidden" name="id" value="<?= $produto->id ?>" />
<?php 
			require_once("produto-formulario-base.php");
?>
			<tr>
				<td><input type="submit" value="Salvar" class="btn btn-primary" /></td>
			</tr>			
		</table>
	</form>

<?php require_once("rodape.php"); ?>