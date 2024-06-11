<?php
session_start();
$conn = mysqli_connect("localhost","root","","demo");
if(!$conn)
{  
    echo "<script type='text/javascript'>alert('Database failed');</script>";
    die('Could not connect: '.mysqli_connect_error());  
}
$query="SELECT train_booked.name, train_booked.age, train_booked.gender, train_booked.adhar, train_booked.phone, 
train_booked.train, login.email FROM login JOIN train_booked ON login.id = train_booked.user_id ";
$result=mysqli_query($conn,$query) or die(mysqli_error($conn));
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>BOOKINGS DISPLAY</title>
    <link rel="stylesheet" href="style.css">
<style>
  body
  {
            
    background-image: url('train5.jpg');
  }
        
  h1
  {
    color:black;
    text-align: center;
    text-decoration: underline;
    margin: 4% 0% 2% 0% ;
  }
       
  table
  {
    width: 100%;
    border: 1px solid black;
  }
  th, td
  {
    border: 1px solid black;
    height: 60px;
    color: white;
  }
  th
  {
    /*background-color:rgb(177, 176, 177);*/
    background-color:#283747;
    color: white;
  }
  td
  {
    text-align: center;
  }
  tr:hover
  {
    opacity: 1;
  }
  tbody tr:nth-of-type(even)
  {
    background:rgba(0,0,0,0.6);
  }
  tbody tr:nth-of-type(odd)
  {
    background:rgba(0,0,0,0.6);
  }
  tbody tr:hover
  {
    visibility: 10%;
  }
  a
  {
    text-decoration:none;
    border:1px solid black;
    padding:0.5% 7% 0.5% 7%;
    font-size:20px;
    background-color:#283747;
    color:white;
    border-radius:3%;
    width: 40%;
    margin: 5% 0% 5% 0%;           
  }
  a:hover
  {
    background-color:grey;
  }
  </style>
  </head>
  <body>
  <div class="bor">
    <table class="cal">
      <h1>PASSENGER BOOKINGS</h1>
      <thead>
        <tr>
			      <th>NAME</th>
            <th>AGE</th>
            <th>GENDER</th>
			      <th>ADHAR</th>
			      <th>PHONE</th>
			      <th>TRAIN BOOKED</th>
            <th>EMAIL</th>
        </tr>
      </thead>
	  <tbody>
        <?php
        while($rows=mysqli_fetch_assoc($result))
        {
        ?>
        
        <tr>
			
			<td><?php echo $rows['name']; ?></td>
			<td><?php echo $rows['age']; ?></td>
			<td><?php echo $rows['gender']; ?></td>
			<td><?php echo $rows['adhar']; ?></td>
      <td><?php echo $rows['phone']; ?></td>
      <td><?php echo $rows['train']; ?></td>
      <td><?php echo $rows['email']; ?></td>
		</tr>
    <?php
        }
    ?>	
	  </tbody>
    </table><br><br>
    <a href="adminnavigation.php">Home</a>
    </div>
    
  </body>
</html>