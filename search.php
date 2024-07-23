<?php
include("connection.php");

$query = $_GET['q'];
$query = mysqli_real_escape_string($conn, $query);
$sql = "SELECT * FROM products WHERE login_id=".$_SESSION['id']." AND name LIKE '%$query%'";
$result = mysqli_query($conn, $sql);

$products = array();
while ($row = mysqli_fetch_assoc($result)) {
    $products[] = $row;
}
echo json_encode($products);
?>
