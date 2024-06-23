<?php
include "../model/category.php";

class DaoCategory
{

    private $dbh;

    /**
     * DaoCategory constructeur.
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
    public function save(rania $category)
    {
        $stm = $this->dbh->prepare("INSERT INTO categoryspending (label, amounMax) VALUES (?, ?)");
    
        $stm->bindValue(1, $category->getNameCateg());
        $stm->bindValue(2, $category->getAmount());
    
        $stm->execute();
    }
    public function getAll()
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

?>


