<?php 
  session_start();
?>

<?php 
    require('connection.php');

    $email = $_POST['email']; 
    $password = $_POST['password'];

    $isExistingUser = $conn->query("SELECT * FROM User WHERE Email = '$email'");

    if ($isExistingUser->num_rows > 0) {
      $isCorrectPassword = $conn->query("SELECT ID FROM User WHERE Email = '$email' AND Password = '$password'");
      if ($isCorrectPassword->num_rows > 0) {
        if ($row = $isCorrectPassword->fetch_assoc()) {
          $_SESSION['user'] = $row['ID'];
          header("Location: shop.php");
        }
      } else {
        echo 'Wrong Password';
      }
    } else {
      echo "No user with specified email.";
    }

  	$conn->close();

    // header("Location: products.html");
?>
