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
      $_SESSION['new'] = 0;
      //echo "<script>parent.self.location='backend/logout.php';</script>";
      die("wrong password in cookie :(");

      //header("Location: logout.php");
    }

    else
    {

      $_SESSION['new'] = 0;
      $_SESSION['username'] = $username;
      echo "Logged in from cookie!";
      echo "<script>parent.self.location='index.php';</script>";

    }




  } else {
     die("username doesn't exist");
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



        setcookie("geofarmid",$username,214748364);
        setcookie("geofarmpass",$row['passwordhash'],214748364);

        $_SESSION['username'] = $username;
        echo "logged in";
        echo "<script>alert('cookie created');</script>";
        echo "<script>parent.self.location='index.php';</script>";






      }


    }
    else{
      die("That account doesn't exist... try registering?");
    }



  }



  ?>
