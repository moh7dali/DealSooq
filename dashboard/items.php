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
  $s_id = $_GET['store_id'];
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
          <h2>Items</h2>
         
        </div>
        <br>
        <form method="Post">
          <table border>
            <thead>
              <th>Image</th>
              <th>item name</th>
              <th>item Description</th>
              <th>Price</th>
              <th>Status</th>
              <th>Stop</th>
              <th>Active</th>
            </thead>
            <tbody>
              <?php
              include "../connected.php";
              $items = mysqli_query($conn, "SELECT * FROM `items` where `store_id`=$s_id");

              if (mysqli_num_rows($items) > 0) {
                while ($row = mysqli_fetch_array($items)) {
              ?>
                  <tr>
                    <td><img src="../<?php echo $row['item_img']; ?>" width="120px"></td>
                    <td><?php echo $row['item_name']; ?></td>
                    <td><?php echo $row['item_desc']; ?></td>
                    <td><?php echo $row['item_price']; ?></td>
                    <td><?php echo $row['item_status']; ?></td>
                    <td><a href="stop.php?item_id=<?php echo $row['item_id']; ?>&store_id=<?php echo $row['store_id']; ?>" class="button">Stop</a></td>
                    <td><a href="active.php?item_id=<?php echo $row['item_id']; ?>&store_id=<?php echo $row['store_id']; ?>" class="button2">Activate</a></td>
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