<?php

require_once("conecta.php");
require_once("config/autoload.php");

class CategoriaDAO
{
    private $conexao;

    public function __construct($poConexao){
        $this->conexao = $poConexao;
    }

    function  listarCategorias()
    {
        $oCategorias = array();
        $sSql = "select * from categorias";
        $resultado = mysqli_query($this->conexao, $sSql);

        while ($sCategoria = mysqli_fetch_assoc($resultado)) {
            $oCat = new Categoria();
            $oCat->setId($sCategoria['id']);
            $oCat->setNome($sCategoria['nome']);
            array_push($oCategorias, $oCat);
        }

        return $oCategorias;
    }

    function removerCategoria($pnId){
        $sSql = "delete from categorias where id = {$pnId}";
        var_dump($sSql);
        return mysqli_query($this->conexao, $sSql);
    }

    function inserirCategoria( $psNome)
    {
        $sNome = mysqli_real_escape_string($this->conexao, $psNome);
        $sSql = "insert into categorias(nome) values('{$sNome}')";
        return mysqli_query($this->conexao, $sSql);
    }
}