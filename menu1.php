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
<link href="style1.css" rel="stylesheet" type="text/css" />
	
	    <link rel="StyleSheet" href="style1.css" type="text/css" />

<link rel="stylesheet" href="styles.css" type="text/css" />
</head>
<body>
<div class="header">
            <?php include'necessary/top_header_logo_login.php';?> 
		      
    
            <div class="clear hideSkiplink" color=red style="font-size:1.5em;height:50%;">
                <?php include'necessary/top_title.php';?> 
				
            </div>
</div>

</body>
</html>
