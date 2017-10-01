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

  if (empty($_POST['username'])) {
              die("no username entered");
          }
  if(empty($_POST['password'])){
    die("no password entered");
  }


$newusername = $_POST['username'];
$newpassword =  password_hash($conn->real_escape_string($_POST["password"]),PASSWORD_BCRYPT);

$sql = "SELECT * FROM `users` WHERE `username` = '$newusername'";
$result = $conn->query($sql);

if ($result->num_rows > 0){

echo "that account already exists... sorry!";

}
else{
  $sql = "INSERT INTO users (username, passwordhash, gold, fertilizer)
                             VALUES('" . $newusername . "', '" . $newpassword . "', 25,5);";
                     $query_new_user_insert = $conn->query($sql);
                     // if user has been added successfully
                     if ($query_new_user_insert) {
                        echo "user created!!!";

                        include("loginuser.php");



                     } else {
                        die("oh no");
                     }




}
}




 ?>
