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
<title>Police Accident Records Management System</title>
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
table{
color:#fff;
}
table{
color:#000;
border:none;
background-color:pink;
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
include("menu_vehicle.php");
$result = $con->query($sql);
?>
		
		
 
  	 <a href="add.php" class="btn btn-success">Create</a>

  
	<table border="1" width="100%">
		  <thead><tr>
			<th>R_ID</th>
			<th>Place</th>
			<th>Date and Time</th>
			<th>Kill</th>
			<th>Wound</th>
			<th>Vehicle Type</th>
			<th>Vehicle Number</th>
			<th>Reason</th>
				<th>action</th>
		</tr>  </thead>

    <tbody>


<?php

//include 'db.php';
if(isset($_POST['btnsrc']))
		{
$dt=$_POST["v_type"];
$sql = "select * from record where  v_type like '$dt%' order by r_id desc ";
                $result = $con->query($sql);
					 
	 $num=$result-> num_rows ;
//$link = db_connect();



$limit = 10; 


    if (isset($_GET["page"] )) 
        {
        $page  = $_GET["page"]; 
        } 
    else 
       {
        $page=1; 
       };  

$record_index= ($page-1) * $limit;      






$sql= "select * from record where  v_type like '$dt%' order by r_id desc LIMIT $record_index, $limit";
   $retval = mysqli_query($con, $sql);
//  print_r($retval);


   if (mysqli_num_rows($retval) > 0) {

         while($row = mysqli_fetch_assoc($retval)) {

        echo '<tr>';


                            echo '<td>'. $row['r_id'] . '</td>';
                            echo '<td>'. $row['place'] . '</td>';
                            echo '<td>'. $row['dt'] . '</td>';
                            echo '<td>'. $row['kill'] . '</td>';
							echo '<td>'. $row['v_type'] . '</td>';
							echo '<td>'. $row['v_number'] . '</td>';
							echo '<td>'. $row['reason'] . '</td>';
                            echo '<td>'. $row['wound'] . '</td>';
                            echo '<td>'. "<a class='btn btn-primary' href=update_accident.php?id=".$row["r_id"].">&nbsp;&nbsp;Edit&nbsp;&nbsp;&nbsp;&nbsp;</a><br>"."<a class='btn btn-danger' href=delete.php?id=".$row["r_id"].">&nbsp;&nbsp;Delete</a><br></td></tr>";
     }


} 
    else {
    echo "0 results";
}

		

echo "</tbody>";  
 echo "</table>";


$sql = "SELECT COUNT(*) FROM record where  v_type like '$dt%' order by r_id desc"; 
$retval1 = mysqli_query($con, $sql);  
$row = mysqli_fetch_row($retval1);  
$total_records = $row[0];
    //  echo $total_records;
$total_pages = ceil($total_records / $limit);  

   echo "<ul>"; 
   echo "<li><a href='V_search.php?page=".($page-1)."'>Previous</a></li>"; 
for ($i=1; $i<=$total_pages; $i++) {  

 

  
    echo "<li><a style='width:10%;' href='V_search.php?page=".$i."'>".$i."</a></li>";
    

                
};  echo "<li><a href='V_search.php?page=".($page+1)."'>NEXT</a></li>";
   echo"</ul></div>";
		}
    mysqli_close($con);
			}
?>

</center>
  </div>
  </div>
</body>
</html>
