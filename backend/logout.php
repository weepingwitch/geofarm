<?php

setcookie("geofarmid", "", time() - 3600);
setcookie("geofarmpass", "", time() - 3600);
echo "<script>parent.self.location='../frontend/loginform.php';</script>";
echo "logged out";
 ?>
