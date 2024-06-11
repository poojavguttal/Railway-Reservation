<?php
session_start();
if (isset($_POST['submit']))
{
$conn = mysqli_connect("localhost","root","","demo");
if(!$conn){  
	echo "<script type='text/javascript'>alert('Database failed');</script>";
  	die('Could not connect: '.mysqli_connect_error());  
}

$adhar=$_POST['adhar'];
$query="SELECT train_booked.name, train_booked.age, train_booked.gender, train_booked.adhar, train_booked.phone, 
train_booked.train, login.email FROM login JOIN train_booked ON login.id = train_booked.user_id  WHERE adhar = $adhar";
$result=mysqli_query($conn,$query) or die(mysqli_error($conn));
 
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
        background:rgba(0,0,0,0.5);
        
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
    }
        h1
        {
            text-align: center;
        }
        .button
        {
            margin: 0px 0px 0px 300px;
            padding: 3px;
        }
        .button :hover
        {
            background-color: rgb(23, 252, 23);
        }
        tr:hover{
            opacity: 1;
        }
        table 
        {
            width: 100%;
            margin-bottom: 1rem;
            
            border: 1px solid black;
            margin-top: 3%;
            
        }
        th, td
        {
            border: 1px solid black;
            height: 76px;
          
        }
        th
        {
            background-color:#283747;
            color:#fff;
           
        }
        td
        {
            text-align: center;
        }
        
        tbody tr:nth-of-type(even)
        {
            background-color:rgb(177, 176, 177);
        }
        tbody tr:nth-of-type(odd)
        {
            background-color: rgb(255, 252,247);
        }
        tbody tr:hover
        {
            color: #212529;
            background-color:hsl(300, 22%, 96%) ;
            visibility: 10%;
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
<h1>VIEW TICKETS</h1>
        <form method="POST" action="ticket1.php" name="bookticket" onsubmit="return validate()">
        <div class="form_book">
        
            <label for='adhar'>Adhar:</label>
            <input type='number' id='adhar' name='adhar' placeholder=" Enter your adhar number" class="adhar" value="<?php echo $_SESSION['user_adhar']; ?>" required><br/><br>
            
        </div>
        <input type="submit" name="submit" value="CONFIRM" class="submit"><br>
        <a href="navigate.php">HOME</a>    
            
    </form>
    <table class="cal">
      <thead>
        <tr>
			<th>NAME</th>
			<th>AGE</th>
			<th>GENDER</th>
			<th>ADHAR NUMBER</th>
			<th>PHONE</th>
			<th>TRAIN BOOKED</th>
            <th>EMAIL</th>
        </tr>
	  </thead>
	    <tbody>
		<tr>
        <?php
        if (isset($_POST['submit']))
        {
            if($rows=mysqli_fetch_assoc($result))
            {
        ?>
			<td><?php echo $rows['name']; ?></td>
			<td><?php echo $rows['age']; ?></td>
			<td><?php echo $rows['gender']; ?></td>
			<td><?php echo $rows['adhar']; ?></td>
			<td><?php echo $rows['phone']; ?></td>
            <td><?php echo $rows['train']; ?></td>
            <td><?php echo $rows['email']; ?></td>
        <?php
            $message = "ticket found";
            }
            else
            {  
                $message = "Could  not find the ticket. Please book a ticket"; 
            }
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
        
        ?>
        
        </tr>
	    </tbody>
    </table>
</body>
</html>