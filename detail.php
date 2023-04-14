<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WEB SHOW</title>
</head>
<?php 
  session_start();
?>

<body>
  <?php
    require('connection.php');

    $id = intval($_REQUEST['id']);

    $sql = "SELECT a.ID, a.Name, a.Description, c.ID AS CategoryID, c.Name AS Category, a.Price
    FROM Article a
    INNER JOIN Category c
    ON a.CategoryId = c.ID
    WHERE a.ID = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      if($row = $result->fetch_assoc()) {
        echo "<h1>" . $row["Name"] . "</h1>";
        echo "<tr>";
        echo "ID: " . $row["ID"] . "<br>"; 
        echo "Name: " . $row["Name"] . "<br>"; 
        echo "Description: " . $row["Description"] . "<br>"; 
        echo "CategoryID: " . $row["CategoryID"] . "<br>"; 
        echo "Category: " . $row["Category"] . "<br>"; 
        echo "Price: " . $row["Price"] . "<br>";  
        // echo "<a href='update.php?id=" . $row["ID"] ."'>Ändern</a>";
	      // echo "<a href='delete.php?id=" . $row["ID"] ."'>Löschen</a>";
    }
      echo "</table>";
    } else {
      echo "0 results";
    }
    $conn->close();  
  ?>
</body>
</html>