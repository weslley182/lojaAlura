<?php require_once("cabecalho.php");
 	  require_once("banco-categoria.php"); 
 	  require_once("logica-usuario.php");
	  require_once("class/Categoria.php");
?>

<?php

verificarUsuario();

$oCategorias = listarCategorias($conexao);
?>
<form action="categoria-formulario.php" method="post">
	<button  class="btn btn-primary">Adiciona Categoria</button>
</form>
<table class="table table-striped table-bordered">

<?php
foreach($oCategorias as $sCategoria):
?>
	<tr>
		<td><?= $sCategoria->nome ?></td>
		<td>
			<form action="remove-categoria.php" method="post">
				<input type="hidden" name="id" value="<?= $sCategoria->id ?>" />
				<button class="btn btn-danger">Remover</button>				
			</form>
		</td>
	</tr>
<?php	
endforeach

?>
</table>


<?php require_once("rodape.php"); ?>