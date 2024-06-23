
<?php
include "../dao/daoAccount.php";
include "../model/user.php";
session_start();

$action = $_GET['action'];
$dao = new DaoAccount();

switch ($action) {
    case 'accountF':
        $numAccount = $_POST['num_account'];
        $bankName = $_POST['name_bank'];
        $solde = $_POST['solde'];

        if (isset($_SESSION['utilisateur'])) {
            $utilisateur = $_SESSION['utilisateur'];
            $email = $utilisateur->getEmail();
        }

        if (isset($numAccount, $bankName, $solde, $email)) {
            $account = new Account($numAccount, $bankName, $solde,$email);
            $dao->save($account);
            $_SESSION['account']=$account;
            header('location: ../view/dashboard.php');
        } else {
            header('location: ../view/accountForm.php');
        }
        break;
}
?>
