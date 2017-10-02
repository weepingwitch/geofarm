<?php
$seed = $_POST['s'];
include("dbconnect.php");

$sql = "SELECT * FROM `visits` WHERE `seed` = '$seed'";
$result = $conn->query($sql);

if ($result->num_rows > 0){

echo "already exists";

}
else{
  $username = $_SESSION['username'];
  $sql = "SELECT * FROM `users` WHERE `username` = '$username'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0){
    $row = $result->fetch_assoc();
    $userid = $row['id'];
  }

  $now = new DateTime()->format("U");
  $sql = "INSERT INTO visits (userid,seed,lastgifted)
  VALUES('" . $userid . "', '" . $seed . "', '" . $now ."');";
  $queryc = $conn->query($sql);
  // if user has been added successfully
  if ($queryc) {
    echo "visit created!!!";


  }
  else{
    die("database error srry");
  }
}


  ?>
