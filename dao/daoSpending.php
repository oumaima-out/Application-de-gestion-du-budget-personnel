<?php
include "../model/spending.php";
include "../model/account.php";
include "../model/category.php";
session_start();

class DaoSpending
{
    private $dbh;

    public function __construct()
    {
        try {
            $this->dbh = new PDO('mysql:host=localhost;dbname=budget', "root", "");
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function save(spend $spending)
    {
        // Récupérer le number_BankAccount de la table BankAccount
        $bankAccountNumber = $this->getBankAccountNumber();

        // Vérifier si le number_BankAccount existe avant l'insertion
        if ($bankAccountNumber !== null) {
            $stm = $this->dbh->prepare("INSERT INTO transactionspending (dateTransaction, amount, number_BankAccount, id_CategorySpending) VALUES (?, ?, ?, ?)");

            $stm->bindValue(1, $spending->getDate());
            $stm->bindValue(2, $spending->getAmount());
            $stm->bindValue(3, $bankAccountNumber); // Utiliser le number_BankAccount récupéré
            $stm->bindValue(4, $this->getIdCat($spending)); // Utiliser la méthode getIdCat() avec l'objet spending

            $stm->execute();
        } else echo 'non';
    }

    private function getBankAccountNumber()
    {
        if (isset($_SESSION['account'])) {
            $account = $_SESSION['account'];
            return $account->getNum(); // Retourner la valeur du numéro de compte
        }
        return null;
    }

    private function getIdCat(spend $spending)
    {
        $category_name = $spending->getCat(); // Obtenez l'objet Category à partir de l'objet spend
        $stm = $this->dbh->prepare("SELECT id FROM categoryspending WHERE label = ?");
        $stm->bindValue(1, $category_name); // Utiliser getNameCateg() sur l'objet Category
        $stm->execute();
        $result = $stm->fetch(PDO::FETCH_ASSOC);

        if ($result !== false && isset($result['id'])) {
            return $result['id'];
        }

        return null;
    }

    public function getAll($orderBy = null, $cat = null)
    {
        $query = "SELECT dateTransaction, amount, number_BankAccount, label 
                  FROM transactionspending AS t 
                  LEFT JOIN categoryspending AS c ON c.id = t.id_CategorySpending";

        if ($orderBy === 'date') {
            $query .= " ORDER BY dateTransaction DESC";
        } elseif ($orderBy === 'amount') {
            $query .= " ORDER BY amount DESC";
        }

        // Ajoutez une clause WHERE seulement si $cat n'est pas null
        if ($cat !== null) {
            $query .= " WHERE label = ?";
        }

        $stm = $this->dbh->prepare($query);
        // Liez le paramètre $cat à la requête si $cat n'est pas null
        if ($cat !== null) {
            $stm->bindValue(1, $cat);
        }

        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);

        $spendings = [];
        foreach ($result as $row) {
            $category = new rania($row['label'], ""); // Créez un objet Category avec le nom de catégorie
            $spending = new spend($row['dateTransaction'], $row['amount'], $row['number_BankAccount'], $category);
            $spendings[] = $spending;
        }

        return $spendings;
    }


    public function getAllCategories()
    {
        $stm = $this->dbh->prepare("SELECT * FROM categoryspending");
        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);

        $categories = [];
        foreach ($result as $row) {
            $category = new rania($row['label'], $row['amounMax']);
            $categories[] = $category;
        }

        return $categories;
    }
}
