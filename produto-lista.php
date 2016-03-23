<?php require_once("cabecalho.php");
 	  require_once("conecta.php");

$oProdDao = new ProdutoDAO($conexao);
$produtos = $oProdDao->listarProdutos();

$oCatDao = new CategoriaDAO($conexao);
$categorias = $oCatDao->listarCategorias();
?>

<form action="produto-formulario.php" method="post">
	<button  class="btn btn-primary">Adiciona Produtos</button>
</form>
<table class="table table-striped table-bordered">
	<tr>
		<th>Nome</th>
		<th>Preço</th>
		<th>Desconto</th>
		<th>Descrição</th>
		<th>Categoria</th>
		<th>Usado?</th>
		<th>Ações</th>
	</tr>
<?php
foreach($produtos as $produto):
?>
	<tr>
		<td><?= $produto->getNome(); ?></td>
		<td><?= $produto->getPreco() ?></td>
		<td><?= $produto->valorComDesconto(); ?></td>
		<td><?= substr($produto->getDescricao() ,0,40); ?></td>
		<td><?= $produto->getCategoria()->getNome(); ?></td>
		<!--<td>
			<select name="categoria_id">

				<?php  foreach($categorias as $categoria) : ?>
					<option value="<?= $categoria->getId() ?>">
						<?= $categoria->getNome() ?>
					</option>
				<?php  endforeach ?>
			</select>
		</td> -->
		<td><?= $produto->getUsado(); ?></td>



		<td><a class="btn btn-primary" href="produto-altera-formulario.php?id=<?= $produto->getId(); ?>">Alterar</a></td>
		<td>
			<form action="remove-produto.php" method="post">
				<input type="hidden" name="id" value="<?= $produto->getId() ?>" />
				<button class="btn btn-danger">Remover</button>				
			</form>
		</td>
	</tr>
<?php	
endforeach

?>
</table>


<?php require_once("rodape.php"); ?>