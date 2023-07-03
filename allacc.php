<?php
session_start();
$num=0;
include("connect.php");
if(!(isset($_SESSION['log_user'])))
			{
				header("location:check.php");
			}
			else
			{	
$user_name=$_SESSION['log_user'];

					?>	
<html>
<head>
<title>Accident Records Management System</title>
<link rel="stylesheet" href="styles.css" type="text/css" />
<style>
.loginpad
{
padding-left:70px;
}
table{
color:#000;
border:none;
background-color:pink;
}
th{
font-size:16px;
background-color:black;
color:#fff;
}
</style>
</head>
<body style="background-color:darkbrown;
background-size:cover;
background-repeat:no-repeat;
background-attachment:fixed;
color:#fff;">
<?php 
include("menu.php");
?>
<?php
//$sql = "CALL allacc()";
$result = $con->query($sql);
?>
<div class="homecon" style="margin-top:-12%;margin-left:-1%;">
	<!--<div class="homesec">-->
	<center>
	<h2>Latest Report</h2>
	<hr>
	<h4>All Accident</h4>
	<table border="1" width="100%">
		<tr>
			<th>R_ID</th>
			<th>Place</th>
			<th>Date and Time</th>
			<th>Kill</th>
			<th>Wound</th>
			<th>Vehicle Type</th>
			<th>Vehicle Number</th>
			<th>Reason</th>
		</tr>

	<?php
                $sql = "SELECT * FROM record";
                $result = $con->query($sql);
					 
	 $num=$result-> num_rows ;
      if($result-> num_rows > 0)
	  {
        while($row = $result->fetch_assoc())
		{
          ?>
          <tbody>
     <tr>
      <td><?php echo $row['r_id']?></td>
    <td><?php echo $row['place']?></td>
    <td><?php echo $row['dt']?></td>
	 <td><?php echo $row['kill']?></td>
	 <td><?php echo $row['wound']?></td>
	 <td><?php echo $row['v_type']?></td> 
	  <td><?php echo $row['v_number']?></td> 
	   <td><?php echo $row['reason']?></td> 
        </tr>
          <?php
        }
      }
      else{
        ?>
        
        <tr>
          <th colspan="2">There's no data found!!!</th>
        </tr>
        <tr>
        	<?php
  
    }
?>
</tbody>
</table>

<?php
	
		}
?>
<h1>Total Number of Records =<?php echo $num;?> <h1/>	</center>
	</div>
</div>
</body>
</html>
