<?php
echo "<table border='0' cellspacing='0' cellpadding='0' style='height:70%;' id='farmgrid'>";

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
