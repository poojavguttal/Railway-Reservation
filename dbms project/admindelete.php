<?php
session_start();
$conn = mysqli_connect("localhost","root","","demo");
if(!$conn){  
	echo "<script type='text/javascript'>alert('Database failed');</script>";
  	die('Could not connect: '.mysqli_connect_error());  
}
if (isset($_POST['submit']))
{
$train=$_POST['train_no'];
$query="DELETE FROM trains_display WHERE train_number = $train";

if(mysqli_query($conn, $query))
{  
    $message = "successfully deleted";
    header('Location:admintrains.php');
}
else
{  
	$message = "Could not delete"; 
}
	echo "<script type='text/javascript'>alert('$message');</script>";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>railway reservation system</title>
    <style>
      body 
        {
            background:url("train9.jpg");
        }
        h1 
        {
            text-align: center;
            text-decoration: underline;
            color: black;
            margin: 7% 0% 3% 0% ;
        }
        .train_no 
        {
            color: white;
        }
        .form_book
        {
            width:400px;
            margin: 15% 30% 0% 50%;
            transform: translate(-50%, -50%);
            border-radius:1%;
            padding:2%;
            color:#fff;
            box-sizing:border-box;
            background:rgba(0,0,0,0.6);
        }
        .button
        {
            margin: -1%;
            padding: 2%;
        }
        .button :hover
        {
            background-color: grey;
        }
        a 
        {
            text-decoration: none;
            color:black;
        }
    </style>
</head>
<body>
    <h1>DELETE TRAIN</h1>
        <form method="POST"  action="admindelete.php"  onsubmit="return validate()">
        <div class="form_book">
            <label for='train_no'>Train number:</label>
            <input type='number' id='train_no' name='train_no'><br/><br>
            <div class="button">
                <input type="submit" name="submit" value="CONFIRM" class="submit">
                <button><a href="admintrains.php">CANCEL<a></button><br><br>
            </div>
        </div>
        
    </form>
</body>
</html>