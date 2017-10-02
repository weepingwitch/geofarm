<?php
$seed = $_POST['s'];
include("dbconnect.php");


$username = $_SESSION['username'];
echo $username;
$sql = "SELECT * FROM `users` WHERE `username` = '$username'";
$result = $conn->query($sql);


if ($result->num_rows > 0){
  $row = $result->fetch_assoc();
  $userid = $row['id'];
}
else{
  die("usernotfound");
}

$now = new DateTime();
$now = $now->format("U");




$sql = "SELECT * FROM `visits` WHERE `seed` = '$seed'";
$result = $conn->query($sql);

if ($result->num_rows > 0){

  echo "this plot has been visited " . $result->num_rows . " times!<BR>";


  $sql = "SELECT * FROM `visits` WHERE `seed` = '$seed' AND `userid` = '$userid'";
  $result = $conn->query($sql);

  if ($result->num_rows == 0){

    $sql = "INSERT INTO visits (userid,seed,lastgifted)
    VALUES('" . $userid . "', '" . $seed . "', '" . $now ."');";
    $queryc = $conn->query($sql);
  }
}
else{



  $sql = "INSERT INTO visits (userid,seed,lastgifted)
  VALUES('" . $userid . "', '" . $seed . "', '" . $now ."');";
  $queryc = $conn->query($sql);

  if ($queryc) {

    for ($num = 0; $num < 20; $num++){
      $sql = "INSERT INTO tiles (seed,num,type,state,watered,fertilized,lasttouched)
      VALUES('" . $seed . "', '" . $num . "', 0,0,0,0," . $now .");";
      $queryc = $conn->query($sql);
    }








  }
  else{
    die("database error srry");
  }
}


?>
