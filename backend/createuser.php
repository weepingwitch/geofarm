<?php
include("dbconnect.php");

if(isset($_COOKIE['geofarmid'])){
  $username = $_COOKIE['geofarmid'];
  $pass = $_COOKIE['geofarmpass'];

  $sql = "SELECT * FROM `users` WHERE `username` = '$username'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0){
    $row = $result->fetch_assoc();

    if ($pass != $row['password'])
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


$newusername = $_POST['username'];
$newpassword =  password_hash($conn->mysqli_real_escape_string($_POST["password"]),PASSWORD_BCRYPT);
echo $newusername;
echo $newpassword;


}



 ?>
