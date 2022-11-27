<!DOCTYPE html>
<html>

<head>
    <title>DealSooq</title>
    <link rel="stylesheet" href="css/homestyle.css">
    <link rel="icon" href="photo/Deal1.png">
    <script src="https://kit.fontawesome.com/04b6044f71.js" crossorigin="anonymous"></script>
</head>

<body>
    <section>
        <header>
            <a href="index.php"><img src="photo/Deal.svg" class="logo"></a>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#menu">Menu</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="contact_us.php">Contact US</a></li>
                <li>
                    <button onclick="document.location='log_in.php'">Join</button>
                </li>
                <li>
                    <div onclick='myFunction()'>
                        <div id="toggle">
                            <i class="fas fa-moon" id="indicator"></i>
                        </div>
                    </div>
                </li>
            </ul>
        </header>
    </section>

    <div class="bg">
        <h2>Let's Make a Great Deal</h2>
        <div class="test">
            <img src="photo/Deal.svg">
            <a href="log_in.php" class="colorbtn">Sign UP</a>
        </div>
    </div>


    <div class="container" id="menu">
        <?php
        include "connected.php";
        $get = mysqli_query($conn, "SELECT * FROM `categories`");
        if (mysqli_num_rows($get) > 0) {
            while ($r = mysqli_fetch_array($get)) {
        ?>
                <div class="card">
                    <div class="box">
                        <div class="content">
                            <img src="<?php echo $r['categories_img']; ?>">
                            <h3><?php echo $r['categories_name']; ?></h3>
                            <p><?php echo $r['categories_desc']; ?></p>
                            <a href="log_in.php">Search now</a>
                        </div>
                    </div>
                </div>

        <?php
            }
        }
        ?>

    </div>
    <div class="about">
        <h2 id="about">DealSooq</h2>
        <p><img src="photo/deallight.gif" alt="" class="light">
            <img src="photo/dealdark.gif" alt="" class="dark"></br>
            DealSooq website or shorted by (DS), is an E-commerce website that connects handmade products' sellers to their respective purchasers easily, DealSooq is built on the concept of providing sellers the chance to offer their products and to create a convenient website with wide variety of goods to online-shopping lovers
        </p>

    </div>
    <footer>
        <div class="container">
            <div class="sec link">
                <h2>Quick Links</h2>
                <ul class="footer-links">
                    <li><a href="#about">About&nbsp;Us</a></li>
                    <li><a href="contact_us.php">Contact&nbsp;Us</a></li>
                    <li><a href="#">Help</a></li>
                </ul>
            </div>
            <div class="sec categories">
                <h2>Categories</h2>
                <ul class="footer-links">
                    <li><a href="log_in.php">food</a></li>
                    <li><a href="log_in.php">Gaming</a></li>
                    <li><a href="log_in.php">clothes</a></li>
                </ul>
            </div>
            <div class="Contact US">
                <h2>Contact Us</h2>
                <ul class="footer-links">
                    <li>
                        <a href="#"><i class="fa fa-map-marker" aria-hidden="true">:Amman_Jordan</i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-envelope" aria-hidden="true">:Dealsooq@gmail.com</i></a>
                    </li>
                    <li>

                        <a href="#"><i class="fa fa-phone" aria-hidden="true">:0798124204</i></a>
                    </li>
                </ul>
            </div>
        </div>
        <ul class="social-icons">
            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a class="instagram" href="#"><i class="fab fa-instagram"></i></a></li>
            <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
        </ul>
    </footer>
    <div class="copyright">
        <p>Copyright &copy; 2021 All Rights Reserved by <a href="#">DealSooq</a> .</p>
    </div>
    <script>
        function myFunction() {
            var element = document.body;
            element.classList.toggle("dark-mode");
            const toggle = document.getElementById('toggle')
            toggle.onclick = function() {
                toggle.classList.toggle('active')
            }
        }
    </script>

</body>

</html>