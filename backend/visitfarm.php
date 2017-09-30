<?php
$seed = $_GET['s'];
mt_srand(intval($seed));

echo "visiting plot number " . $seed;


?>
