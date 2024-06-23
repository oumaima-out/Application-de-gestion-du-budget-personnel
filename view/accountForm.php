<?php
include "../model/user.php";
session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AccountForm</title>
    <style>
        header {
            text-align: center;
            margin-bottom: 10px;

        }

        .container {
            width: 550px;
            height: 700px;
            margin: auto;
            text-align: center;
        }

        form:not(#check) {
            padding: 50px;
            margin: auto;
            border: 1px solid rgb(243, 240, 240);
            border-radius: 20px;
            text-align: center;
            background-color: rgba(225, 208, 199, 0.804);
            margin-top: 70px;
        }

        .other input {
            display: block;
            width: 100%;


        }

        input {
            box-sizing: border-box;
            position: relative;
            font-size: 17px;
        }

        .other input:not(#check) {
            margin-bottom: 10px;
            height: 50px;
        }

        .firstRow,
        .secondRow {
            display: flex;
        }

        .firstRow input,
        .secondRow input:last-child {
            margin-bottom: 10px;
            height: 50px;
            flex: 1;
            position: relative;
        }

        .secondRow input {
            margin-bottom: 10px;
            height: 50px;
            position: relative;
        }

        .firstRow input:first-child,
        .secondRow input:first-child {
            margin-right: 10px;
        }

        input::placeholder {
            font-size: 17px;
        }


        button {
            width: 100%;
            height: 50px;
            background-color: rgb(97, 69, 53);
            border-radius: 20px;
        }

        .box {
            display: flex;
            margin: auto;
        }

        #check {
            float: left;
        }

        img {
            width: 100px;
            height: 60px;
        }

        #gender option {
            font-size: 17px;
            color: black;
        }

        .secondRow select:valid {
            color: black;
        }

        .secondRow select {
            margin-bottom: 10px;
            flex-grow: 1;
            position: relative;
            font-size: 17px;
            color: rgb(110, 110, 110);
        }
    </style>
</head>

<body>

    <header>
        <img src="p_logo.png" alt="logo">
        <p style="color: rgb(6, 6, 6); font-weight: bold; font-size: 40px;margin-top:50px;">Welcome
            <span style="color:rgb(173, 113, 73);"> <?php
                                                    if (isset($_SESSION['utilisateur'])) {
                                                        $utilisateur = $_SESSION['utilisateur'];
                                                        echo $utilisateur->getName() . "!";
                                                    }
                                                    ?></span>
        </p>
    </header>
    <div class="container">
        <form action="../controller/accountController.php?action=accountF" method="post">
            <h2 style="color: rgb(6, 6, 6); font-weight: bold; font-size: 30px;margin-top:-10px;color:rgb(97, 69, 53)">Account Information</h2>
            <label for="sync" style="color:rgb(97, 69, 53); font-size:20px; font-weight: bold;color:black">Do you want to synchronize with your bank account?</label>
            <select name="sync" id="sync" onchange="toggleSyncFields()" style="margin-bottom:20px;">
                <option value="" disabled selected> choose</option>
                <option value="no">Yes</option>
                <option value="yes">No</option>
            </select>
            <div id="syncFields" style="display: none;" class="secondRow">
                <label for="name_bank"></label>
                <div  style="width:100%; height:50px; margin-bottom:20px;">
                <select style="width:230px ; height:45px; " name="name_bank" required style="margin-top:30px; " >
                    <option value="" disabled selected>Bank Name</option>
                    <option value="baridBank">BaridBank</option>
                    <option value="cih">CIH</option>
                    <option value="bmce">BMCE</option>
                    <option value="Atijari">Atijari</option>
                </select></div>
                <input type="number" name="num_account" placeholder="Account number" style="margin-bottom:10px;">
                <input type="number" name="solde" placeholder="Bank balance" style="margin-top:10px;">
                <button type="submit" id="butty"  style=" width:300px; margin-top:20px;"><span style="color:white; font-size: 20px; font-weight: bold;">Submit</span></button>
            </div>

            

        </form>
    </div>

    <footer style="height: 40px;width:100%;">
        <p style="border: 1px solid rgb(245, 241, 241) ; background-color: rgb(245, 241, 241); height: 40px; text-align: right;">
            Copyright @EHTP/1GI-2023</p>
    </footer>
    <script>
        function toggleSyncFields() {
            var syncValue = document.getElementById("sync").value;
            var syncFields = document.getElementById("syncFields");

            if (syncValue === "yes") {
                syncFields.style.display = "block";
                syncAccount.style.display = "none";
                
            } else {
                syncFields.style.display = "none";
                syncAccount.style.display = "block";
            }
        }

        function dashboard() {
            window.location.href = "dashboard.php";
        }
    </script>


</body>

</html>