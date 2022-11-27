<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Dashboard</title>
  <link rel="icon" href="../photo/Deal1.png">
  <script src="https://use.fontawesome.com/ea9434bfcd.js"></script>
  <script src="https://kit.fontawesome.com/04b6044f71.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../css/dashboard.css">
</head>

<body>
  <?php
  if (!isset($_SESSION["users1"])) {
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
    <br>
    <div class="details">
      <div class="recentorder">
        <div class="cardheader">
          <h2>Stores</h2>
          
        </div>
        <br>
        <form method="Post">
          <table>
            <thead>
              <th>Image</th>
              <th>Store name</th>
              <th>Store Description</th>
              <th>Category</th>
              <th>Items</th>
            </thead>
            <tbody>
              <?php
              include "../connected.php";
              $c_id = $_GET['categories_id'];
              $stores = mysqli_query($conn, "SELECT `store_id`,`store_name`,`store_loc`,`store_img`,`store_desc`,`stores`.`categories_id`,`user_id`,`categories_name` FROM `stores`,`categories` 
              WHERE `stores`.`categories_id`=`categories`.`categories_id`
              and `stores`.`categories_id`=$c_id");
              if (mysqli_num_rows($stores) > 0) {
                while ($row = mysqli_fetch_array($stores)) {
              ?>
                  <td><img src="../<?php echo $row['store_img']; ?>" width="120px"></td>
                  <td><?php echo $row['store_name']; ?></td>
                  <td><?php echo $row['store_desc']; ?></td>
                  <td><?php echo $row['categories_name']; ?></td>
                  <td><a href="items.php?store_id=<?php echo $row['store_id']; ?>" class="button2">Items</a></td>
                  </tr>
              <?php
                }
              }
              ?>
            </tbody>
          </table>
        </form>
      </div>
    </div>
  </div>
</body>

</html>