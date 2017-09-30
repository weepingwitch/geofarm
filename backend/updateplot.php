<?php



//HERE IS WHERE WE WOULD FETCH THE PLANT TYPE FROM THE DATABSE
$type = 0;
// TYPE VALUES
//0 - flowers


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
  //calculate number of hours since last updated
  $diff =  $origtime->diff($now);
  $diffh = $diff->h;

}
else{
  $cangrow = false;
}


//try to grow?
while($cangrow){
  //FETCH HOW MUCH TIME IT TAKES FROM THE DATABASE BAED ON WATERED STAT
  if ($watered){
    $growtime =  10;
  }
  else{
    $growtime = 20;
  }
  //if there is time left to grow
  if ($diffh > $growtime ){
    //do the growing
    $state += 1;
    $watered = false;
    $diffh -= $growtime;
    if ($state > 4){
      $cangrow = false;
    }

  }
  else{
    $cangrow = false;
  }
}




 ?>
