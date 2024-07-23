<?php session_start(); ?>
<html>
<head>
	<title>Homepage</title>
	<link href="styl.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div id="header">
		Welcome to my page!
	</div>
	<?php
	if(isset($_SESSION['valid'])) {			
		include("connection.php");					
		$result = mysqli_query($conn, "SELECT * FROM login");
	?>
		Welcome <?php echo $_SESSION['name']; ?>! <a href='logout.php' class="btn logout-btn">Logout</a><br/>
		<br/>
		<a href='view.php' class="btn view-btn">View and Add Products</a>
		<br/><br/>
	<?php	
	} else {
		echo "You must be logged in to view this page.<br/><br/>";
		echo "<a href='login.php' class='btn login-btn'>Login/SignUp</a>";
	}
	?>
	<div id="footer">
		Created by <a href="https://www.linkedin.com/in/imane-ben-zerraouia-2580b1209/" title="Imane Benz" class="btn me-btn">Imane Benz</a>
	</div>
</body>
</html>
