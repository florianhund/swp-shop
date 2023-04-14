<?php 
  session_start();
?>

<?php 
    require('connection.php');

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    echo "INSERT INTO User (Name, Email, Password) VALUES ('$name', '$email', '$password')";
    $conn->query("INSERT INTO User (Name, Email, Password) VALUES ('$name', '$email', '$password')");

  	$conn->close();

    header("Location: login.html");
?>
