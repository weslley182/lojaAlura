<?php require_once("conecta.php");
 	  require_once("logica-usuario.php"); ?>

<?php
verificarUsuario();

$id = $_POST['id'];
$oProdDao = new ProdutoDAO($conexao);
$oProdDao->removerProduto($id);

$_SESSION["success"] = "Produto removido com sucesso.";
header("location: produto-lista.php");
?>

<?php require_once("rodape.php"); ?>