<?php


$seed = $_POST['s'];
$numb = $_POST['n'];
$newstate = $_POST['xnewvalx'];



//UPDATE THE DATABASE HEREEEEEEE
$now = new DateTime();
$now = $now->format("U");

$sql = "UPDATE `tiles` SET `state` = '" . $newstate . "', `lasttouched` = '" . $now . "'  WHERE `seed` = '$seed' AND `num` = '$numb'";
$queryc = $conn->query($sql);


 ?>
