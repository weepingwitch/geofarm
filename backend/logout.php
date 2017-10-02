<?php

setcookie("geofarmid", "", time() - 3600,"/", "",  0);
setcookie("geofarmpass", "", time() - 3600,"/", "",  0);
echo "<script>alert('loggin out');</script>";
echo "<script>parent.self.location='../index.php';</script>";
echo "logged out";
 ?>
