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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head runat="server">
    <title>Wachemo University/More news... </title>
    <link href="style1.css" rel="stylesheet" type="text/css" />
	<?php include'includes/mata_info.php';?>
	    <link rel="StyleSheet" href="style1.css" type="text/css" />
   <?php include'necessary/shortcut_logo.php';?></div>
<title>Accident Records Management System</title>
<link rel="stylesheet" href="styles.css" type="text/css" />
<style>
.loginpad
{
padding-left:70px;
}
table{

}
th{
font-size:16px;
background-color:black;
color:#fff;
}
</style>

</head>
<body>
<form runat="server"> 
<!--=============================== header logo pictures and Home navigation links =========================== -->
<div class="header">
            <?php include'necessary/top_header_logo_login.php';?> 
		      
           <!-- <div class="loginDisplay">
			<table><tr><td><img src="images/ethiof.gif" width="100px" /></td><td>
               [ <a href="logout.php" ID="HeadLoginStatus" runat="server">Log out</a> ]</td></tr></table>
                  
            </div>-->

            <div class="clear hideSkiplink" color=red style="font-size:1.5em;height:50%;">
                <?php include'necessary/top_title.php';?> 
				
            </div>
</div>
<!--=============================== slider =================================================================== -->
<div style="margin-top:-1.2%;">
          <?php //include'necessary/slider.php';?>
</div>
<!--=============================== Main page next to slider until the footer will appear ==================== -->

<div class="page" style="width:100%;margin-top:0.5%;min-height:auto;box-shadow:10px -10px 10px -10px;">
<!--+++++++++++++++ the internal sub-page next to main page it is colored page  ++++++++++++++++++++--->
   	       <div class="main" style="width:96%;min-height:auto;background:#E7EBF2;border-radius:1%;box-shadow:8px 4px 8px 4px #022221;">
<!---------Left side main-menu column of the internal sub-page
				<div  class="leftsidecolumn">
                    <?php //include'necessary/left_column.txt';?>
		        <div style="margin-top:0%;color:black;background: url('images/main_bg.png') repeat;box-shadow:-4px -4px 4px 8px #E7EBF2;">
			         <?php //include'necessary/yesmail_login.php';?>
		        </div>
            </div>--------->
<!--+++++++++++++++ The internal content of this home page which is the part of internal sub-page midle part of this page +++++++-->
    <div  style="margin-left:-10%;margin-bottom:1%;padding:2% 2%;width:0%;">
<?php
//include("menu.php");
?>

<div class="homecon" style="margin-left:5%;margin-bottom:1%;padding:2% 2%;">
	<div class="homesec" style="margin:5% 5%;margin-bottom:1%;padding:2% 2%;">
	<center>
	<h2>Latest Report</h2>
	<hr>
	<h4>Minor Accident</h4>
	<table border="1" width="900" style="color:#000;
border:none;
background-color:pink;">
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
		
		$start=1;
		$limit=8;
		$query_page=mysqli_query($con,"select * from record order by r_id asc ");
		$total=mysqli_num_rows($query_page);
       if(isset($_GET['r_id']))
       {

            $start=($_GET['r_id']-1)*$limit;
       }
        else
        {
			$start=0;

		}
     $page=ceil($total/$limit);
	 $query1="select * from record where type='Minor' order by r_id asc limit $start,$limit";
	 $result1=mysqli_query($con,$query1);
	 
?>
	 
        
		<?php
while($rows=mysqli_fetch_array($result1))
{
	?>
 <tr>
 	<td><?php echo $rows['r_id']?></td>
    <td><?php echo $rows['place']?></td>
    <td><?php echo $rows['dt']?></td>
	 <td><?php echo $rows['kill']?></td>
	 <td><?php echo $rows['wound']?></td>
	 <td><?php echo $rows['v_type']?></td> 
	  <td><?php echo $rows['v_number']?></td> 
	   <td><?php echo $rows['reason']?></td> 
  </tr>
<?php
	
		}
?>


<table border="1" width="900" style="color:#000;
border:none;
background-color:pink;">
<hr>
<h4>Major Accident</h4>
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
		
		$start=1;
		$limit=8;
		$query_page=mysqli_query($con,"select * from record order by r_id asc ");
		$total=mysqli_num_rows($query_page);
	       if(isset($_GET['r_id']))
	       {

		    $start=($_GET['r_id']-1)*$limit;
	       }
			else
			{
			$start=0;

		}
     $page=ceil($total/$limit);
	 $query1="select * from record where type='Major' order by r_id asc limit $start,$limit";
	 $result1=mysqli_query($con,$query1);
	 
?>
	 
        
		<?php
while($rows=mysqli_fetch_array($result1))
{
	?>
 <tr>
 	<td><?php echo $rows['r_id']?></td>
    <td><?php echo $rows['place']?></td>
    <td><?php echo $rows['dt']?></td>
	 <td><?php echo $rows['kill']?></td>
	 <td><?php echo $rows['wound']?></td>
	 <td><?php echo $rows['v_type']?></td> 
	  <td><?php echo $rows['v_number']?></td> 
	   <td><?php echo $rows['reason']?></td> 
  </tr>
<?php
			}}
	?>
	</center>
	
	</div>
	</div>
</div>          <!-- <div class="rightsidecolumn">
	                <?php //include'rightcolumn.php';?>
					<div class="clear">
                    </div>
				</div>-->
</div>
<!--===============================Footer part of/ the website which consists some external and important links and other navigation links =========================== 
<div id=footer>
     <div class="clear hideSkiplink"><?php //include"footer.txt";?></div>
</div>-->



</body>
</html>