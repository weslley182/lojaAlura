<?php

/**
 * Class Produto
 */
class Produto{
	/**
	 * @var
     */
	public $id;
	/**
	 * @var
     */
	public $nome;
	/**
	 * @var
     */
	public $preco;
	/**
	 * @var
     */
	public $descricao;
	/**
	 * @var
     */
	public $categoria;
	/**
	 * @var
     */
	public $usado;

	/**
	 * @param $pnDesc
	 * @return mixed
     */
	public function valorComDesconto($pnDesc = 0.1){
		if ($pnDesc > 0 && $pnDesc <= 1) {
			$this->preco -= $this->preco * $pnDesc;
			return $this->preco;
		}
	}

}

