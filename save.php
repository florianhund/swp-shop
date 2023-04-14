<?php 
  session_start();
?>

<?php
require('connection.php');

$id = intval($_REQUEST["id"]);
$name = $_REQUEST["name"];
$desc = $_REQUEST["desc"];
$cat = intval($_REQUEST["cat"]);
$price = intval($_REQUEST["price"]);

$sql = "UPDATE Article SET Name='$name', Description='desc', CategoryID = $cat, Price=$price Where id = $id";
$result = $conn->query($sql);

$conn->close();

// Seite datenholen.php anzeigen
header("Location: detail.php?id=$id");
?>