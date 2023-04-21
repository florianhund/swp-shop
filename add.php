<?php
  session_start();

  require('connection.php');

  $article = intval($_REQUEST['id']);
  $amount = intval($_REQUEST['amount']);
  $user = $_SESSION['user'];

  $sql = "SELECT Price FROM Article WHERE ID = '$article'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    if ($row = $result->fetch_assoc()) {
      $isInCart = $conn->query("SELECT Amount FROM ProductsInCart WHERE UserId = '$user' AND ArticleId = '$article'");
      if ($isInCart->num_rows > 0) {
        if ($row = $isInCart->fetch_assoc()) {
          $conn->query("UPDATE ProductsInCart SET Amount = " . $row['Amount'] + 1 . " WHERE UserId = '$user' AND ArticleId = '$article'");
        }
      } else {
        $conn->query("INSERT INTO ProductsInCart (UserId, ArticleId, PriceAtInsert, Amount) VALUES ('$user', '$article', " . $row['Price'] . ", $amount)");
      }
      header('Location: shop.php');
    }
  }
?>
