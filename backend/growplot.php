<?php

$needsupdate = false;

//HERE IS WHERE WE WOULD FETCH THE PLANT TYPE FROM THE DATABSE
$type = 1;
// TYPE VALUES
//0 - uhh
//1 - flowers


// HERE IS WHERE WE WOULD FETCH THE STATE FROM THE DATABSE
$state = 2;
// STATE VALUES
//0 - grass
//1 - tilled soil
//2 - seeds
//3 - growing
//4 - harvestable
//5 - dead

// FETCH WHETHER IT WAS WATERED FROM THE DATABASE
$watered = true;

// DO WE TRY TO GROW?
if ($state >= 2 && $state <= 4){
  $cangrow = true;
  //HERE IS WHERE WE WOULD FETCH THE ORIGTIME FROM THE DATABASE
  $origtime = new DateTime("2017-09-29 17:34:01");
  $now = new DateTime();
  //echo "time: "  . $now->getTimestamp();
  //calculate number of hours since last updated
  $diff =  $origtime->diff($now);
  $diffh = $diff->h;
  $diffh = $diffh + ($diff->days*24);


}
else{
  $cangrow = false;
}


//try to grow?
while($cangrow){
  //FETCH HOW MUCH TIME IT TAKES FROM THE DATABASE BAED ON WATERED STAT
  $sql = "SELECT * FROM `planttypes` WHERE `id` = '$type'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0)
    $row = $result->fetch_assoc();
    $growtime = $row['growtime'];
    $harvesttime = $row['harvesttime'];
    echo $harvesttime;

  } else {
      echo "0 results";
  }


  if ($watered){
    $growtime =  $growtime / 2;
  }

  //if there is time left to grow
  if ((($state == 2 || $state == 3) && ($diffh > $growtime ) ) || ($diffh > $harvesttime) {

    //do the growing
    $state += 1;
    $watered = false;
    $diffh -= $growtime;
    $needsupdate = true;
    if ($state > 4){
      $cangrow = false;
    }

  }
  else{
    $cangrow = false;
  }
}

if ($needsupdate){

  $_POST['xnewvalx'] = $state;
  include("updateplot.php");
}


 ?>
