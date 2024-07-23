<?php
session_start();
include("connection.php");

if (isset($_POST['submit'])) {
    $user = mysqli_real_escape_string($conn, $_POST['username']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);

    if ($user == "" || $pass == "") {
        echo "Either username or password field is empty.";
        echo "<br/>";
        echo "<a href='login.php'>Go back</a>";
    } else {
        $result = mysqli_query($conn, "SELECT * FROM login WHERE username='$user' AND password=md5('$pass')")
            or die("Could not execute the select query.");

        $row = mysqli_fetch_assoc($result);

        if (is_array($row) && !empty($row)) {
            $validuser = $row['username'];
            $_SESSION['valid'] = $validuser;
            $_SESSION['name'] = $row['name'];
            $_SESSION['id'] = $row['id'];
        } else {
            echo "Invalid username or password.";
            echo "<br/>";
            echo "<a href='login.php'>Go back</a>";
        }

        if (isset($_SESSION['valid'])) {
            header('Location: index.php');
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SignIn&SignUp</title>
  <link rel="stylesheet" type="text/css" href="./styl.css">
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
</head>
<body>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <form class="sign-in-form" id="signin-form" method="post" action="login.php">
          <h2 class="title">Sign In</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" name="username" placeholder="username" required>
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" placeholder="Password" required>
          </div>
          <input type="submit" value="Login" name="submit" class="btn solid">
          <p class="social-text">Or Sign in with social platforms</p>
          <div class="social-media">
            <a href="#" class="social-icon">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-google"></i>
            </a>
          </div>
        </form>
        <!-- Include registration form to switch between sign-in and sign-up -->
        <?php include("register.php"); ?>
      </div>
    </div>
    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>New here?</h3>
          <button class="btn transparent" id="sign-up-btn">Sign Up</button>
        </div>
      </div>
      <div class="panel right-panel">
        <div class="content">
          <h3>One of us?</h3>
          <button class="btn transparent" id="sign-in-btn">Sign In</button>
        </div>
      </div>
    </div>
  </div>
  <script src="./app.js"></script>
</body>
</html>
