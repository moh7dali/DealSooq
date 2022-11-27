<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head runat="server">
    <title>Index</title>
    <link rel="icon" href="../photo/Deal1.png">
    <script src="https://use.fontawesome.com/ea9434bfcd.js"></script>
    <script src="https://kit.fontawesome.com/04b6044f71.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/dashboard.css">
</head>

<body>
    <?php
    if (!isset($_SESSION["users"])) {
    ?>
        <script>
            location.href = "login.php";
        </script>
    <?php
    }
    ?>
 <?php include "menu.php"; ?>
<div class="dashmain">
<div class="topbar">
      <div class="dashtoggle" onclick="toggleMenu();"></div>
</div>
    <div class="cardbox">
        <div class="card">
            <div>
                <div class="numbers">1</div>
                <div class="cardname">Daily Views</div>
            </div>
            <div class="iconbox">
                <i class="fa fa-eye" aria-hidden="true"></i>
            </div>
        </div>

        <div class="card">
            <div>
                <div class="numbers">2</div>
                <div class="cardname">Sales</div>
            </div>
            <div class="iconbox">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            </div>
        </div>

        <div class="card">
            <div>
                <div class="numbers">3</div>
                <div class="cardname">Comments</div>
            </div>
            <div class="iconbox">
                <i class="fa fa-comment" aria-hidden="true"></i>
            </div>
        </div>
    </div>


    <div class="details">
        <div class="recentorder">
            <div class="cardheader">
                <h2>Recent Orders</h2>
                <a href="#" class="btn">&nbsp; View All &nbsp;</a>
            </div>
            <table>
                <thead>
                    <tr>
                        <td>Name</td>
                        <td>price</td>
                        <td>payment</td>
                        <td>Status</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>one</td>
                        <td>$500</td>
                        <td>paid</td>
                        <td><span class="status delivered">Delivered</span></td>
                    </tr>
                    <tr>
                        <td>two</td>
                        <td>$500</td>
                        <td>paid</td>
                        <td><span class="status inprogress">Inprogress</span></td>
                    </tr>
                    <tr>
                        <td>three</td>
                        <td>$500</td>
                        <td>paid</td>
                        <td><span class="status pending">pending</span></td>
                    </tr>
                    <tr>
                        <td>four</td>
                        <td>$500</td>
                        <td>paid</td>
                        <td><span class="status Rutern">Rutern</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    function toggleMenu() {
        let toggle = document.querySelector('.dashtoggle');
        let navigation = document.querySelector('.dashnavigation');
        let main = document.querySelector('.dashmain');
        toggle.classList.toggle('dashactive');
        navigation.classList.toggle('dashactive');
        main.classList.toggle('dashactive');
    }
</script>
</body>

</html>