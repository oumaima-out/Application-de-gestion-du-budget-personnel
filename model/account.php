<?php
class Account
{
    private $numAccount, $bankName, $solde, $email;

    public function __construct($numAccount, $bankName, $solde, $email)
    {
        $this->numAccount = $numAccount;
        $this->bankName = $bankName;
        $this->solde = $solde;
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getNum()
    {
        return $this->numAccount;
    }
    /**
     * @param mixed $numAccount
     */
    public function setNum($numAccount)
    {
        $this->numAccount = $numAccount;
    }

     /**
     * @return mixed
     */
    public function getBank()
    {
        return $this->bankName;
    }
    /**
     * @param mixed $bankName
     */
    public function setBank($bankName)
    {
        $this->bankName = $bankName;
    }

    /**
     * @return mixed
     */
    public function getSolde()
    {
        return $this->solde;
    }
    /**
     * @param mixed $solde
     */
    public function setSolde($solde)
    {
        $this->solde = $solde;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }
    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    
}