<?php
  session_start();

  require('connection.php');

  $user = $_SESSION['user'];

  $sql = 'SELECT ArticleId, PriceAtInsert AS Price, Amount FROM ProductsInCart';
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    if ($row = $result->fetch_assoc()) {
      $conn->query("INSERT INTO BuyedProducts VALUES ($user, " . $row['ArticleId'] . ", " . $row['Price'] . ", " . '2023-03-01' . ", " . $row['Amount'] . ")");
      header('Location: shop.php');
    }
  } else {
    echo "No products";
  }
?>