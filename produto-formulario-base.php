<tr>
	<td>Nome</td>
	<td><input type="text" name="nome" class="form-control" value="<?= $produto->getNome(); ?>" /></td>
</tr>
<tr>
	<td>Preço</td>
	<td><input type="number" name="preco" class="form-control" value="<?= $produto->getPreco(); ?>" /></td>
</tr>
<tr>
	<td>Descrição</td>
	<td><textarea name="descricao" class="form-control"><?= $produto->getDescricao(); ?></textarea></td>
</tr>
<tr>
	<td></td>
	<td><input type="checkbox" name="usado" <?= $bUsado ?> value="true">Usado</td>
</tr>
<tr>
	<td>Categoria</td>
	<td>
		<select name="categoria_id" class="form-control">
		<?php
		$oCatDao = new CategoriaDAO($conexao);
		$categorias = $oCatDao->listarCategorias();
		foreach($categorias as $categoria): 
			$essaEhACategoria = $produto->getCategoria()->getId == $categoria->getId;
			$selecao = $essaEhACategoria ? "selected='selected' " : ""
		?>
			<option value="<?= $categoria->getId(); ?>" <?= $selecao ?>
					> <?= $categoria->getNome(); ?></option>
		<?php endforeach ?>
		</select>
	</td>
</tr>