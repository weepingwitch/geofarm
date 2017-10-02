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
echo "<div id='farmgoeshere'>";
include("farmgrid.php");
echo "</div>";

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

  $(document).on("click", ".tile" , function() {
    var s = $("#seeddiv").text();
    var n = $(this).attr('id');
    $("#farmgoeshere").load("backend/tapplot.php",{s:s,n:n});
  });


});
</script>
