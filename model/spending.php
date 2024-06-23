<?php
class spend
{
    public function __construct($date, $amount,$number_Bank, $cat)
    {
        $this->date = $date;
        $this->amount = $amount;
        $this->number_Bank = $number_Bank;
        $this->cat = $cat;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
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

    public function getNumber()
    {
        return $this->number_Bank;
    }
    public function setNumber($number_Bank)
    {
        $this->number_Bank = $number_Bank;
    }
    public function getCat()
    {
        return $this->cat;
    }

    public function setCat($cat)
    {
        $this->cat= $cat;
    }
}