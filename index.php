<?php
include("connect.php");
?>
<html>
<head>
<title>Accident Records Management System
</title>
<style>
body
{
background-image: url('hos1.jpg');
background-size:cover;
background-repeat:no-repeat;
background-attachment:fixed;
color:#fff;
}
#txt
{
	width:250px;
	border-style:groove;
	height:30px;
	border-radius:4px;
}
a{
	color: white;
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
padding-left:20px;
}
</style>
<link rel="stylesheet" href="styles.css" type="text/css" />
</head>
 
<body style="background-image: url('hos2.jpg');">
<center>

  <div class="title">
		  <table><tr><td> <img src="images/light.png" width="100px" /></td><td>
             
                 <h1>	 
				የሆሳዕና ከተማ ትራፊከ አስተዳደር ሪከርድ መቆጣጠሪያ ሲስተም <br> Hossana city administration traffic management system
                </h1>
				</td>
			
		<td><img src="images/ethiof.gif" width="100px" /></td></tr></table>
		</div>
<hr>
<center>
	<br>
	
  <div class="container" >
  <br>
	<br>
	<br><div class="section" style="width:300px;margin-left:10%;"><br>
		
	<div class="loginpad">
	<br>

	<form action="" method="post" >
	<h1 style="color:Black;margin-top:-10%;">LogIn into Account</h1>
		<input type="text" name="user" id="txt" placeholder="Username" required>
		<br>
		<br>
		<input type="Password" id="txt" name="pwd" placeholder="Password" required>
		<br>
		<br>
		<input type="submit" name="btnlogin" id="btn" value="Login">
		
		 <a href="contact.html">
		 <input  name="btnlogin" id="btn" value="Contact">
			</a>
			
			<div><a style="color:Black;margin-top:-10%;">forget password</a></div>
		</form>
	</div>
	
		
	</center>
	
	</div>
  </div>
  

              
             
             
 
</center>
 <?php
if(isset($_POST["btnlogin"]))
{
function validate_input($data) 
		{
  			 $data = trim($data);
  			 $data = stripslashes($data);
   			$data = htmlspecialchars($data);
   			return $data;
		}
			$uname = validate_input($_POST["user"]);
			$pwd = validate_input($_POST["pwd"]);
		if($uname =="" || $pwd=="")
		{
			echo "<script> alert('Please Fill The required Field!');</script>";
			return;
		}
		else
		{
			$sql = "SELECT * FROM admin where ad_username='$uname' and ad_password='$pwd'";
					$result = mysqli_query($con, $sql);
					
					if (mysqli_num_rows($result) > 0) 
					{if($rows=mysqli_fetch_array($result))
						{	if($rows['Status']=="Inactive" || $rows['Status']=="InActive" ||$rows['Status']=="inactive" ||$rows['Status']=="INACTIVE" ||$rows['Status']=="INactive")
							{
								echo "<script> alert('Dear user, Your account status has been blocked pls contact your system admin!');</script>";
							return;
							}
					else{
					session_start();
						
                        $_SESSION['Acc_Type']=$rows['Acc_Type'];
   					
						$_SESSION['log_user']=$uname;
						
						setcookie('user_n',$uname,time() + 86400*30,'/');
						setcookie('user_p',$pwd,time() + 86400*30,'/');
						header("location:dashboard.php");
						}
						}
					} 
					else
					{  				
						echo "<script> alert('Invalid Username or Password!');</script>";
						return;
					}		
}
}
?>
</body>
</html>