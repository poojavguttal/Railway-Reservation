<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>NAVIGATE</title>
    <style>
        
    </style>
    <script src="https://kit.fontawesome.com/d31f2dce62.js" crossorigin="anonymous"></script>
</head>
<body>
<?php
session_start();
if ($_SESSION['admin_email']){
echo '<p style="text-align:center;color:white;background-color:#4caf50;width:30%;margin-left:35%;padding-top:1%;margin-top:-1%;padding-bottom:1%">'."WELCOME " . $_SESSION['admin_email'];
}
else{
    header('Location:adminlogin.php');
}
?>
   <div class="bor" >
    <h1>Welcome to Indian Railways  <i class="fas fa-train"></i></h1>
    <div class="nav">
    <a href="admintrains.php" class="train">trains display <i class="fas fa-clipboard-list"></i></a>
    <a href="adminbooking.php" class="boo">Passengers bookings <i class="fas fa-train"></i></a>
    <a href="adminregistrations.php" class="reg">Passengers registration <i class="fas fa-registered"></i> </a>
    <a href="adminlogout.php" class="log">LOGOUT <i class="fas fa-sign-out-alt"></i> </a>
    </div>
    </div>
    <style>

        body
        {
            background:url("train1.jpg");
            
        }
        .bor{
            background:rgba(0,0,0,0.5);
            padding-top:2%;
            padding-bottom:15%;
            margin-top:3.5%;
        }
        
        
        h1{
            
            margin:50px 300px 0px 485px ;
            width: 500px;
            text-align:center;
            font-size:200%;
            color:white;
            border-bottom:6px solid #4caf50;
            padding-bottom:1%;

            
        }
        .nav{
            margin-top:11%;
            
           
        }
        
        .train{
            
            margin-left:14%;
            text-decoration:none;
            border:6px solid #4caf50;
            padding-left:3%;
            padding-right:3%;
            padding-top:6%;
            padding-bottom:6%;
            margin-top:100%;
           color:black;
           background:white;
           cursor:pointer;
            
        }
        .boo{
            margin-left:6%;
            text-decoration:none;
            border:6px solid #4caf50;
            padding-left:1%;
            padding-right:1%;
            padding-top:6%;
            padding-bottom:6%;
            margin-top:190%;
           color:black;
           background:white;
           cursor:pointer;
           text-align:top;
            
           
            
        }
        .reg{
            
            margin-left:6%;
            text-decoration:none;
            border:6px solid #4caf50;
            padding-left:1%;
            padding-right:1%;
            padding-top:6%;
            padding-bottom:6%;
            margin-top:100%;
           color:black;
           background:white;
           cursor:pointer;
        }
        
        .log{
            margin-left:6%;
            text-decoration:none;
            border:6px solid #4caf50;
            padding-left:3%;
            padding-right:3%;
            padding-top:6%;
            padding-bottom:6%;
            margin-top:100%;
           color:black;
           background:white;
           cursor:pointer;
           
            
        }
        
        .train:hover,.reg:hover,.log:hover,.admin:hover,.boo:hover{
            background-color:rgb(108, 167, 108);
        }

    </style>
</body>
</html>