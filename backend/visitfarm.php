<?php
$seed = $_POST['s'];
mt_srand(intval($seed));

echo "visiting plot number " . $seed;


$_POST['n'] = 0;


echo "<BR>";
include("viewplot.php");

?>
