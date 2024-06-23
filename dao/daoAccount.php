<?php
include "../model/account.php";

class DaoAccount
{

    private $dbh;

    /**
     * DaoUtilisateur constructeur.
     */
    public function __construct()
    {
        try {
            $this->dbh = new PDO('mysql:host=localhost;dbname=budget', "root", "");
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }
    public function save(Account $account)
    {
        $stm = $this->dbh->prepare("INSERT INTO bankaccount VALUES (?, ?, ?, ?)"); 

        $stm->bindValue(1, $account->getNum());
        $stm->bindValue(2, $account->getBank());
        $stm->bindValue(3, $account->getSolde());
        $stm->bindValue(4, $account->getEmail());

        $stm->execute();
    }
}

?>
