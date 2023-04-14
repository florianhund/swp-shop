<?php 
  session_start();
?>


<html>
<body>
  <h1>Daten ändern</h1>  
<?php
require('connection.php');

$id = intval($_REQUEST["id"]);   // Lesen des Parameters

$sql = "SELECT ID, Name, Description, CategoryID, Price FROM Article where ID = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  if($row = $result->fetch_assoc()) {

    $id=$row["ID"];
    $name=$row["Name"]; 
    $desc=$row["Description"];
    $cat=$row["CategoryID"];
    $price=$row["Price"];

    echo "<form method='post' action='save.php'>";
    echo "id:<input type='text' name='id' value='$id' readonly><br>";
    echo "name:<input type='text' name='name' value='$name'> <br>";
    echo "Description:";
    echo "<input type='text' name='desc' value='$desc'><br>";
    echo "CategoryID:";
    echo "<input type='text' name='cat' value='$cat'><br>";
    echo "Price:";
    echo "<input type='text' name='price' value='$price'><br>";
    echo "<button type='submit'>Speichern</button>";
    echo "</form>";
    echo "<p> <a href='datenholen.php'>Abbrechen</a></p>";
    }
} else {
  echo "0 results";
}
$conn->close();
?> 

</body>
</html>
