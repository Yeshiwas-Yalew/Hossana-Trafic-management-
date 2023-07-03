<?php
 $num=0;
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
<title>Police Accident Records Management System</title>
<style>

#txt
{
	width:250px;
	border-style:groove;
	height:40px;
	border-radius:4px;
}
#txt2
{
	width:150px;
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
table{
color:#fff;
}
table{
color:#000;
border:none;
background-color:#1e5799;
}
th{
font-size:16px;
background-color:black;
color:#fff;
}
</style>
<link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
//include("menu.php");
?>

		  <table style="background-color:#1e5799;width:100%;color:white;" ><tr><td> <img src="images/light.png" width="100px" /></td><td>
             
                 <h1>	 
				የሆሳዕና ከተማ ትራፊከ አስተዳደር ሪከርድ መቆጣጠሪያ ሲስተም <br> Hossana city administration traffic management system
                </h1>
				</td>
			
		
		<td><div style="position: relative;margin-left:25%;color:white;font-family:bold;padding-top:0%;">

<div class="loginpad">
<form action="" method="post">
<input type="date" name="dt" id="txt" placeholder="Date/Month/Year" value="
<?php if(isset($_POST["btnreg"])){ echo $_POST["dt"]; } ?> "required />
  <input type="submit" name="btnsrc" id="btn" value="SEARCH"/>
  </form>
 <h3 style="position: relative;margin-left:20%;color:yellow;font-family:bold;padding-top:0%;">Hello, <?php echo  $_SESSION['log_user'];?>  </h3>
<a style="position: relative;margin-left:40%;color:white;font-family:bold;padding-top:0%;font-family: Helvetica, Arial, sans-serif;
	font-weight: bold;" href="logout.php">Log out</a>

</div>
 </div>
 </td></tr></table>
		
		<div style="margin-left:-5%;margin-top:-1%;"><?php include'necessary/top_title.php';?> </div>
	

<div class="homecon" style="margin-top:-2%;">
<!--<div class="homesec">-->
<center>

		 
<br>
<div class="section">
<br>
<div class="loginpad">

 <table border="1" width="900" id="customers">
		<tr>
			<th>Place</th>
			<th>Date and Time</th>
			<th>Kill</th>
			<th>Wound</th>
			<th>Vehicle Type</th>
			<th>Vehicle Number</th>
			<th>Reason</th>
			<!--<th>Action</th>-->
		</tr>

			<?php
		
		$start=1;
		$limit=8;
		$query_page=mysqli_query($con,"select * from record order by r_id desc ");
		$total=mysqli_num_rows($query_page);
       if(isset($_GET['r_id']))
       {

            $start=($_GET['r_id']-1)*$limit;
       }
        else
        {
			$start=0;

		}
		if(isset($_POST['btnsrc']))
		{
	//$ph=$_POST["src"];
	
	$dt=$_POST["dt"];
	//$d."/".$m."/".$y;
	$page=ceil($total/$limit);
	 $query1="select * from record where dt like '$dt%' order by r_id desc limit $start,$limit";
	 $result1=mysqli_query($con,$query1);
	 $f=mysqli_num_rows($result1);
	 $num=$f;
	if ($num > 0) 
	 { 
	while($rows=mysqli_fetch_array($result1))
		{
?>
			<tr>
			<td><?php echo $rows['place']?></td>
			<td><?php echo $rows['dt']?></td>
			<td><?php echo $rows['kill']?></td>
			<td><?php echo $rows['wound']?></td>
			<td><?php echo $rows['v_type']?></td> 
			<td><?php echo $rows['v_number']?></td> 
			<td><?php echo $rows['reason']?></td> 
			<!--<td> <a href="reupdate.php?Serial_no=<?php echo $rows['r_id'];?>"><img src="edit.png" width="25" height="25"></a></td>-->
			</tr>
<?php
		}
	 }
	 else
	 {
		 echo "<script> alert('No Record Found');</script>";
	 }
}
?>

  </table><h1>Total Records =<?php echo $num;?> <h1/>
  </center>
  </div>
  </div>
</body>
</html>
<?php
			}
	?>