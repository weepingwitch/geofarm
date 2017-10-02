<?php
$seed = $_POST['s'];
include("dbconnect.php");

$sql = "SELECT * FROM `visits` WHERE `seed` = '$seed'";
$result = $conn->query($sql);

if ($result->num_rows > 0){

// someone has initialized this farm before

}
  else{



  echo "need to make a new farm lol<BR><BR>";
  }


?>
