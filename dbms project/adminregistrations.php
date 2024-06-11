<?php
session_start();
$conn = mysqli_connect("localhost","root","","demo");
if(!$conn)
{  
    echo "<script type='text/javascript'>alert('Database failed');</script>";
    die('Could not connect: '.mysqli_connect_error());  
}
$query="CALL `addlogs`();";
$result=mysqli_query($conn,$query) or die(mysqli_error($conn));

?>



















<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>PASSENGER REGISTRATION</title>
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
          margin: 1% 0% 3% 0% ;
        }
        table
        {
          width: 100%;
          margin-bottom: 1%;
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
          padding:0.5% 4% 0.5% 4%;
          font-size:20px;
          background-color:#283747;
          color:white;
          border-radius:3%;
          width: 40%;
          margin: 5% 5% 5% 0%;
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
    <caption><h1>PASSENGER REGISTER</h1></caption>
      <thead>
        <tr>
			<th>SL_no</th>
			<th>USER ID</th>
      <th>E-MAIL</th>
			<th>STATUS</th>
      <th>DATE AND TIME</th>
        </tr>
      </thead>
	  <tbody>
        <?php
        while($rows=mysqli_fetch_assoc($result))
        {
        ?>
        
        <tr>
			<td><?php echo $rows['sl_no']; ?></td>
			<td><?php echo $rows['login_id']; ?></td>
			<td><?php echo $rows['email']; ?></td>
			<td><?php echo $rows['action']; ?></td>
			<td><?php echo $rows['cdate']; ?></td>
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