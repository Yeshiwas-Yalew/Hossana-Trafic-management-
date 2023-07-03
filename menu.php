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

<div>
<!--
<ul>
<li><a href="help1.php">Help</a></li>
<li><a href="home.php">Home</a></li>
<li><a href="addnew.php">Add New</a></li>
<li><a href="">Search</a>
<ul>
<li><a href="search.php">Simple Search</a></li>
<li><a href="a_search.php">AdvanceSearch</a></li>
</ul>
</li>
<li><a href="delete1.php">Delete</a></li>
<li><a href="logout.php">Logout</a></li>
<li><a href="allacc.php">All Accident</a></li>

</ul>-->

		  <table style="background-color:#1e5799;width:100%;color:white;" ><tr><td> <img src="images/light.png" width="100px" /></td><td>
             
                 <h1  style="color:white;">	 
				የሆሳዕና ከተማ ትራፊከ አስተዳደር ሪከርድ መቆጣጠሪያ ሲስተም <br> Hossana city administration traffic management system
                </h1>
				</td>
			
		
		<td><div style="position: relative;margin-left:25%;color:white;font-family:bold;padding-top:0%;">

<div class="loginpad">
<form name="search" method="post" action="search.php">
 <input type="text" name="src" id="txt" placeholder="Type First Letter of the place" required style="background: url('images/b_search.png') no-repeat right;">
  <input type="submit" name="btnsrc" id="btn" value="Search by place"/>
  </form>
 <h3 style="position: relative;margin-left:5%;color:yellow;font-family:bold;padding-top:0%;">Hello, <?php echo  $_SESSION['log_user'];?> ( <?php echo $_SESSION['Acc_Type'];?> ) </h3>
<a style="position: relative;margin-left:40%;color:white;font-family:bold;padding-top:0%;font-family: Helvetica, Arial, sans-serif;
	font-weight: bold;" href="logout.php">Log out</a>

</div>
 </div>
 </td></tr></table>
		<div style="margin-left:-5%;margin-top:-1%;">
			<?php if(($_SESSION['Acc_Type']=="Admin"))
				    echo include'necessary/top_title_admin.php';
              	else
		           echo include'necessary/top_title.php';?>
</div>
</div>
</body>
</html>
