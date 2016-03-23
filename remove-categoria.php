<?php require_once("banco-categoria.php"); ?>

<?php

$id = $_POST['id'];
removerCategoria($conexao, $id);

header("location: categoria-lista.php?bRemovido=true");
?>