<?php 
  session_start();
?>

<?php
require('connection.php');

$id = intval($_REQUEST["id"]);

$sql = "DELETE FROM Article WHERE ID = $id";
$result = $conn->query($sql);

$conn->close();

header("Location: shop.php");
?>
