<?php require_once("cabecalho.php"); 

?>

	<h1>Formulário de cadastro categorias</h1>
	<form action = "adiciona-categoria.php" method="post">
		<table class="table">
			<tr>
				<td>Nome</td>
				<td><input type="text" name="nome" class="form-control"/></td>
			</tr>
			<tr>
				<td><input type="submit" value="Cadastrar" class="btn btn-primary" /></td>
			</tr>			
		</table>
	</form>

<?php require_once("rodape.php"); ?>