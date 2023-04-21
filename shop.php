<?php 
  session_start();
  if (!isset($_SESSION['user'])) {
    header("Location: login.html");
    exit();
  }
?>

<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WEB SHOP</title>
</head>
<body>
  <a href="logout.php">Logout</a>
  <a href="warenkorb.php">Warenkorb</a>
  <?php
    require('connection.php');

    $sql = 'SELECT a.ID, a.Name, a.Description, c.Name AS Category, a.Price
    FROM Article a
    INNER JOIN Category c
    ON a.CategoryId = c.ID';
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      echo "<table width='800px'>";
      echo "<tr>";
      echo "<th>Name</td>";
      echo "<th>Description</td>";
      echo "<th>Category</td>";
      echo "<th>Price</td>";
      echo "</tr>";
      while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["Name"] . "</td>"; 
        echo "<td>" . $row["Description"] . "</td>";
        echo "<td>" . $row["Category"] . "</td>";
        echo "<td>" . $row["Price"] . "</td>";
        echo "<td> <a href='detail.php?id=" . $row["ID"] ."'>Detail</a></td>";
        echo "<td> <a href='add.php?id=" . $row["ID"] ."&amount=1'>Zum Warenkorb hinzufügen</a></td>";
        echo "</tr>";
    }
      echo "</table>";
    } else {
      echo "0 results";
    }
    $conn->close();  
  ?>
</body>
</html>