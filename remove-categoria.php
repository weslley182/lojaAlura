<?php require_once("conecta.php"); ?>

<?php

$id = $_POST['id'];

$oCatDao = new CategoriaDAO($conexao);

$oCatDao->removerCategoria($id);

header("location: categoria-lista.php?bRemovido=true");
?>