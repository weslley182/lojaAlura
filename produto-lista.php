<?php require_once("cabecalho.php");
 	  require_once("banco-produto.php");
	  require_once("banco-categoria.php");
      require_once("class/Produto.php");


$produtos = listarProdutos($conexao);
$categorias = listarCategorias($conexao);
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
		<td><?= $produto->nome ?></td>
		<td><?= $produto->preco ?></td>
		<td><?= $produto->valorComDesconto(); ?></td>
		<td><?= substr($produto->descricao ,0,40) ?></td>
		<td><?= $produto->categoria->nome ?></td>
		<!--<td>
			<select name="categoria_id">

				<?php  foreach($categorias as $categoria) : ?>
					<option value="<?=$categoria->id?>">
						<?=$categoria->nome?>
					</option>
				<?php  endforeach ?>
			</select>
		</td> -->
		<td><?= $produto->usado ?></td>
		<td><a class="btn btn-primary" href="produto-altera-formulario.php?id=<?= $produto->id ?>">Alterar</a></td>
		<td>
			<form action="remove-produto.php" method="post">
				<input type="hidden" name="id" value="<?= $produto->id ?>" />
				<button class="btn btn-danger">Remover</button>				
			</form>
		</td>
	</tr>
<?php	
endforeach

?>
</table>


<?php require_once("rodape.php"); ?>