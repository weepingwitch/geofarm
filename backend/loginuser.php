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
              header("locframe.html");

            }




  } else {
    echo "wrong password :(";
      $_SESSION['new'] = 0;
    header("Location: logout.php");
  }
}

else {
  echo "no cookie";
}



 ?>
