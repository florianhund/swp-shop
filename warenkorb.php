<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WEB SHOP</title>
</head>
<body>
  <?php
    session_start();

    require('connection.php');

    $sql = "SELECT a.Name, p.PriceAtInsert AS Price, p.Amount FROM ProductsInCart p INNER JOIN Article a ON p.ArticleID = a.ID WHERE p.UserId = " . $_SESSION['user'];
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      echo "<table width='600px'>";
      echo "<tr>";
      echo "<th>Name</td>";
      echo "<th>Price</td>";
      echo "<th>Amount</td>";
      echo "</tr>";
      while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["Name"] . "</td>"; 
        echo "<td>" . $row["Price"] . "</td>";
        echo "<td>" . $row["Amount"] . "</td>";
    }
      echo "</table>";
    } else {
      echo "0 results";
    }
    $conn->close();  
  ?>
  <br><br>
  <form action="checkout.php" method="POST">
    <button>Kaufen</button>
  </form>
</body>
</html>