<footer>
    <div class="container">
        <div class="sec link">
            <h2>Quick Links</h2>
            <ul class="footer-links">
                <li><a href="home.php#about">About&nbsp;Us</a></li>
                <li><a href="contact_us.php">Contact&nbsp;Us</a></li>
                <li><a href="#">Help</a></li>

            </ul>
        </div>
        <div class="sec categories">
            <h2>Categories</h2>
            <ul class="footer-links">
                <?php
                include "connected.php";
                $get = mysqli_query($conn, "SELECT * FROM `categories`");
                if (mysqli_num_rows($get) > 0) {
                    while ($r = mysqli_fetch_array($get)) {
                ?>
                        <li><a href="stores.php?categories_id=<?php echo $r['categories_id']; ?>"><?php echo $r['categories_name']; ?></a></li>
                <?php
                    }
                }
                ?>
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