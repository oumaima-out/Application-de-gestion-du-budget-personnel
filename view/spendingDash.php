<?php
// Connexion à la base de données et inclusion des fichiers nécessaires
include "../config.php";
include "../dao/daoSpending.php";

$daoSpend = new DaoSpending($pdo);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $orderBy = isset($_POST['orderBy']) ? $_POST['orderBy'] : null;
    $cat = isset($_POST['cat']) ? $_POST['cat'] : null;
    $spendings = $daoSpend->getAll($orderBy,$cat);
} else {
    $spendings = $daoSpend->getAll();
}
$categories = $daoSpend->getAllCategories();



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.7.0/dist/css/bootstrap.min.css">
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
            border-radius: 10px;
            text-align: center;

        }

        footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 40px;
        }

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
            margin-left: 50px;
            border-radius: 10px;
            float: left;
        }

        #contenue {
            width: 100%;
            height: 400px;
            margin: auto;
            margin-top: 40px;
            background-color:rgb(228, 224, 224); ;
        }

        #z {
            width: 75%;
            margin-right: 20px;
            margin-left: 70px;
            background-color: rgb(228, 224, 224);
        }

        #spent {
            border-collapse: collapse;
            width: 100%;
        }

        #spent td,
        #spent th {
            border: 1px solid #ddd;
            padding: 8px;
        }
        #spent th{
            font-size:20px;
            background-color: rgb(97, 69, 53);
            color:white
        }
        #spent td{
            background-color: white;
        }

        #spent tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #spent tr:hover {
            background-color: #ddd;
        }

        #spent {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: rgb(228, 224, 224);;
            color: black;
        }
        #backButton{
            font-size: 20px;
            font-family: 'Oswald', sans-serif;
            color: black;
            border-color: white;
            background-color: rgb(232, 213, 191);
            margin-top: 20px;
            width: 80px;
            height: 50px;
            border-radius: 10px;
            margin-left:30px;
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
                <a onclick="login()">Log out</a>
            </li>
        </ul>
    </aside>
    <section style="display: block;" id="master">
        <h1 id="idH" style="text-lign:center; margin-left:320px;">Your Spendings:</h1>
        <div  style="float: right; background-color:#B7855F" >
    <div style="display: flex; align-items: center;">
        <p style="font-weight: bold; font-size: 30px; margin-top: 30px; margin-left:20px;">Balance</p>
        <img src="dollar.png" alt="money" style="width: 50px; height: 50px; margin-left: 10px;">
    </div>
    <p style="background-color: #B7855F; border: 1px solid; border-radius: 10px; margin: 10px; margin-top:100px; font-size: 30px; padding: 10px; color: white;">
    <?php
        if (isset($_SESSION['account'])) {
            $account = $_SESSION['account'];
            $newsolde=$account->getSolde();
            $a=new DaoSpending();
            $transactions=$a->getAll();
            foreach ($transactions as $row) {
                $newsolde=$newsolde-$row->getAmount();
            }}
        echo $newsolde;
        ?>
    </p>
</div>
        <div id="z" style="display:flex;">
            <button id="a" onclick="redirectToPage()">Add a spending</button>
            <form method="post" id="myForm" >
            <select id="a" name="cat" onchange="submitForm()" style="text-align:center;">
                <option value="" disabled selected>Select Category</option>
                <?php foreach ($categories as $category) : ?>
                    <option value="<?php echo $category->getNameCateg(); ?>"><?php echo $category->getNameCateg(); ?></option>
                <?php endforeach; ?>
            </select>
            <select id="a" name="orderBy" onchange="submitForm()" >
                <option value="" disabled selected>Order By</option>
                <option value="date" >Date</option>
                <option value="amount">Amount</option>
            </select>
            <div>
                <button id="backButton" name="back" type="button" onclick="dashboard()" >Back</button>
            </div>
                </form>
        </div>
        <div id="contenue">
            <table id="spent">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>BankNumber</th>
                        <th>Category</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $category = ""; // Déclaration de la variable $category
                    foreach ($spendings as $spending) :
                        $category = $spending->getCat()->getNameCateg(); ?>
                        <tr>
                            <td><?php echo $spending->getDate(); ?></td>
                            <td><?php echo $spending->getAmount(); ?></td>
                            <td><?php echo $spending->getNumber(); ?></td>
                            <td><?php echo $category; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </section>
    <footer style="position: fixed; bottom: 0;">
        <p style="border: 1px solid rgb(245, 241, 241) ; background-color: rgb(245, 241, 241); height: 40px; text-align: right;margin:0;padding-right:30px;">
            Copyright @EHTP/1GI-2023</p>
    </footer>

    </section>

    <script>
        function redirectToPage() {

            window.location.href = "chooseSpending.php";
        }
        function submitForm() {
        document.getElementById("myForm").submit();
    }
    function login() {
        window.location.href ='login.html';
    }
    function dashboard() {
        window.location.href ='dashboard.php';
    }
    </script>




</body>

</html>