 <div><u></u>
 <?php echo"<div>"; 
 ?>
 
<!-- ===============================================    Events And Announcement===========================================-->
 <?php $count=0;
//=========================================================================================================
$con = mysqli_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysqli_select_db($con,"datvet");
$sql="SELECT  * FROM announcements";
$result = mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result))
  {
if($row['duration']>=1)
{
$count++;
}
//==================================================== Check announcements  Expire date===============================================
if(date('m')>=$row['month'])
{
if(date('d')>=$row['day'])
$rk=date('d')-$row['day'];
else
$rk=$row['day']-date('d');
}
if($rk<0)
$rk= -1*$rk;
if($rk>=$row['duration'])
{
$count++;
$D=date('d');
$M=date('m');
$Y=date('20y');
//mysql_query("INSERT INTO expired_news_repostory(date,month,year,first_content,content,title,count,duration,picture) VALUES('$D','$M','$Y','$row[first_content]','$row[content]','$row[title]','$count','$row[duration]','$row[picture]')");
mysql_query("DELETE FROM  search_engine where  Id ='$row[A_ID]'");
	

}
}
if($count!=0)
echo"<div class=titleSide style=margin-left:0.2%;border-radius:6px;>Events & Announcements </div>";  
else
echo"<div class=titleSide style=margin-left:0.1%;border-radius:6px;height:25%;>University's Mission and Vision</div>";  

 ?>


  
<?php
if($count==0)
{?><div style="height:405px;margin-top:-10px;background: url('images/back.png') repeat;border-radius:10px;">
<?php
	echo"<div style=margin-left:-6%;><ul><h1 ><font color=green><b><u>Vision</u></b></font></h1>
	<p style=width:100%;><font color=green size=2.5+>Wachemo University aspires to be a center of excellence in East Africa by 2020 G.C.</font></p></ul>
	<ul><h1><font color=yellow size=3.5+><b><u>Mission</b></u></font></h1>
<p style=width:100%;><font color=red size=2.8+>WCU is commited to provide quality education and training to produce eduated manpower who attain fullest potential intellectually ,ethically,morally and socially equip them 
with critical,analytical and imaginative skills.</font></p></ul></div>";
}else
{?>
<marquee direction="up" scrolldelay="300" Onmouseover="this.stop();" onmouseout="this.start();" speed="2" color=white style="height:318px;background: url('images/main_bg.png') repeat;border-radius:8px;"> 
  <div>
<?php      
$count=0;
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("datvet", $con);
$sql="SELECT  * FROM announcements order by day";
$result = mysql_query($sql,$con);
 while($row=mysql_fetch_array($result))
  {
 if(date('d')==$row['day'])
 $count++;
 }
 mysql_close($con);
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("datvet", $con);
$sql="SELECT  * FROM announcements";
$result = mysql_query($sql,$con);
while($row=mysql_fetch_array($result))
  {
if($row['duration']>=1)
{
echo "<br>&nbsp;&nbsp;<u><font color=red size=5 style=margin-left:3%;margin-right:3%;>".$row['title']."</font></u>";
echo"<div style=margin-left:5%;margin-right:5%;>".$row['first_content']." for more click next word&nbsp;&nbsp;&nbsp;<u><a href=download/".$row['attachement'].">".$row['attachement']."</a></u></p></div>";
if($row['month']=="9")
$month="September";
if($row['month']=="10")
$month="October";
if($row['month']=="11")
$month="November";
if($row['month']=="12")
$month="December";
if($row['month']=="1")
$month="January";
if($row['month']=="2")
$month="Feburary";
if($row['month']=="3")
$month="March";
if($row['month']=="4")
$month="April";
if($row['month']=="5")
$month="May";
if($row['month']=="6")
$month="Jun";
if($row['month']=="7")
$month="July";
if($row['month']=="8")
$month="Aguast";
echo"<br>";

echo "<font color=blue style=margin-left:2%;>Last updation :-".$month."   ".$row['day']."   &nbsp;   ".$row['year']." E.C<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ".$row['hour'].":".$row['minut']."&nbsp;&nbsp;&nbsp;local time</font><font color=blue style=margin-left:85px;><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>Hossana , Ethiopia</u></font>";
echo"<hr style=margin-left:20%;width:70%; >";
echo"</p>";

$count++;
  }
}
mysql_close($con);
	
}?>
	</div>
</marquee>
	
	<hr>
	</div> <div> <!-- ===============================================    Number of Comments===========================================-->
		  
<?php 
$count=0;
echo"<div class=titleSide style=margin-top:-8px;border-radius:5px;>N<u>o</u> of Today's Comment </div>";  
?>
<div style="padding-left:2px; ">
<?php 
$count=0;
$a=0;
$b=0;
$con = mysqli_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysqli_select_db($con,"datvet");
$sql1="SELECT  * FROM  inbox_message";
$result1 = mysqli_query($con,$sql1);
 while($row1=mysqli_fetch_array($result1))
 {
if(date('d')==$row1['day'] && date('m')==$row1['month']&& date('20y')==$row1['year'])
 {
 if($row1['email_to']=="yeshiwas2013@yesmail.revenue")
 $a++;
 }
 }
$sql="SELECT  * FROM comment";
$result = mysqli_query($con,$sql);
 while($row=mysqli_fetch_array($result))
  {
if(date('d')==$row['date'] && date('m')==$row['month']&& date('20y')==$row['year'])
 {
 $b++;
 }
 }
 mysqli_close($con);
 $count=$a+$b;
$con = mysqli_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }
mysqli_select_db($con,"datvet");
$sql="SELECT  * FROM comment";
$result = mysqli_query($con,$sql);
if($count==0)
{
echo"<div  style=margin-top:-2px;width:200px;margin-left:20px;>Today Their is no comment</div><br>"; 
}
else if($a!=0&&$b==0)
{
echo"<div  style=margin-top:-2px;width:200px;margin-left:20px;>Today  Only <font size=+1 color=red>".$a."</font> Message on Administrator yesmail account</div><br>";  
}
else if($a==0&&$b!=0)
{
echo"<div  style=margin-top:-2px;width:200px;margin-left:20px;>Tody, There is only <font size=+1 color=red>".$b."</font> comment</div><br>";  
}
else
{
echo"<div  style=margin-top:-2px;width:200px;margin-left:20px;>Today  there are <font size=+1 color=red>".$b."</font>  users give their own feedback and <font size=+1 color=red>".$a."</font> Messages on Administrator yesmail account </div><br>";  
}
echo"</div>";
?>
<!-- ===============================================Number of Download Documents===========================================-->
<?php $count=0;

$con = mysqli_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }
mysqli_select_db($con,"datvet");
$sql="SELECT  * FROM document";
$result = mysqli_query($con,$sql);
 while($row=mysqli_fetch_array($result))
  {
   $count++;
 }
 mysqli_close($con);

$con = mysqli_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }
mysqli_select_db($con,"datvet");
$sql="SELECT  * FROM document";
$result = mysqli_query($con,$sql);
if($count==0)
{
echo"<div class=titleSide style=margin-top:0px; style=border-radius:5px;> Ther is no documents to be download from online</div>"; 
}
else
{
echo"<div class=titleSide style=margin-top:0px;order-radius:5px;><a href=download.php><font color=white>Click here to download ".$count."   documents</font></a> </div>"; 
}
?>
	<?php include"calander.php";?><br>
                 <div class="button2">
	
			
			</div>
			     					  	
</div></div>
       </div></div>