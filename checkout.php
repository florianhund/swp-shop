<?php
  session_start();

  require('connection.php');

  $user = $_SESSION['user'];

  $sql = "SELECT ArticleId, PriceAtInsert AS Price, Amount FROM ProductsInCart WHERE UserId = '$user'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $conn->query("INSERT INTO BuyedProducts VALUES ($user, " . $row['ArticleId'] . ", " . $row['Price'] . ", '" . date('Y-m-d H:i:s') . "', " . $row['Amount'] . ")");
      header('Location: shop.php');
      $conn->query("DELETE FROM ProductsInCart WHERE UserId = '$user'");
    }
  } else {
    echo "No products";
  }
?>