<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head runat="server">
  <title>Messages</title>
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
          <h2>Messages</h2>
        </div>
        <br>
        <form method="Post">
          <table>
            <thead>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Title</th>
              <th>Messages</th>
              <th>Delete</th>
            </thead>
            <tbody>
              <?php
              include "../connected.php";
              $mass = mysqli_query($conn, "SELECT * FROM `contact_us`");

              if (mysqli_num_rows($mass) > 0) {
                while ($row = mysqli_fetch_array($mass)) {
              ?>
                  <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['massege']; ?></td>
                    <td><a href="delete.php?id=<?php echo $row['id']; ?>" class="button2">Delete</a></td>
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