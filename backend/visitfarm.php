<?php
$seed = $_POST['s'];
mt_srand(intval($seed));

include("dbconnect.php");
include("checkfirstvisit.php");

echo "visiting plot number " . $seed;

echo "<BR><BR><a href='backend/logout.php'>logout</a><Br><BR>";

$_POST['n'] = 0;


echo "<BR>";

echo "<table border='1' style='width:100%;'>";

for($tr=1;$tr<=4;$tr++){

    echo "<tr>";
        for($td=1;$td<=5;$td++){
               echo "<td align='center'>".$tr*$td."</td>";
        }
    echo "</tr>";
}

echo "</table>";
include("viewplot.php");

?>
