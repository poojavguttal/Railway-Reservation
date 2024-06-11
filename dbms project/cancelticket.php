<?php
session_start();
$conn = mysqli_connect("localhost","root","","demo");
if(!$conn){  
	echo "<script type='text/javascript'>alert('Database failed');</script>";
  	die('Could not connect: '.mysqli_connect_error());  
}
if (isset($_POST['submit']))
{
$adhar=$_POST['adhar'];
$query="DELETE FROM train_booked WHERE adhar = $adhar";

if(mysqli_query($conn, $query))
{  
    $message = "ticket cancelled sucessfully";
    
}
else
{  
	$message = "Could not cancel ticket"; 
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
        background-image: url('train5.jpg');
    }
    .form_book
    {
        border: 1px solid black;
        width:30%;
        margin:auto;
        padding:20px;
        box-sizing:border-box;
        background:rgba(0,0,0,0.4);
        margin-top:240px;
    }
    label{
        color:#fff;
        font-size:150%;
    }
    .form_book input{
        border:none;
            outline:none;
            background:none;
            border-bottom: 2px solid #283747;
            margin-left:-1px;
            color:white;
            margin-top:30px;
    }
        h1
        {
            text-align: center;
           color:#fff;
        }
        .submit{
            margin-top:1%;
            font-size:25px;
           
            font-family: sans-serif;
            border:2px solid #283747;
            background:none;
            color:white;
            padding-left:50px;
            padding-right:50px;
            cursor:pointer;
            margin-left:540px;
            margin-right:800px;
            background-color:#283747;
            position:fixed;
            
            
            
            
        }
        .submit:hover{
            background-color:#fff;
            color:black;
        }
        a{
            text-decoration:none;
            border:1px solid #283747;
            color:#fff;
            margin-left:52%;
            background-color:#283747;
           padding-left:60px;
           padding-right:60px;
           padding-top:5px;
            padding-bottom:5px;
          font-size:25px;
        }
        a:hover{
            background-color:#fff;
            color:black;
        }

    </style>
</head>
<body>
   
        <form method="POST"  action="cancelticket.php" name="bookticket" onsubmit="return validate()">
        
        <div class="form_book">
        <h1>CANCEL TICKETS</h1>
            <label for='adhar'>Adhar number:</label>
            <input type='number' id='adhar' name='adhar' placeholder=" Enter your adhar" class="adhar" value="<?php echo $_SESSION['user_adhar']; ?>" required><br/><br>
        </div>
       
            <input type="submit" name="submit" value="CONFIRM" class="submit"><br>
            <a href="navigate.php">Home<a>

    </form>
</body>
</html>