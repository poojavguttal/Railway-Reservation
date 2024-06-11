<?php
session_start();

$conn = mysqli_connect("localhost","root","","demo");
if(!$conn){  
	echo "<script type='text/javascript'>alert('Database failed');</script>";
  	die('Could not connect: '.mysqli_connect_error());  
}
if ($_SESSION['user_email']){
    echo '<p style="padding:0.5%;color:white;background-color:#4caf50;width:30%;text-align:center;">'." BOOK TICKETS HERE  " . $_SESSION['user_email'];
    }
    else{
        header('Location:login.php');
    }
if (isset($_POST['submit']))
{
   


$train=$_POST['train'];
$name=$_POST['name'];
$age=$_POST['age'];
$phone=$_POST['phone'];
$gender=$_POST['gender'];
$adhar=$_POST['adhar'];
$user_id=$_POST['id'];
$_SESSION['user_adhar'] = $adhar;


$sql = "INSERT INTO train_booked (name, age, gender, adhar, phone, train, user_id) VALUES ('$name', '$age',  '$gender', '$adhar', '$phone', '$train', '$user_id');";
if(mysqli_query($conn, $sql))
{  
    
            $message = "ticket booked sucessfully";
            header('Location:ticket1.php');
          
}
else
{  
    $message = "Could not insert record";
     
}
echo "<script type='text/javascript'>alert('$message');</script>";	
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>railway reservation system</title>
    <script src="https://kit.fontawesome.com/3cc21c4012.js" crossorigin="anonymous"></script>
</head>
<body>


    <form method="POST"  action="booking.php" name="bookticket" onsubmit="return validate()">
        <div class="form_book">
        
            <label  for='train'><i class="fas fa-train"></i>    Train:</label><br><!--dropdown-->
                <select id="train" name="train" class="train" >
                    <option selected disabled>--------Select trains here--------</option>
                    <option value="Rajdhani Express">Rajdhani Express</option>
                    <option value="Duron Express">Duron Express</option>
                    <option value="Geeta Express">Geeta Express</option>
                    <option value="Garib rath">Garib rath</option>
                    <option value="Mysore Express">Mysore Express</option>
            </select><br><br>
        <div class="bor">
        <label  for='user_id' ><i class="fas fa-id-card-alt"></i> User_id:</label><br>
            <input type='number' id='id' name='id'  class="id"  placeholder=" Enter user id" value="<?php echo $_SESSION['user_id']; ?>" required><br/><br>

            <label for='name'><i class="fas fa-user-check"></i> Name:</label><br>
            <input type='text' id='name' name='name' placeholder=" Enter your name"  class="name" required><br/><br>

            <label for='age'>Age:</label><br>
            <input type='number' id='age' name='age' placeholder=" Enter your age" class="age" required><br/><br>

            <label for='gender'><i class="fas fa-venus-mars"></i>  Gender:</label><br>
            <input type='text' id='gender' name='gender' placeholder=" Enter your gender" class="gender" required><br/><br>
             

            <label for='adhar'><i class="far fa-sticky-note"></i>  Adhar number:</label><br>
            <input type='text' id='adhar' name='adhar' placeholder=" Enter your adhar" class="adhar" required><br/><br>

            <label for='phone'><i class="fas fa-phone"></i>  Phone Number:</label><br>
            <input type='text' id='phone' name='phone' placeholder=" Enter your phone number" class="phone" required><br/><br>

            <div class="button">
            <input type="submit" name="submit" value="Confirm Booking" class="submit">
        </div>
        </div>
        </div>
<style>
    body{
            padding:0%;
            margin:0%;
            max-width:100%;
            height:auto;
            font-family: sans-serif;
            background:url("train6.jpg");
            
        }
         h1{
           
            border:1px solid #4caf50;
            font-size:30px;
            color:white;
            
            margin-right:1300px;
            margin-left:1%;
            }
            



        .form_book{
           
            border:1px solid #4caf50;
            width:500px;
           
            padding-bottom:4.5%;
            margin-left:35%;
            margin-top:-1%;
            color:#fff;
            
            background:rgba(0,0,0,0.6);
        }
        .form_book input{
            border:none;
            outline:none;
            background:none;
            border-bottom: 2px solid #4caf50;
            margin-left:10%;
            color:white;
        }
        
        

        
        .form_book .submit{
            margin-top:1%;
            font-size:25px;
           
            font-family: sans-serif;
            border:2px solid #4caf50;
            background:none;
            color:white;
            padding-left:110px;
            padding-right:100px;
            cursor:pointer;
            margin-left:45px;
            margin-right:800px;
            background:rgba(0,0,0,0.6);
            position:fixed;
            
            
            
            
        }
        .submit:hover{
            background-color:rgb(108, 167, 108);
        }
        
        
        label{
            margin-left:11%;
            text:bold;
            font-size:130%;
            margin-top:1%;
           
        }
            .name{
                
            width:80%;
            overflow:hidden;
            font-size:20px;
            padding:5px 0;
            margin:5px 0;
            border-bottom: 2px solid #4caf50;
            margin-left:17%;
           
            

            
            }
            .age{
                width:80%;
            overflow:hidden;
            font-size:20px;
            padding:5px 0;
            margin:5px 0;
            border-bottom: 2px solid #4caf50;
            margin-left:17%;

            }
            .adhar{
                width:80%;
            overflow:hidden;
            font-size:20px;
            padding:5px 0;
            margin:5px 0;

            border-bottom: 2px solid #4caf50;
            margin-left:17%;
            }

            .phone{
                
                width:80%;
            overflow:hidden;
            font-size:20px;
            padding:5px 0;
            margin:5px 0;
            border-bottom: 2px solid #4caf50;
            margin-left:17%;
            
 
            }
            .train{
                width:80%;
            overflow:hidden;
            font-size:20px;
            padding:5px 0;
            margin:5px 0;
           margin-left:17%;
            outline:none;
            border:none;
            background:none;
            border-bottom: 2px solid #4caf50;
            margin-left:10%;
            color:white;
            
            
            
            
           

            }
            .gender{
                width:80%;
            overflow:hidden;
            font-size:20px;
            padding:5px 0;
            margin:5px 0;
            border-bottom: 2px solid #4caf50;
            margin-left:17%;

            }
            .id{
                width:80%;
            overflow:hidden;
            font-size:20px;
            padding:5px 0;
            margin:5px 0;
            border-bottom: 2px solid #4caf50;
            margin-left:17%;

            }
            option{
                background:black;
                
            }
        </style>
    </form>
</body>
</html>
    