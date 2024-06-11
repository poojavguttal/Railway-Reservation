<?php
session_start();
if (isset($_POST['submit']))
{
    $conn = mysqli_connect("localhost","root","","demo");
if(!$conn){  
	echo "<script type='text/javascript'>alert('Database failed');</script>";
  	die('Could not connect: '.mysqli_connect_error());  
}
$train=$_POST['train_no'];
$sql = "SELECT * FROM trains_display WHERE train_number='$train';";
$sql_result = mysqli_query ($conn, $sql) or die ('request "Could not execute SQL query" '.$sql);
if (empty($sql_result)){
    $message="train number not found";
    echo "<script type='text/javascript'>alert('$message');</script>";
}
}
if (isset($_POST['confirm']))
{
    $conn = mysqli_connect("localhost","root","","demo");
if(!$conn){  
	echo "<script type='text/javascript'>alert('Database failed');</script>";
      die('Could not connect: '.mysqli_connect_error());  
}
$train=$_POST['train_no'];
$trainame=$_POST['train'];
$trainumber=$_POST['train_no'];
$start=$_POST['start'];
$dest=$_POST['dest'];
$arrival=$_POST['arrtime'];
$departure=$_POST['depar'];   
$sql = "UPDATE trains_display SET train_name = '$trainame', train_number='$trainumber', starting_point='$start', destination='$dest', arrival ='$arrival',  departure='$departure' WHERE train_number = '$train';";
$sql_result = mysqli_query ($conn, $sql) or die ('request "Could not execute SQL query" '.$sql);
if(!empty($sql_result))
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
        h1 
        {
            text-align: center;
            text-decoration: underline;
            color: black;
            margin: 1% 0% 3% 2% ;
        }
        .train_no 
        {
            
        }
        .one
            {
            width:400px;
            margin: 7% 30% 0% 50%;
            transform: translate(-50%, -50%);
            border-radius:1%;
            padding:2%;
            color:#fff;
            box-sizing:border-box;
            background:rgba(0,0,0,0.6);
           
            }
        .two 
        {
            width:400px;
            margin: 4% 30% -1% 50%;
            transform: translate(-50%, -50%);
            border-radius:1%;
            padding:2%;
            color:#fff;
            box-sizing:border-box;
            background:rgba(0,0,0,0.6);
        }
        .one input, .two input 
            {
            border:none;
            outline:none;
            background:none;
            border-bottom: 2px solid white;
            margin-left:-1px;
            color:white;
            opacity: 1;
            }
        .button input, .button a
            {
                text-decoration:none;
                border:1px solid black;
                padding:2.5%;
                font-size:15px;
                background-color:white;
                color: #202020;
            }
            .submit 
            {
                margin: 0.5% 0% 0% 1%;
            }
            a:hover, .button input:hover
            {
                background-color:#202020;
                color:white;
            }
            #train {
                width: 50%;
            }
            #train_no {
                width: 45%;
            }
            #start {
                width: 44%;
            }
            #dest {
                width: 50%;
            }
            #arrtime {
                width: 48%;
            }
            #depar {
                width: 43%;
            }
    
    </style>
</head>
<body>
<h1>EDIT TRAIN INFORMATION</h1>
<div class='one'>
<form method="post">
            <label for='train_no'>TRAIN NUMBER:</label>
            <input type='number' id='train_no' name='train_no'><br/><br>
            <div class="button">
            <INPUT TYPE="Submit" value="submit" name="submit" id="submit" class="submit">
            <a href="admintrains.php" class = "cancel"> Cancel </a></p> 
            </div>   
</form>
</div>
<br><br><br><br>

<form method="post" action="adminedit.php">
    <?php
        if (isset($_POST['submit']))
        {
            if($user = mysqli_fetch_assoc($sql_result))
            {
    ?>
    <div class = 'two'>
    <label for='train_name'>TRAIN NAME:</label>
    <input type='text' id='train' name='train' value="<?php echo $user['train_name']; ?>" ><br/><br>

    <label for='train_no'>TRAIN NUMBER:</label>
    <input type='number' id='train_no' name='train_no' value="<?php echo $user['train_number']; ?>" ><br/><br>

    <label for='start'>STARTING POINT:</label>
    <input type='text' id='start' name='start' value="<?php echo $user['starting_point']; ?>" ><br/><br>

    <label for='dest'>DESTINATION:</label>
    <input type='text' id='dest' name='dest' value="<?php echo $user['destination']; ?>" ><br/><br>
             

    <label for='arrtime'>ARRIVAL TIME:</label>
    <input type='text' id='arrtime' name='arrtime' value="<?php echo $user['arrival']; ?>" ><br/><br>

    <label for='depar'>DEPARTURE TIME:</label>
    <input type='text' id='depar' name='depar' value="<?php echo $user['departure']; ?>" ><br/><br>
    <div class="button">
            <INPUT TYPE="Submit" value="confirm" name="confirm" id="confirm" class="confirm">
            <a href="admintrains.php" class = "cancel"> Cancel </a></p> 
            </div> 
    <?php
        }
    }
    ?>
    </div>
</form>
</body>
</html>

