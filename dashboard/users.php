<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head runat="server">
  <title>Users</title>
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
          <h2>Users</h2>
        </div>
        <br>
        <form method="Post">
          <table>
            <thead>
              <th>User_id</th>
              <th>Name</th>
              <th>UserName</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Type</th>
              <th>Set Type</th>
              <th>Set Type</th>
            </thead>
            <tbody>
              <?php
              include "../connected.php";
              $user = mysqli_query($conn, "SELECT * FROM `users`");

              if (mysqli_num_rows($user) > 0) {
                while ($row = mysqli_fetch_array($user)) {
              ?>
                  <tr>
                    <td><?php echo $row['user_id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['type']; ?></td>
                    <td><a href="changeadmin.php?user_id=<?php echo $row['user_id']; ?>" class="button2">Seller</a></td>
                    <td><a href="changeuser.php?user_id=<?php echo $row['user_id']; ?>" class="button2">User</a></td>
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