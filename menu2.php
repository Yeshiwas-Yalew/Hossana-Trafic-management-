<?php
include("connect.php");	
$user_name=$_SESSION['log_user'];
$sql = "SELECT * FROM admin where ad_username='$user_name'";
					$result = mysqli_query($con, $sql);
					$rows=mysqli_fetch_assoc($result);
					$name=$rows["ad_username"];
					?>
<html>
<head>
<link rel="stylesheet" href="styles.css" type="text/css" />
</head>
<body>
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
  <input type="submit" name="btnsrc" id="btn" value="Search by date"/>
  </form>
 <h3 style="position: relative;margin-left:20%;color:yellow;font-family:bold;padding-top:0%;">Hello, <?php echo  $_SESSION['log_user'];?>  </h3>
<a style="position: relative;margin-left:40%;color:white;font-family:bold;padding-top:0%;font-family: Helvetica, Arial, sans-serif;
	font-weight: bold;" href="logout.php">Log out</a>

</div>
 </div>
 </td></tr></table> 
		
		<div style="margin-left:-5%;margin-top:-1%;"><?php include'necessary/top_title.php';?> </div>
	

</body>
</html>
