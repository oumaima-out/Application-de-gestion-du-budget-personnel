<?php
include "../model/user.php";
include "../model/account.php";
session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet">
    <title>Dashboard</title>
    <style>
        header {
            height: 70px;
            position: relative;
        }

        header input {
            height: 40px;
            width: 75%;
            float: right;
            padding: 25px;
            margin-right: 20px;
            border: 2px solid rgb(209, 206, 206);
            border-radius: 10px;
            background-image: url("loupe.png"), url("profile.png");
            background-position: left 10px top 10px, right 10px center;
            background-repeat: no-repeat;
            background-size: 25px 25px, 50px 50px;
        }

        header input::placeholder {
            padding-left: 30px;
            font-size: 20px;
        }

        aside {
            position: fixed;
            top: 0;
            left: 0;
            width: 20%;
            height: 100%;
            background-color: white;
            z-index: 1;
        }

        .logo img {
            width: 100px;
            height: 100px;
            margin-bottom: 20px;
            ;
        }

        ul {
            width: 100%;
            padding-left: 20px;
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: flex-start;
        }

        ul li {
            width: 80%;
            list-style: none;
            height: 50px;
            margin-bottom: 5px;
            padding-left: 10px;
        }

        ul li a {
            text-decoration: none;
            color: black;
            font-size: 20px;
        }

        ul li:hover {
            background-color: rgb(173, 113, 73);
            border-radius: 10px;
        }

        ul li img {
            width: 25px;
            height: 25px;
            margin-right: 20px;
            position: relative;
            top: 5px;
        }

        aside div,
        ul {
            display: block;
        }

        .welcome {
            width: 55%;
            height: 90px;
            margin-right: 24px;
            padding-top: 20px;

        }

        .welcome p {
            font-size: 40px;
            font-weight: bold;
            padding-left: 20px;
            margin-bottom: 60px;
            margin-top: 0;
        }

        section {
            width: 75%;
            height: 500px;
            border: 1px black;
            border-radius: 10px;
            float: right;
            margin-right: 20px;
        }

        section div {
            float: left;
            background-color: white;
            border-radius: 10px;
            text-align: center;

        }

        .bank {
            width: calc(45% - 28px);
            height: 200px;
            text-align: center;
        }

        .bank img {}



        footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 40px;
        }

        .balance,
        .savings {
            width: calc((45% - 28px)/2);
            height: 276px;
            margin-top: 10px;

        }

        .savings {
            margin-left: 13px;
        }

        .balance {
            margin-left: -15px;
        }

        .week {
            width: 55%;
            height: 203px;
            margin-top: -205px;


        }

        .bill {
            width: 55%;
            height: 150px;
            margin-top: -80px;
            margin-right: 24px;

        }


        .bill-class img {
            width: 50px;
            height: 60px;
            margin-left: 10px;
            margin-top: 10px;
        }

        .bill-class img,
        .bill-class p {
            display: inline-block;
        }

        .bill-class p {
            position: relative;
            top: -20px;
            margin-left: 20px;
            font-size: 30px;
            font-weight: bold;

        }

        .bill-class {
            height: 70px;
            border: none;
            margin-top: -10px;
            margin-left: 80px;
        }

        .savings .balance {
            display: inline-block;
        }

        .savings img {
            width: 90px;
            height: 90px;
        }

        .balance img {
            width: 120px;
            height: 120px;
            margin-top: -20px;
        }

        .up div {
            border: none;
        }

        .c1 {
            margin-left: 50px;
            margin-top: -10px;
        }

        .c2 {
            display: flex;
            align-items: center;
            margin-top: -40px;
        }

        .colored {
            background-color: rgb(173, 113, 73);
            border: 1px;
            border-radius: 10px;
        }
    </style>
</head>

<body style="background-color: rgb(228, 224, 224);">
    <header>
        <input type="search" placeholder="Search...">
    </header>

    <aside>
        <div class="logo" style="text-align: center; margin-top:10px;">
            <img src="logo.png" alt="logo" style="width:150px; height:150px;">
        </div>
        <ul>
            <li>
                <img src="dash.png" alt="dash">
                <a href="dashboard.php" onclick="colorizeLi(this)">Dashboard</a>
            </li>
            <li>
                <img src="acc.png" alt="account">
                <a href="">Account</a>
            </li>
            <li>
                <img src="card.png" alt="card">
                <a href="">Cards</a>
            </li>
            <li>
                <img src="spend.png" alt="spend">
                <a onclick="redirectToPage('spendingDash.php');colorizeLi(this)">Spendings</a>
            </li>
            <li>
                <img src="rev.png" alt="rev">
                <a href="revenue.html">Revenues</a>
            </li>
            <li>
                <img src="bill.png" alt="bill">
                <a href="">Bills</a>
            </li>
            <li>
                <img src="save.png" alt="sav">
                <a href="">Savings</a>
            </li>
            <li>
                <img src="report.png" alt="rep">
                <a href="">Reports</a>
            </li>
            <li>
                <img src="logout.png" alt="log">
                <a onclick="redirectToPage('login.html')">Log out</a>
            </li>
        </ul>
    </aside>
    <section style="display: block;" id="master">
        <div class="welcome">
            <p>Welcome <span style="color:rgb(173, 113, 73);"> <?php
                                                                if (isset($_SESSION['utilisateur'])) {
                                                                    $utilisateur = $_SESSION['utilisateur'];
                                                                    echo $utilisateur->getName() . "!";
                                                                }
                                                                ?></span></p>

        </div>
        <div class="bank">
        <?php
            $bank=$_SESSION['account']->getBank();
            $code = '<img src="' . $bank . '.png" alt="bank" style="width:120px; height:120px; float:left; margin-top:50px; margin-left:50px;" >';
            eval('?>' . $code . '<?php ');
            ?>
            <p style=" font-weight:bold;font-size:40px;text-align:center;margin-top:35px; float: right; margin-right:50px">Bank Account</p>
            
            <h1 style="color: rgba(81, 35, 12, 0.804); font-size:25px;">
            <?php
                                                        if (isset($_SESSION['account'])) {
                                                            $account = $_SESSION['account'];
                                                            echo 'Account Number : ' . $account->getNum();
                                                        }
                                                        ?></h1>
        </div>
        <div class="bill">
            <P style="font-weight:bold;font-size:30px;margin-top:5px;">For the upcoming week:</P>
            <div class="bill-class">
                <img src="bills.png" alt="bills">
                <p style="float :left; color: rgba(81, 35, 12, 0.804);">Total bills:</p>
                <div style="float :right;width:80px; height:40px; ;background-color: red; border:1px ; border-radius:10px; margin-left:10px;font-size:30px;padding:10px;color:white;"></div>
            </div>
        </div>
        <div class="balance" >
            <p style="font-weight:bold;font-size:30px;margin-top:30px;">Balance</p>
            <p style="background-color: #B7855F; border:1px ; border-radius:10px; margin-left:10px; margin-right:10px;font-size:30px;padding:10px;color:white;">
            <?php
                                                        if (isset($_SESSION['account'])) {
                                                            $account = $_SESSION['account'];
                                                            echo $account->getSolde();
                                                        }
                                                        ?>
        </p>            <img src="dollar.png" alt="money">
        </div>
        <div class="savings">
            <p style="font-weight:bold;font-size:30px;margin-top:30px;">Savings</p>
            <div style="width:215px; height:35px; background-color: #62E42B; border:1px ; border-radius:10px; margin-left:10px; margin-right:10px;font-size:30px;padding:10px;color:white;"></div>
            <img src="saving.png" alt="saving">

        </div>
        <div class="week">
            <p style="font-weight:bold;font-size:30px;margin-top:5px;">In this week:</p>
            <div class="up" style="border:none; width:300px;display:flex; margin-top:-20px;">
                <div class="c1">
                    <p style="color: rgba(81, 35, 12, 0.804);font-size:25px;font-weight:bold;">Spendings:</p>
                    <div class="c2">
                        <img src="spending.png" alt="spend" style="width:70px;height:70px;">
                        <div style="margin-top:30px; width:75px; height:35px ;background-color: #80B6DF; border:1px ; border-radius:10px; margin-left:10px; margin-right:10px;font-size:30px;padding:10px;color:white;"></div>
                    </div>
                </div>
                <div class="c1">
                    <p style="color: rgba(81, 35, 12, 0.804);font-size:25px;font-weight:bold;">Incomes:</p>
                    <div class="c2">
                        <img src="revenue.png" alt="spend" style="width:70px;height:70px;">
                        <div style="margin-top:30px; width:75px; height:35px ;background-color: #E8B0DF; border:1px ; border-radius:10px; margin-left:10px; margin-right:10px;font-size:30px;padding:10px;color:white;"></div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <footer style="position: fixed; bottom: 0;">
        <p style="border: 1px solid rgb(245, 241, 241) ; background-color: rgb(245, 241, 241); height: 40px; text-align: right;margin:0;padding-right:30px;">
            Copyright @EHTP/1GI-2023</p>
    </footer>

    <script>
        function colorizeLi(link) {
            var li = link.parentNode; // Obtenez l'élément <li> parent du lien cliqué
            li.classList.toggle("colored"); // Ajoute ou supprime la classe CSS "colored" du <li>
            console.log("Li clicked:", li); // Vérifiez si la fonction est appelée et si l'élément li est correct
        }

        function redirectToPage(page) {
        window.location.href = page;
    }

    </script>
    <style>
        #idH {
            width: 450px;
            height: 70px;
            margin-top: -10px;
            margin-left: 200px;
            font-family: 'Oswald', sans-serif;
            color: black;
            font-size: 50px;
            margin-bottom: 20px;
            text-align: center;
            float: left;
        }

        #a {
            font-size: 20px;
            font-family: 'Oswald', sans-serif;
            color: black;
            border-color: white;
            background-color: rgb(232, 213, 191);
            margin-top: 20px;
            width: 180px;
            height: 50px;
            margin-left: 90px;
            border-radius: 10px;
            float: left;
        }

        #contenue {
            width: 100%;
            height: 400px;
            background-color: rgb(241, 208, 158);
            margin: auto;
            margin-top: 40px;
        }

        #z {
            width: 75%;
            margin-right: 20px;
            margin-left: 70px;
            background-color: rgb(228, 224, 224);
        }
    </style>

</body>

</html>