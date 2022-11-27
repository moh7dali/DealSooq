<div class="dashcontainer">
    <div class="dashnavigation">
        <ul>
            <li>
                <a href="index.php">
                    <span class="icon"><img src="../photo/Deal.svg"></span>
                    <span class="title">
                        <h2>DealSooq</h2>
                    </span>
                </a>
            </li>
            <li>
                <a href="index.php">
                    <span class="icon"><i class="fa fa-user-o" aria-hidden="true"></i></span>
                    <span class="title"><?php
                                        echo $_SESSION['users1'];
                                        ?></span>
                </a>
            </li>

            <?php
            include "../connected.php";
            $get = mysqli_query($conn, "SELECT * FROM `categories`");
            if (mysqli_num_rows($get) > 0) {
                while ($r = mysqli_fetch_array($get)) {
            ?>
                    <li>
                        <a href="stores.php?categories_id=<?php echo $r['categories_id']; ?>">
                            <?php
                            if ($r['categories_id'] == 1) { ?>
                                <span class="icon"><i class="fa fa-cutlery" aria-hidden="true"></i></span>
                            <?php } else
                         if ($r['categories_id'] == 2) { ?>
                                <span class="icon"><i class="fa fa-gamepad" aria-hidden="true"></i></span><?php } else 
                         if ($r['categories_id'] == 3) { ?>
                                <span class="icon"><i class="fas fa-tshirt"></i></span><?php }
                                                                                        ?>
                            <span class="title"><?php echo $r['categories_name']; ?></span>
                        </a>
                    </li>
            <?php
                }
            }
            ?>
            <li>
                <a href="Messages.php">
                    <span class="icon"><i class="fa fa-comment" aria-hidden="true"></i></span>
                    <span class="title">Messages</span>
                </a>
            </li>
            <li>
                <a href="users.php">
                    <span class="icon"><i class="fa fa-users" aria-hidden="true"></i></span>
                    <span class="title">Users</span>
                </a>
            </li>
            <li>
                <a href="logout.php">
                    <span class="icon"><i class="fa fa-sign-out" aria-hidden="true"></i> </span>
                    <span class="title">Sign Out</span>
                </a>
            </li>
        </ul>
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