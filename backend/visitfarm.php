<?php
$seed = $_POST['s'];
mt_srand(intval($seed));

include("dbconnect.php");


$username = $_SESSION['username'];
echo $username;
echo "<BR>";
include("checkfirstvisit.php");

echo "visiting plot number " . $seed;

echo "<BR><BR><a href='backend/logout.php'>logout</a><Br><BR>";



echo "<BR>";

echo "<table border='1' style='height:70%;' id='farmgrid'>";

$num = 0;
for($tr=1;$tr<=5;$tr++){

    echo "<tr style='height:20%;'>";
        for($td=1;$td<=4;$td++){
               echo "<td align='center' style='width:25%;'>";

               $_POST['n'] = $num;
               include("viewplot.php");

               echo "</td>";
               $num += 1;
        }
    echo "</tr>";
}

echo "</table>";


?>
