<?php
session_start();
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
<title>Police Accident Records Management System || Register</title>
<link rel="stylesheet" href="styles.css" type="text/css" />
<style>
#txt
{
	width:250px;
	border-style:groove;
	height:40px;
	border-radius:4px;
}
#fl
{
	width:250px;
	height:40px;
	border-radius:4px;
}
#btn
{
	background-color:#1e5799;
	border-style:none;
	width:100px;
	height:30px;
	border-radius:4px;
	color:white;
}
#btn:hover{
background-color:#1e5700;
color:#000;
}
.loginpad
{
padding-left:40px;
}
</style>
</head>
<body>
<?php
include("menu.php");

?>

<br>
	<br>
	<center>
	
<div class="section"><br><br>
	
	<div class="loginpad">
	<form action="" method="post">
	<select  name="type" required id="txt">
			<option value="">Select Type</option>

				 <?php
				 $sql = "SELECT * FROM type";
									$result = mysqli_query($con, $sql);
									while($rows=mysqli_fetch_array($result))
				{ 
					  ?>
					      <option value="<?php echo $rows['type']?>"><?php echo $rows['type']?></option>
							  
				    <?php
					}
				?>
  </select>
		<input type="text" name="place" id="txt" placeholder="Place Of Accident" value="
<?php if(isset($_POST["btnreg"])){ echo $_POST["place"]; } ?>
"required>
		<br>
		<br>
	
	<input type="date" name="dt" id="txt" placeholder="Month/Date/Year Hour:m:sec: am or pm" value="
<?php if(isset($_POST["btnreg"])){ echo $_POST["dt"]; } ?>
"required>
		
		
		<input type="text" name="kill" id="txt" placeholder="Casualities" value="
<?php if(isset($_POST["btnreg"])){ echo $_POST["kill"]; } ?>
"required>
<br>
<br>
			<input type="text" name="wound" id="txt" placeholder="Wounded" value="
<?php if(isset($_POST["btnreg"])){ echo $_POST["wound"]; } ?>
"required>
			<select  name="v_type" required id="txt">
			<option value="">Select Type</option>

				 <?php
				 $sql = "SELECT * FROM v_type";
									$result = mysqli_query($con, $sql);
									while($rows=mysqli_fetch_array($result))
				{ 
					  ?>
					      <option value="<?php echo $rows['v_type']?>"><?php echo $rows['v_type']?></option>
							  
				    <?php
					}
				?>
			</select>
		<br>
		<br>
			<input type="text" name="v_number" id="txt" placeholder="Plate Number" value="
<?php if(isset($_POST["btnreg"])){ echo $_POST["v_number"]; } ?>
"required>
			<input type="text" name="reason" id="txt" placeholder="Reason" value="
<?php if(isset($_POST["btnreg"])){ echo $_POST["reason"]; } ?>
"required>
		<br>
		<br>
		
		<input type="submit" name="btnreg" id="btn" value="ADD">
		</form>
	</div>
	</div>
	</center>
	
</body>
</html>
 <?php
if(isset($_POST["btnreg"]))
{
	function validate_input($data) 
		{
  			 $data = trim($data);
  			 $data = stripslashes($data);
   			$data = htmlspecialchars($data);
   			return $data;
		}
	$type =validate_input( $_POST["type"]);
	$place = validate_input($_POST["place"]);
	$dt = validate_input($_POST["dt"]);
	$kill = validate_input($_POST["kill"]);
	$wound = validate_input($_POST["wound"]);
	$v_type = validate_input($_POST["v_type"]);
	$v_number = validate_input($_POST["v_number"]);
	$reason = validate_input($_POST["reason"]);
	if( $type=="" || $place=="" || $dt==""|| $kill=="" || $wound=="" || $v_type=="" || $v_number=="" || $reason=="")
	{
		echo "<script> alert('All field required');</script>";
		return;
	}
			 
	else
	{			
		$sql = "INSERT INTO record VALUES ('@','$type','$place','$dt','$kill','$wound','$v_type','$v_number','$reason')";
			if (mysqli_query($con, $sql))
				{
					echo "<script> alert('Successful');</script>";
				} 
			else 
				{
					echo "<script> alert('Check if the field contain special charecter, or contact an administrator');</script>";
					return;
				}
	}

		
}
?>
<?php
			}
	?>