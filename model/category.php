<?php
class rania
{
    private $nameCateg, $amount;

    public function __construct($nameCateg, $amount)
    {
        $this->nameCateg = $nameCateg;
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getNameCateg()
    {
        return $this->nameCateg;
    }
    /**
     * @param mixed $nameCateg
     */
    public function setNameCateg($nameCateg)
    {
        $this->nameCateg = $nameCateg;
    }

     /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }
    /**
     * @param mixed $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }
}