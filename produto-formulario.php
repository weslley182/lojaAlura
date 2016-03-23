<?php require_once("cabecalho.php"); 
	  require_once("banco-categoria.php"); 
	  require_once("logica-usuario.php");
	  require_once("class/categoria.php");
	  require_once("class/Produto.php");

verificarUsuario();
$produtos = new Produto();
#$produtos->categoria->id = 1;
$usado = "";

$categorias = new Categoria();
$categorias =  listarCategorias($conexao);

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