<?php
include("connect2.php");
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
</head>
<body>
<form runat="server"> 
<!--=============================== header logo pictures and Home navigation links =========================== -->
<div class="header">
            <?php //include'necessary/top_header_logo.php';?> 
		      <div class="title">
		  <table><tr><td> <img src="images/light.png" width="100px" /></td><td>
             
                 <h1>	 
				የሆሳዕና ከተማ ትራፊከ አስተዳደር ሪከርድ መቆጣጠሪያ ሲስተም <br> Hossana city administration traffic management system
                </h1>
				</td></tr></table>
				</div>
            <div class="loginDisplay">
			<table><tr><td><img src="images/ethiof.gif" width="100px" /></td><td>
               [ <a href="index1.php" ID="HeadLoginStatus" runat="server">Log In</a> ]</td></tr></table>
                  
            </div>
 
            <div class="clear hideSkiplink" color=red style="font-size:1.5em;height:50%;">
                <?php include'necessary/top_title_index.php';?> 
            </div>
</div>
<!--=============================== slider =================================================================== -->
<div style="margin-top:-1.2%;">
            <?php //include'necessary/slider.php';?>
</div>
<!--=============================== Main page next to slider until the footer will appear ==================== -->

<div class="page" style="width:100%;margin-top:0.5%;min-height:1080px;box-shadow:10px -10px 10px -10px;">
<!--+++++++++++++++ the internal sub-page next to main page it is colored page  ++++++++++++++++++++--->
   	       <div class="main" style="width:96%;min-height:1080px;background:#E7EBF2;border-radius:1%;box-shadow:8px 4px 8px 4px #022221;">
<!---------Left side main-menu column of the internal sub-page--------->
				<div  class="leftsidecolumn">
                    <?php include'necessary/left_column.txt';?>
		        <div style="margin-top:0%;color:black;background: url('images/main_bg.png') repeat;box-shadow:-4px -4px 4px 8px #E7EBF2;">
			         <?php include'necessary/yesmail_login.php';?>
		        </div>
            </div>
<!--+++++++++++++++ The internal content of this home page which is the part of internal sub-page midle part of this page +++++++-->
    <div  style="margin-left:15.5%;margin-bottom:1%;padding:2% 2%;width:65%;">
		 <?php
if(isset($_REQUEST['submit']))
 {
include'necessary/serch.php';
 }
 else
 {
	 
	$count=0;
/*$con = mysql_connect("localhost","root","");

if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("datvet", $con);*/

$sql="SELECT  * FROM news ORDER BY date DESC";
$result = mysqli_query($con,$sql);
$x=mysqli_num_rows($result);
echo"<table>";
while($row=mysqli_fetch_array($result))
  {
	  if($x%2==0)
	  {
echo"<tr><td><div class=new><div><font  size=5 color=blue><b><i style=font-family:Monotype;> ".$row['title']."</i> </b></font> </div>"; 
echo "<table><tr><td rowspan=3><img src=images/".$row['picture']." width=98 height=100></td><td><span style=margin-left:65%;><u> Posted date :-  <img src=images/b_calendar.png>  ".$row['date']."/".$row['month']."/".$row['year']."</u></span></td></tr><tr><td><p style=margin-top:25px;margin-right:23%;width:90%;font-family:Monotype;text-align:justify;><font  size=3;>".$row['first_content']."<span style=margin-left:50px;><font color=blue><a href=more_news.php?id=".$row['id'].">Read_more...</a></font></span></font></p></td></tr>";
echo"</table>";

	  }
	  else
	  {
		echo"<tr><div style=width:31%; float:left;><td><div class=news tyle=width:31%;float:right;><div><font  size=5 color=blue><b><i style=font-family:Monotype;> ".$row['title']."</i> </b></font> </div>"; 
echo "<table><tr><td rowspan=3><img src=images/".$row['picture']." width=98 height=100></td><td><span style=margin-left:65%;><u> Posted date :-  <img src=images/b_calendar.png>  ".$row['date']."/".$row['month']."/".$row['year']."</u></span></td></tr><tr><td><p style=margin-top:25px;margin-right:23%;width:90%;font-family:Monotype;text-align:justify;><font  size=3;>".$row['first_content']."<span style=margin-left:50px;><font color=blue><a href=more_news.php?id=".$row['id'].">Read_more...</a></font></span></font></p></td></tr>";
echo"</table>";

	  }
$count++;
  }
  echo"</table>";
  if($count==0)
 include 'includes/about.txt';
mysqli_close($con);
 }
?>

</div>
<!---++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++----->
            </div>
	<!---------The right side Event and announcements column of the internal sub-page--------->
	            <div class="rightsidecolumn">
	                <?php include'rightcolumn.php';?>
					<div class="clear">
                    </div>
				</div>
</div>
<!--===============================Footer part of the website which consists some external and important links and other navigation links =========================== -->
<div id=footer>
     <div class="clear hideSkiplink"><?php include"footer.txt";?></div>
</div>
</form>
</body>
</html>

