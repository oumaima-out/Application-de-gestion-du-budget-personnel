<?php
include "../dao/daoUser.php";

$action = $_GET['action'];
$dao = new DaoUser();

switch ($action) {
    case 'inscription':
        $name = $_POST['nom'];
        $surname = $_POST['prenom'];
        $telephone = $_POST['tel'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $password = $_POST['pass'];
        $confirmPass = $_POST['passw'];
        $check = $_POST['check'];

        if (isset($name, $surname, $telephone, $email, $gender, $password, $confirmPass, $check)) {
            if ($password == $confirmPass) {
                $utilisateur = new User($name, $surname, $telephone, $gender, $email, $password);
                $dao->save($utilisateur);
                session_start();
                $_SESSION['utilisateur']=$utilisateur;
                header('location: ../view/accountForm.php');
            } else {
                header('location: ../view/inscription.html');
            }
        }
        break;
    case 'login':
        $email = $_POST['email'];
        $password = $_POST['mdp'];
        $utilisateur = $dao->findUtilisateur($email, $password);
        if ($utilisateur != null) {
            header('location: ../view/dashboard.php');
        } else {
            echo "echec de connexion!";
        }
        break;
    case 'deconnexion':
        session_start();
        session_destroy();
        header('location: ../view/home.html');
        break;
}
