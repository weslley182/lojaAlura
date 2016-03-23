<?php

/**
 * Class Livro
 */
class Livro extends Produto{

    /**
     * @var
     */
    private $isbn;

    /**
     * @return mixed
     */
    public function getIsbn()
    {
        return $this->isbn;
    }

    /**
     * @param mixed $isbn
     */
    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;
    }

}