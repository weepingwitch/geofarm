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
      //header("Location: logout.php");
    }

    else
    {

      $_SESSION['new'] = 0;
      $_SESSION['username'] = $username;
      header("locframe.html");

    }




  } else {
    echo "username doesn't exist";
    $_SESSION['new'] = 0;
  //  header("Location: logout.php");
  }
}

else {
  echo "attempting to log in " . $_POST["username"];
  $username = $_POST['username'];
  $password =  $_POST["password"];

  $sql = "SELECT * FROM `users` WHERE `username` = '$username'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0){
$row = $result->fetch_assoc();
    if (!password_verify($password,$row['passwordhash']))
    {
      die("wrong password :(");}
      else{



        setcookie("geofarmid",$username,2147483647);
        setcookie("geofarmpass",$row['passwordhash'],2147483647);

        $_SESSION['username'] = $username;
        header("locframe.html");






      }


    }
    else{
      die("That account doesn't exist... try registering?");
    }



  }



  ?>
