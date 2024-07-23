<?php
include("connection.php");

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $user = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);

    if ($name == "" || $user == "" || $email == "" || $pass == "") {
        echo "All fields should be filled. Either one or many fields are empty.";
        echo "<br/>";
        echo "<a href='register.php'>Go back</a>";
    } else {
        mysqli_query($conn, "INSERT INTO login(name, username, email, password) VALUES('$name', '$user', '$email', md5('$pass'))")
            or die("Could not execute the insert query.");
        echo "Registration successfully";
        echo "<br/>";
        echo "<a href='login.php'>Login</a>";
    }
}
?>
<form class="sign-up-form" id="signup-form" method="post" action="register.php">
  <h2 class="title">Sign Up</h2>
  <div class="input-field">
    <i class="fas fa-user"></i>
    <input type="text" name="name" placeholder="name" required>
  </div>
  <div class="input-field">
    <i class="fas fa-user"></i>
    <input type="text" name="username" placeholder="Username" required>
  </div>
  <div class="input-field">
    <i class="fas fa-envelope"></i>
    <input type="email" name="email" placeholder="Email" required>
  </div>
  <div class="input-field">
    <i class="fas fa-lock"></i>
    <input type="password" name="password" placeholder="Password" required>
  </div>
  <input type="submit" value="Sign Up" name="submit" class="btn solid">
  <p class="social-text">Or Sign up with social platforms</p>
  <div class="social-media">
    <a href="#" class="social-icon">
      <i class="fab fa-facebook-f"></i>
    </a>
    <a href="#" class="social-icon">
      <i class="fab fa-google"></i>
    </a>
  </div>
</form>

