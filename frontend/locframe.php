<?php
include("backend/dbconnect.php");

if(isset($_COOKIE['geofarmid'])){
  $username = $_COOKIE['geofarmid'];
  $pass = $_COOKIE['geofarmpass'];

  $sql = "SELECT * FROM `users` WHERE `username` = '$username'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0){
    $row = $result->fetch_assoc();

    if ($pass != $row['passwordhash'])
            {
              echo "wrong password :(";
                $_SESSION['new'] = 0;
              //echo "<script>parent.self.location='backend/logout.php';</script>";
            }

    else
            {
                //yay logged in
                $_SESSION['userame'] = $username;


            }




  } else {
    echo "wrong password :(";
      $_SESSION['new'] = 0;
    //echo "<script>parent.self.location='backend/logout.php';</script>";
  }
}
else{
  echo "uh oh no cookie ";
  //echo "<script>parent.self.location='backend/logout.php';</script>";
}




 ?>
<html>

<head>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

  <title>finding location</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">



  <script type="text/javascript">

  if ("geolocation" in navigator) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var lat = position.coords.latitude;
      var lng = position.coords.longitude;
      rlat = Math.round( lat * 1000 ) / 1000
      rlng = Math.round( lng * 1000) / 1000
      updatepage(rlat,rlng);
    },
    function(failure) {
      //document.writeln("geoloc failed :(");
      var fileloc = "backend/visitfarm.php";
      var lurl = ""+0+""+0;
      lurl = lurl.split('.').join('');
      lurl = lurl.split('-').join('');


      $('#maincontent').load(fileloc, {s:lurl});
    }
  );
} else {
  document.writeln("no geolocation :(");
  var fileloc = "backend/visitfarm.php";
  var lurl = ""+0+""+0;
  lurl = lurl.split('.').join('');
  lurl = lurl.split('-').join('');


  $('#maincontent').load(fileloc, {s:lurl});
}

function updatepage(rlat, rlng)
{
    rlat = Math.round( rlat * 100 ) / 100;
    rlng = Math.round( rlng * 100) / 100;
    $('#debug').html(rlat + ", " + rlng);

    var fileloc = "backend/visitfarm.php";
    var lurl = ""+rlat+""+rlng;
    lurl = lurl.split('.').join('');
    lurl = lurl.split('-').join('');


    $('#maincontent').load(fileloc, {s:lurl});

}



</script>


<style type="text/css">
body{
  background-color:#2aff00;
  background-image:url("art/0x0.png");
}
.tileimg {
  image-rendering:pixelated;
  width:100%;
  display:block;
}
td {
  padding:0px;
}
#farmgrid {
width:100%;
}
@media only screen and (min-width: 769px) {
#farmgrid {
width:768px;
    margin-left: auto;
    margin-right:auto;

}
}
</style>
</head>
<body>

<div id="maincontent">

</div>



<br>
<div id="debug">

</div>



</body>
</html>
