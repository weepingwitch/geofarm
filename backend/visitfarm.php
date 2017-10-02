<?php
$seed = $_POST['s'];
mt_srand(intval($seed));

include("dbconnect.php");
include("checkfirstvisit.php");

echo "visiting plot number " . $seed;

echo "<BR><BR><a href='backend/logout.php'>logout</a><Br><BR>";

$_POST['n'] = 0;


echo "<BR>";

echo "<table border='1' style='width:100%;height:70%;'>";

$num = 0;
for($tr=1;$tr<=5;$tr++){

    echo "<tr style='height:20%;'>";
        for($td=1;$td<=4;$td++){
               echo "<td align='center' style='width:25%;'>";
               echo $num;
               echo "</td>";
               $num += 1;
        }
    echo "</tr>";
}

echo "</table>";
include("viewplot.php");

?>
