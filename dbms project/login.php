<?php
session_start();
if (isset($_POST['submit']))
{
    $conn = mysqli_connect("localhost","root","","demo");
if(!$conn){  
	echo "<script type='text/javascript'>alert('Database failed');</script>";
  	die('Could not connect: '.mysqli_connect_error());  
}
$email=$_POST['email'];
$pw=$_POST['pw'];
$id=$_POST['id'];
$sql = "SELECT * FROM login WHERE email = '$email' AND password = '$pw' AND id = '$id' ;";
$sql_result = mysqli_query ($conn, $sql) or die ('request "Could not execute SQL query" '.$sql);
        $user = mysqli_fetch_assoc($sql_result);
		if(!empty($user)){
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_password'] = $user['pw'];
            $message='Logged in successfully';
            header('Location:navigate.php');
        }
		else{
			$message = 'Wrong email or password or id.';
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
    <script src="https://kit.fontawesome.com/3cc21c4012.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
</head>

<script type="text/javascript">
	function validate()	{
		var EmailId=document.getElementById("email");
		var atpos = EmailId.value.indexOf("@");
    	var dotpos = EmailId.value.lastIndexOf(".");
		var pw=document.getElementById("pw");
		if (atpos<1 || dotpos<atpos+2 || dotpos+2>=EmailId.value.length) 
		{
        	alert("Enter valid email-ID");
			EmailId.focus();
        	return false;
   		}
   		if(pw.value.length< 8)
		{
			alert("Password consists of atleast 8 characters");
			pw.focus();
			return false;
		}
		return true;
	}
</script>
<style>
    
        body{
            padding:0%;
            margin:0%;
            max-width:100%;
            height:auto;
            font-family: sans-serif;
          background-color:wheat
            
        }
        .form_input h1{
           
           
            font-size:30px;
            color:white;
            border-bottom: 6px solid #4caf50;
            padding:10px 0;
            margin-left:5px;
            margin-right:100px;
            margin-top:40px;
            
            
            
        }
        

        .form_input{
            width:400px;
            position:absolute;
            top:50%;
            left:50%;
            transform: translate(-50%, -50%);
            border:1px solid  green;
            padding:2%;
            color:#fff;
            box-sizing:border-box;
            background:rgba(0,0,0,0.6);
           
            
        }
        
        .pw{
            width:100%;
            overflow:hidden;
            font-size:20px;
            padding:8px 0;
            margin:8px 0;
            border-bottom: 2px solid #4caf50;

        }
        .email{
            width:100%;
            overflow:hidden;
            font-size:20px;
            padding:8px 0;
            margin:8px 0;
            border-bottom: 2px solid #4caf50;
            
        }
        .id{
            width:100%;
            overflow:hidden;
            font-size:20px;
            padding:8px 0;
            margin:2px 0;
            border-bottom: 2px solid #4caf50;

        }
        .form_input i{
            width:26px;
            float:left;
            text-align:center;
            margin-left:-1px;
        }
        .form_input input{
            border:none;
            outline:none;
            background:none;
            border-bottom: 2px solid #4caf50;
            margin-left:-1px;
            color:white;
        }
        p{
            margin-left:-10px;
        }
        a{
            color:green;
        }
        .form_input .submit{
            margin-top:21%;
            font-size:25px;
           
            font-family: sans-serif;
            border:2px solid #4caf50;
            background:none;
            color:white;
            padding-left:110px;
            padding-right:100px;
            cursor:pointer;
            margin-left:30px;
            margin-right:800px;
            background:rgba(0,0,0,0.6);
            
            
            
            
        }
        .submit:hover{
            background-color:rgb(108, 167, 108);
        }
        a:hover{
            color:white;
        }
        .admin{
            float:right;
            margin-top:-50px;
            margin-left:150px;
            margin-right:20px;
        }
    
    
    
        
</style>
<body>
        
	<div id="loginarea">
    
    <form id="login" action="login.php" onsubmit="return validate()" method="POST" name="login">
    
    
        <div class="form_input">
        <h1>User Login</h1><br><br>
            <label for='id'>USER ID</label>
            <i class="fas fa-user"></i>
            <input type='number' id='id' name='id' placeholder=" Enter user-id" class="id" required><br/><br>
            <label for='email'>EMAIL</label>
            <i class="far fa-envelope"></i>
            <input type='text' id='email' name='email' placeholder=" Enter Email-id" class="email" required><br/><br>
            <label for='password'>PASSWORD</label>
            <i class="fas fa-lock"></i>
            <input type='password' id='pw' name='pw' placeholder=" Enter your password" class="pw" required><br/><br>
            <p>New User?<a href="http://localhost/dbms%20project/register.php">SIGN UP</a></p>
            <div class="admin">
            <p>Not User?<a href="adminlogin.php">Admin Login</a></p>
            </div>
            <div class="button">
            <INPUT TYPE="Submit" value="Login" name="submit" id="submit" class="submit">
        </div>
            
        </div>
        
        
          
    </form>
    
</body>
</html>