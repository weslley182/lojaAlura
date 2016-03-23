<?php

require_once("conecta.php");
require_once("config/autoload.php");

class ProdutoDAO{

    private $conexao;

    public function __construct($poConexao){
        $this->conexao = $poConexao;
    }

    function inserirProduto($poProd)
    {
        if ($poProd->temIsbn()) {
            $sIbn = $poProd->getIsbn();
        } else {
            $sIsbn = "";
        }

        $sNome = mysqli_real_escape_string($this->conexao, $poProd->getNome());
        $sDescricao = mysqli_real_escape_string($this->conexao, $poProd->getDescricao());
        $sSql = "insert into produtos(nome, preco, descricao, categoria_id, usado, isbn) " .
            "values('{$sNome}', {$poProd->getPreco()}, '{$sDescricao}', {$poProd->getCategoria()->getId()}, ".
            "{$poProd->getUsado()}, '{$sIsbn}' )";

        return mysqli_query($this->conexao, $sSql);
    }

    function  listarProdutos()
    {
        $produtos = array();
        $sSql = " Select pro.*, cat.nome as catNome, cat.id as catId from produtos pro " .
            " left join categorias cat " .
            " on cat.id = pro.categoria_id";
        $resultado = mysqli_query($this->conexao, $sSql);

        while ($produto = mysqli_fetch_assoc($resultado)) {

            $oCat = new Categoria();
            $oCat->setId($produto['catId']);
            $oCat->setNome($produto['catNome']);

            if (trim($produto['isbn'])!=="") {
                $oProd = new Livro();
                $oProd->setIsbn($produto['isbn']);
            } else {
                $oProd = new Produto();
            }

            $oProd->setId($produto['id']);
            $oProd->setNome($produto['nome']);
            $oProd->setDescricao($produto['descricao']);
            $oProd->setPreco($produto['preco']);
            $oProd->setUsado($produto['usado']);
            $oProd->setCategoria($oCat);

            array_push($produtos, $oProd);
        }

        return $produtos;
    }

    function removerProduto($id)
    {
        $sSql = "delete from produtos where id = {$id}";
        return mysqli_query($this->conexao, $sSql);
    }

    function buscarProduto($pnId)
    {
        $sSql = "select * from produtos where id = {$pnId}";
        $result = mysqli_query($this->conexao, $sSql);
        $resultado = mysqli_fetch_assoc($result);

        $oCat = new Categoria();
        $oCat->setId($resultado['categoria_id']);

        $oProd = new Produto();
        $oProd->setId($resultado['id']);
        $oProd->setNome($resultado['nome']);
        $oProd->setPreco($resultado['preco']);
        $oProd->setDescricao($resultado['descricao']);
        $oProd->setUsado($resultado['usado']);
        $oProd->setCategoria($oCat);

        return ($oProd);
    }

    function alterarProduto($poProd)
    {
        $sNome = mysqli_real_escape_string($this->conexao, $poProd->getNome());
        $sDescricao = mysqli_real_escape_string($this->conexao, $poProd->getDescricao());

        $sSql = "Update produtos set nome = '{$sNome}', preco = {$poProd->getPreco()}, descricao = '{$sDescricao}', " .
            " categoria_id = {$poProd->getCategoria()->getId()}, usado = {$poProd->getUsado() }" .
            " Where id = {$poProd->getId()} ";

        return mysqli_query($this->conexao, $sSql);
    }
}