<?php
session_start();
include("connect.php");
$ctrl=$_GET['id'];
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

<div class="homecon">

	<div class="homesec">
	<center>
	<br>
	<br>
	<?php
			
		
				 $sql = "select * from record where  r_id = '$ctrl'";
									$result = mysqli_query($con, $sql);
									while($rows=mysqli_fetch_array($result))
				{ 
			$type=$rows['type'];
			$place=$rows['place'];
				$dt=$rows['dt'];
				$kill=$rows['kill'];
				$wounded=$rows['wound'];
				$v_type=$rows['v_type'];
				$plnum=$rows['v_number'];
				$reason = $rows['reason'];
					}
				?>
<div class="section"><br>
	
	<div class="loginpad">
	<form method="post" action="" method="post">	
  
  <select  name="type" required id="txt">
			<option value="<?php echo $type;?>"><?php echo $type;?></option>

				 <?php
				 $sql = "SELECT * FROM type";
									$result = mysqli_query($con, $sql);
									while($rows=mysqli_fetch_array($result))
				{ 
					  ?>
					      <option value="<?php echo $rows['type']?>"><?php echo $rows['type']?></option>
				<?php }?>
			</select>
  
<input type="text" name="place" id="txt" placeholder="Place Of Accident" value="
<?php echo $place; ?>
"required>
		<br>
		<br>
	
	<input type="date" name="dtf" id="txt" placeholder="" value="<?php echo $dt;?>"required>
		
		
		<input type="text" name="kill" id="txt" placeholder="Casualities" value="
<?php echo $kill; ?>
"required>
<br>
<br>
			<input type="text" name="wound" id="txt" placeholder="Wounded" value="
<?php echo $wounded; ?>
"required>
			<select  name="v_type" required id="txt">
			<option value="<?php echo $v_type;?>"><?php echo $v_type;?></option>

				 <?php
				 $sql = "SELECT * FROM v_type";
									$result = mysqli_query($con, $sql);
									while($rows=mysqli_fetch_array($result))
				{ 
					  ?>
					      <option value="<?php echo $rows['v_type']?>"><?php echo $rows['v_type']?></option>
				<?php }?>
			</select>
		<br>
		<br>

	
	
			<input type="text" name="v_number" id="txt" placeholder="Plate Number" value="
<?php echo $plnum; ?>
"required>
			<input type="text" name="reason" id="txt" placeholder="Reason" value="
<?php echo $reason;?>
"required>
		<br>
		<br>
		
	<button type="submit" name="btnreg" id="btn" value="Update">Update</button>
		<a class="btn btn-sm btn-secondary" name="btnreg" id="btn" href="dashboard.php">Cancel</a> 
		
		</form>
	</div>
	</div>
	</center>
	</div>

</div>
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
	$dt = $_POST["dtf"];
	$kill = validate_input($_POST["kill"]);
	$wound = validate_input($_POST["wound"]);
	$v_type = validate_input($_POST["v_type"]);
	$v_number = validate_input($_POST["v_number"]);
	$reason = validate_input($_POST["reason"]);
	if($dt="" || $type=="" || $place=="" || $dt==""|| $kill=="" || $wound=="" || $v_type=="" || $v_number=="" || $reason=="")
	{
		echo "<script> alert('All field required ok');</script>";
		return;
	}
			 
	else
	{			
	 //dt='$dt',kill='$kill',wound='$wound',v_type='$v_type',v_number='$v_number',reason='$reason',dt='".date('Y-m-d')."',
		$sql = "UPDATE record SET dt='".date('Y-m-d')."',v_type='$v_type',place='$place',wound='$wound',v_number='$v_number',reason='$reason' Where r_id='$ctrl'";
			if (mysqli_query($con, $sql))
				{
				echo "<script> alert('The record updated successfuly');</script>";
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
	