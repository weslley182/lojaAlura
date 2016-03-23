<?php require_once("banco-produto.php"); 
 	  require_once("logica-usuario.php"); ?>

<?php
verificarUsuario();

$id = $_POST['id'];
removerProduto($conexao, $id);
$_SESSION["success"] = "Produto removido com sucesso.";
header("location: produto-lista.php");
?>

<?php require_once("rodape.php"); ?>