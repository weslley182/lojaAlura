<?php

/**
 * Class Produto
 */
class Produto{
	/**
	 * @var
     */
	private $id;
	/**
	 * @var
     */
	private $nome;
	/**
	 * @var
     */
	private $preco;
	/**
	 * @var
     */
	private $descricao;
	/**
	 * @var
	 */
	private $categoria;
	/**
	 * @var
	 */
	private $usado;
	/**
	 * @return mixed
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @param mixed $id
	 */
	public function setId($id)
	{
		$this->id = $id;
	}

	/**
	 * @return mixed
	 */
	public function getNome()
	{
		return $this->nome;
	}

	/**
	 * @param mixed $nome
	 */
	public function setNome($nome)
	{
		$this->nome = $nome;
	}

	/**
	 * @return mixed
	 */
	public function getPreco()
	{
		return $this->preco;
	}

	/**
	 * @param mixed $preco
	 */
	public function setPreco($preco)
	{
		$this->preco = $preco;
	}

	/**
	 * @return mixed
	 */
	public function getDescricao()
	{
		return $this->descricao;
	}

	/**
	 * @param mixed $descricao
	 */
	public function setDescricao($descricao)
	{
		$this->descricao = $descricao;
	}

	/**
	 * @return mixed
	 */
	public function getCategoria()
	{
		return $this->categoria;
	}

	/**
	 * @param mixed $categoria
	 */
	public function setCategoria($categoria)
	{
		$this->categoria = $categoria;
	}

	/**
	 * @return mixed
	 */
	public function getUsado()
	{
		return $this->usado;
	}

	/**
	 * @param mixed $usado
	 */
	public function setUsado($usado)
	{
		$this->usado = $usado;
	}

	/**
	 * @param string $psNome
	 * @param int $pnPreco
     */
	public function __construct($psNome = 'Sem Nome', $pnPreco = 0){
		$this->setNome($psNome);
		$this->getPreco($pnPreco);
	}

	/**
	 * @return string
     */
	public function __toString(){
		return "Nome: ".$this->getNome().", Preço: ".$this.getPreco();
	}

	/**
	 *
     */
	public function __destruct(){
		echo " Destruindo o produto ".$this->getNome();

	}

	/**
	 * @param float $pnDesc
	 * @return mixed
     */
	public function valorComDesconto($pnDesc = 0.1){
		if ($pnDesc > 0 && $pnDesc <= 1) {
			$this->preco -= $this->preco * $pnDesc;
		}

		return $this->getPreco();

	}

}

