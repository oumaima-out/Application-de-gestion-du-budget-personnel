<?php
include "../dao/daoSpending.php";
session_start();

$action = $_GET['action'];
$dao = new DaoSpending();

switch ($action) {
    case 'addDepense':
        $categorie = $_SESSION['category'];
        $mySolde = $categorie->getAmount();
        $amount = $_POST['spending_amount']; 
        
        if ($mySolde-$amount<0) header('Location: ../view/chooseSpending.php');
        
       else{
        $date = $_POST['spending_date'];  
        if (isset($_SESSION['account'])) {
            $account = $_SESSION['account'];
            $number_Bank = $account->getNum();
        }

        $cat = $_POST['spending_cat'];

        if (isset($date, $amount, $number_Bank, $cat)) {
            $spending = new spend ($date, $amount, $number_Bank, $cat);
            $dao->save($spending);
            header('Location: ../view/spendingDash.php');
        }
        else{header('Location: ../view/chooseSpending.php');}}
        break;     
} 
?>
