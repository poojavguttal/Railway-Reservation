<?php
session_start();
if (isset($_POST['submit']))
{
    $conn = mysqli_connect("localhost","root","","demo");
if(!$conn){  
	echo "<script type='text/javascript'>alert('Database failed');</script>";
  	die('Could not connect: '.mysqli_connect_error());  
}
$trainame=$_POST['train'];
$trainumber=$_POST['train_no'];
$start=$_POST['start'];
$dest=$_POST['dest'];
$arrival=$_POST['arrtime'];
$departure=$_POST['depar'];   
$sql="INSERT INTO trains_display (train_name, train_number, starting_point, destination, arrival, departure) VALUES ('$trainame', '$trainumber', '$start', '$dest', '$arrival', '$departure');";
if(mysqli_query($conn, $sql))
{
    $message='successfully updated';
    header('Location:admintrains.php');
}
else{
	$message = 'updation unsuccessfull';
}
echo "<script type='text/javascript'>alert('$message');</script>";

}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset = "UTF-8">
	<title>railway resevation system</title>
    <meta name="viewport" content="width=device-width,initial scale=1">
    <style>
             body 
            {
                background:url("train5.jpg");
            }
            body{
            padding:0%;
            margin:0%;
            max-width:100%;
            height:auto;
            font-family: sans-serif;
            background:url("train6.jpg");
            
        }
         h1{
           
            font-size:30px;
            color:white;
            
            margin-right:100px;
            margin-left:9%;
            border:none;
            outline:none;
            background:none;
            border-bottom: 2px solid #4caf50;
            
            }
            



        .one{
           
            border:1px solid #4caf50;
            width:500px;
           
            padding-bottom:4.5%;
            margin-left:35%;
            margin-top:2%;
            color:#fff;
            
            background:rgba(0,0,0,0.6);
        }
        .one input{
            border:none;
            outline:none;
            background:none;
            border-bottom: 2px solid #4caf50;
            margin-left:10%;
            color:white;
        }
        
        

        
        .one .submit {
            margin-top:1%;
            font-size:25px;
           
            font-family: sans-serif;
            border:2px solid #4caf50;
            background:none;
            color:white;
            padding-left:70px;
            padding-right:80px;
            cursor:pointer;
            margin-left:20px;
            margin-right:600px;
            background:rgba(0,0,0,0.6);
            position:fixed;
        }
        a{
            margin-top:1%;
            font-size:25px;
           text-decoration:none;
            font-family: sans-serif;
            border:2px solid #4caf50;
            background:none;
            color:white;
            padding-left:70px;
            padding-right:80px;
            cursor:pointer;
            margin-left:260px;
            margin-right:800px;
            background:rgba(0,0,0,0.6);
            position:fixed;  
        }
        .submit:hover, a:hover{
            background-color:rgb(108, 167, 108);
        }
        
        
        label{
            margin-left:11%;
            text:bold;
            font-size:130%;
            margin-top:1%;
           
        }
            .dest{
                
            width:80%;
            overflow:hidden;
            font-size:20px;
            padding:3px 0;
            margin:3px 0;
            border-bottom: 2px solid #4caf50;
            margin-left:17%;
            }
            .arrtime{
                width:80%;
            overflow:hidden;
            font-size:20px;
            padding:3px 0;
            margin:3px 0;
            border-bottom: 2px solid #4caf50;
            margin-left:17%;

            }
            .start{
                width:80%;
            overflow:hidden;
            font-size:20px;
            padding:3px 0;
            margin:3px 0;

            border-bottom: 2px solid #4caf50;
            margin-left:17%;
            }

            .depar{
                
                width:80%;
            overflow:hidden;
            font-size:20px;
            padding:3px 0;
            margin:3px 0;
            border-bottom: 2px solid #4caf50;
            margin-left:17%;
            }
            
            .train{
                width:80%;
            overflow:hidden;
            font-size:20px;
            padding:3px 0;
            margin:3px 0;
            border-bottom: 2px solid #4caf50;
            margin-left:17%;

            }
            .train_no{
                width:80%;
            overflow:hidden;
            font-size:20px;
            padding:3px 0;
            margin:3px 0;
            border-bottom: 2px solid #4caf50;
            margin-left:17%;

            }
            option{
                background:black;
                
            }
        </style>
</head>
<body>

<div class = 'one'>
<form method="post" action="adminadd.php">
    <h1>Add Train Info</h1><br><br>
    <label for='train_name'>TRAIN NAME:</label>
    <input type='text' id='train' name='train' class='train' ><br/><br>

    <label for='train_no'>TRAIN NUMBER:</label>
    <input type='number' id='train_no' name='train_no' class='train_no'><br/><br>

    <label for='start'>STARTING POINT:</label>
    <input type='text' id='start' name='start' class='start'><br/><br>

    <label for='dest'>DESTINATION:</label>
    <input type='text' id='dest' name='dest' class='dest'><br/><br>
             

    <label for='arrtime'>ARRIVAL TIME:</label>
    <input type='text' id='arrtime' name='arrtime' class='arrtime' ><br/><br>

    <label for='depar'>DEPARTURE TIME:</label>
    <input type='text' id='depar' name='depar' class='depar' ><br/><br> 
    <input type="Submit" value="submit" name="submit" id="submit" class="submit">
     <a href="admintrains.php">Cancel</a>
    </div>   <!--one-->  
    
              
</form>
</body>
</html>