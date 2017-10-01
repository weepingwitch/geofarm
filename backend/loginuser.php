<?php
include("dbconnect.php");

if(isset($_COOKIE['geofarmid'])){
  $username = $_COOKIE['geofarmid'];
  $pass = $_COOKIE['geofarmpass'];

  $sql = "SELECT * FROM `users` WHERE `username` = '$username'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0){
    $row = $result->fetch_assoc();

    if ($pass != $row['passwordhash'])
    {
      echo "wrong password :(";
      $_SESSION['new'] = 0;
      header("Location: logout.php");
    }

    else
    {

      $_SESSION['new'] = 0;
      $_SESSION['username'] = $username;
      header("locframe.html");

    }




  } else {

    $_SESSION['new'] = 0;
    header("Location: logout.php");
  }
}

else {
  echo "attempting to log in " . $_POST["username"];
  $username = $_POST['username'];
  $password =  password_hash($conn->real_escape_string($_POST["password"]),PASSWORD_BCRYPT);

  $sql = "SELECT * FROM `users` WHERE `username` = '$username'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0){
$row = $result->fetch_assoc();
    if ($password != $row['passwordhash'])
    {
      die("wrong password :(");}
      else{



        setcookie("geofarmid",$username,2147483647);
        setcookie("geofarmpass",$password,2147483647);

        $_SESSION['username'] = $username;
        header("locframe.html");






      }


    }
    else{
      die("That account doesn't exist... try registering?");
    }



  }



  ?>
