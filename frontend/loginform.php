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
              echo "<script>parent.self.location='backend/logout.php';</script>";
            }

    else
            {
                    $_SESSION['new'] = 0;
                    $_SESSION['username'] = $username;
            echo "<script>parent.self.location='index.php';</script>";

            }




  } else {
    echo "wrong password :(";
      $_SESSION['new'] = 0;
    header("Location: backend/logout.php");
  }
}




 ?>


 <html>

<head>  <meta name="viewport" content="width=device-width, initial-scale=1">

<style type="text/css">
/* Bordered form */
.formbox {
    border: 3px solid #f1f1f1;
}

/* Full-width inputs */
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color: #bbbbbb;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

/* Add a hover effect for buttons */
button:hover {
    opacity: 0.8;
}


/* Center the avatar image inside this container */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

/* Avatar image */
img.avatar {
    width: 40%;
    border-radius: 50%;
}


@media only screen and (min-width: 769px) {
.formbox {
width:768px;
    margin-left: auto;
    margin-right:auto;

}
}


/* Add padding to containers */
.container {
    padding: 16px;

}




</style>
</head>

<body>

  <div class="formbox">
  <!--<div class="imgcontainer">
    <img src="img_avatar2.png" alt="Avatar" class="avatar">
  </div>-->

  <div class="container">
    <label><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" id="username" required>

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password"  id="password" required>

    <button name="login" id="login">Login</button>

  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button  name="register" id="register">Register</button>
  </div>
</div>

<div id="div1"></div>
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


            $("#login").click(function(){
                $("#div1").html("logging in!");
                var uname = $("#username").val();
                var pword = $("#password").val();
                post("backend/loginuser.php",{username:uname,password:pword});
                //$("body").load("backend/loginuser.php",{username:uname,password:pword});
            });
            $("#register").click(function(){
                $("#div1").html("registering!");
                var uname = $("#username").val();
                var pword = $("#password").val();
                post("backend/createuser.php",{username:uname,password:pword});
                //$("body").load("backend/createuser.php",{username:uname,password:pword});
            });
        });

</script>


</body>
