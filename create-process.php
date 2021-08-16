


<?php
include_once 'database.php';


    $email = $_POST['email'];
    $password = $_POST['password'];

    

    $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 
  
     
  
    if (!preg_match($regex, $email)) { 
        echo $email . " is an invalid email. Please try again.";
       }     
          else{
        $number = preg_match('@[0-9]@', $password);
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);
        
        if(strlen($password) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars) {
        echo "Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.";
        } else {
        
          $sql = "INSERT INTO users (email,password)
          VALUES ('$email', '$password')";
          if ($conn->query($sql) === TRUE) {
            //$message = "New record created successfully";
            header("location:index.php");
            // echo "New record created successfully";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
        }
        }
mysqli_close($conn);
?>