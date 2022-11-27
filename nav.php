<section>
     <header>
         <a href="home.php"><img src="photo/Deal.svg" class="logo"></a>
         <ul>
             <div id="marker"></div>
             <li><a href="home.php">Home</a></li>
             <li><a href="home.php#menu">Menu</a></li>
             <li><a href="home.php#about">About</a></li>
             <li><a href="contact_us.php">Contact US</a></li>
             <li><a href="test.php?user_name=<?php echo $_SESSION['users']; ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
             <li><a>
                     <div class="dropdown">
                         <i class="fa fa-user-o" aria-hidden="true"></i>
                         <span><?php
                                echo $_SESSION['users'];
                                ?></span>
                         <i class="fa fa-caret-down"></i>
                         <div class="dropdown-content">
                             <a href="user dashboard/stores.php">Become a seller</a>
                             <a href="logout.php">Log out</a>
                         </div>
                     </div>
                 </a>
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