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
                                        echo $_SESSION['users'];
                                        ?></span>
                </a>
            </li>

            <li>
                <a href="stores.php">
                    <span class="icon"><i class="fa fa-building-o" aria-hidden="true"></i></span>
                    <span class="title">Stores</span>
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