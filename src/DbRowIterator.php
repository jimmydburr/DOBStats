<?php

class DbRowIterator implements Iterator
{
    protected $pdoStatement;
    protected $key;
    protected $result;
    protected $valid;

    public function __construct(PDOStatement $PDOStatement)
    {
        $this->pdoStatement = $PDOStatement;
		$this->valid = true;
    }

    public function current()
    {
        return $this->result;
    }

    public function next()
    {
        $this->key++;
        $this->result = $this->pdoStatement->fetch(
            PDO::FETCH_OBJ,
            PDO::FETCH_ORI_ABS,
            $this->key
        );
        if (false === $this->result) {
            $this->valid = false;
            return null;
        }
    }

    public function key()
    {
        return $this->key;
    }

    public function valid()
    {
        return $this->valid;
    }

    public function rewind()
    {
        $this->key = 0;
		$this->next();
    }
}
