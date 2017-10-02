<?php

if(empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == "off"){
    $redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . $redirect);
    exit();
}


include("backend/dbconnect.php");

if(isset($_COOKIE['geofarmid'])){
  $username = $_COOKIE['geofarmid'];
  $pass = $_COOKIE['geofarmpass'];

  $sql = "SELECT * FROM `users` WHERE `username` = '$username'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0){
    $row = $result->fetch_assoc();

    if ($pass != $row['passwordhash'])
            {
              die("wrong password :(");
                $_SESSION['new'] = 0;
              echo "<script>parent.self.location='backend/logout.php';</script>";
            }

    else
            {
                    $_SESSION['new'] = 0;
                    $_SESSION['username'] = $username;
            include("frontend/locframe.php");

            }




  } else {
    echo "wrong password :(";
      $_SESSION['new'] = 0;

  }
}
else{

  include("frontend/loginform.php");
}




 ?>
