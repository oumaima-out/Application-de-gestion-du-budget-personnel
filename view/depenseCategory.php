<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet"
        href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet">
    <link href="page-revenu.css" rel="stylesheet">
    <title>Add spending</title>
    <style>
        .form-group {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        label {
            color: #663300;
            flex-basis: 120px;
            /* Ajustez la largeur selon vos besoins */
            text-align: right;
            margin-right: 10px;
            /* Ajustez la marge selon vos besoins */
        }


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
            <img src="Logo.png" alt="logo" style="width:150px; height:150px; margin-top:10px;">
        </div>
        <ul>
            <li>
                <img src="dash.png" alt="dash">
                <a href="dashboard.php" onclick="colorizeLi(this)">Dashboard</a>
            </li>
            <li>
                <img src="acc.png" alt="account">
                <a href="account.php">Account</a>
            </li>
            <li>
                <img src="card.png" alt="card">
                <a href="">Cards</a>
            </li>
            <li>
                <img src="spend.png" alt="spend">
                <a onclick="colorizeLi(this)">Spendings</a>
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
                <a href="">Log out</a>
            </li>
        </ul>
    </aside>

    <div id="categSills" class="container text-center">
    </form>
        <form action="../controller/categoryController.php" method="post" id="formId" class="text-center">
            <h2 class="custom-h2 bg-warning">Add category</h2>
            <div class="form-group" style="margin-top:30px;">
                <label for="nom" >Name</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
            </div>

            <div class="form-group">
                <label for="montant">Amount:</label>
                <input type="number" id="montant" name="montant" class="form-control" required>
            </div>

            <div class="btn-group">
            <input class="form-control" type="submit" name="submit" value="add">
            </div>
        </form>

    </div>
    <script>
    function redirectToPage(page) {
        window.location.href = page;
    }
</script>
    <script type="text/javascript" src="https://code.jquery.com/jquery.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

</body>

</html>