<?php
session_start();

if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
//including the database connection file
include_once("connection.php");

//fetching data in descending order (latest entry first)
$result = mysqli_query($conn, "SELECT * FROM products WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Homepage</title>
  <link rel="stylesheet" type="text/css" href="./styl.css">
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
</head>
<body>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <div id="homepage">
          <h2 class="title">Product List</h2>
          <a href="add.html" class="btn add-btn">Add New Data</a>
          <a href="logout.php" class="btn logout-btn">Logout</a>
          <br/><br/>
          <table width='80%' border=0>
            <tr bgcolor='#CCCCCC'>
              <td>Name</td>
              <td>Quantity</td>
              <td>Price (dollars)</td>
              <td>Update</td>
            </tr>
            <?php
            while($res = mysqli_fetch_array($result)) {		
              echo "<tr>";
              echo "<td>".$res['name']."</td>";
              echo "<td>".$res['qty']."</td>";
              echo "<td>".$res['price']."</td>";	
              echo "<td><a href=\"edit.php?id=$res[id]\" class=\"btn edit-btn\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\" class=\"btn delete-btn\">Delete</a></td>";		
            }
            ?>
          </table>
        </div>
      </div>
    </div>
    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>Welcome!</h3>
          <p>Manage your product list efficiently.</p>
        </div>
      </div>
    </div>
  </div>
  <script src="./app.js"></script>
</body>
</html>
