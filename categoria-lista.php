<?php require_once("cabecalho.php");
 	  require_once("conecta.php");
 	  require_once("logica-usuario.php");
?>

<?php

verificarUsuario();
$oCatDao = new CategoriaDAO($conexao);
$oCategorias = $oCatDao->listarCategorias($conexao);
?>
<form action="categoria-formulario.php" method="post">
	<button  class="btn btn-primary">Adiciona Categoria</button>
</form>
<table class="table table-striped table-bordered">

<?php
foreach($oCategorias as $sCategoria):
?>
	<tr>
		<td><?= $sCategoria->getNome(); ?></td>
		<td>
			<form action="remove-categoria.php" method="post">
				<input type="hidden" name="id" value="<?= $sCategoria->getId(); ?>" />
				<button class="btn btn-danger">Remover</button>				
			</form>
		</td>
	</tr>
<?php	
endforeach

?>
</table>


<?php require_once("rodape.php"); ?>