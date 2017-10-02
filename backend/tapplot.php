<?php
$seed = $_POST['s'];
$numb = $_POST['n'];

$needsupdate = false;

$sql = "SELECT * FROM `tiles` WHERE `seed` = '$seed' AND `num` = '$numb'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();


//get current seed from the database based on yr user
$seedtype = 0;


//get value from the database
$state = $row['state'];
// STATE VALUES
//0 - grass
//1 - tilled soil
//2 - seeds
//3 - growing
//4 - harvestable
//5 - dead


//move from grass to
if ($state == 0){
  $state = 1;
  $needsupdate = true;

}
else{
  if ($state == 1){

// handle planting seeds;

  }

  if ($state == 4){

//do the harvest here!!!!


  }




}


if ($needsupdate){
  $_POST['xnewvalx'] = $state;
  include("updateplot.php");
}

echo "<script>parent.self.location='index.php';</script>";






?>
