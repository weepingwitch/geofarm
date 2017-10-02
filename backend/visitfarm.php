<?php
$seed = $_POST['s'];
mt_srand(intval($seed));

include("dbconnect.php");


$username = $_SESSION['username'];
echo "hello " . $username;
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
echo "<div id='seeddiv' style='visibility:hidden;'>" . $seed . "</div>";

?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script>
  function post(path, params, method) {
      method = method || "post"; // Set method to post by default if not specified.

      // The rest of this code assumes you are not using a library.
      // It can be made less wordy if you use one.
      var form = document.createElement("form");
      form.setAttribute("method", method);
      form.setAttribute("action", path);

      for(var key in params) {
          if(params.hasOwnProperty(key)) {
              var hiddenField = document.createElement("input");
              hiddenField.setAttribute("type", "hidden");
              hiddenField.setAttribute("name", key);
              hiddenField.setAttribute("value", params[key]);

              form.appendChild(hiddenField);
           }
      }

      document.body.appendChild(form);
      form.submit();
  }
  $(document).ready(function() {
              //option A


              $(".tile").click(function(){

                  var s = $("#seeddiv").text();
                  var n = $(this).attr('id');
                  post("backend/tapplot.php",{s:s,n:n});
                  //$("body").load("backend/loginuser.php",{username:uname,password:pword});
              });

          });
  </script>
