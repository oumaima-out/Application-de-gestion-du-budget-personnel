<?php
include "../model/user.php";

class DaoUser
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
    public function save(User $utilisateur)
    {
        $stm = $this->dbh->prepare("INSERT INTO user VALUES (?, ?, ?, ?, ?, ?)");

        $stm->bindValue(1, $utilisateur->getEmail());
        $stm->bindValue(2, $utilisateur->getPassword());
        $stm->bindValue(3, $utilisateur->getName());
        $stm->bindValue(4, $utilisateur->getSurname());
        $stm->bindValue(5, $utilisateur->getTelephone());
        $stm->bindValue(6, $utilisateur->getGender());

        $stm->execute();
    }

    public function findUtilisateur($email, $password)
    {
        $utilisateur = null;
        $stm = $this->dbh->prepare("SELECT * FROM user where email=? AND password=?");
        $stm->bindValue(1, $email);
        $stm->bindValue(2, $password);

        $stm->execute();

        $result = $stm->fetch(PDO::FETCH_ASSOC);
        if (!empty($result)) {
            $utilisateur = new User($result['name'],$result['surname'],$result['telephone'],'', $result['gender'], $result['email'], $result['password']);
        }
        return $utilisateur;
    }

}

?>

