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
<title>Accident Records Management System</title>
<link rel="stylesheet" href="styles.css" type="text/css" />
<style>
.loginpad
{
padding-left:70px;
}
table{
color:#000;
border:none;
background-color:green;
}
th{
font-size:16px;
background-color:black;
color:#fff;
}
</style>
</head>
<body>
<?php
include("menu.php");
?>
<?php
//$sql = "SELECT help.name as t1,help.email as t2,help.mob as t3,help.msg as t4 FROM help";
//$result = $con->query($sql);
?>

	<center>
	<h2>Latest Help</h2>
	<hr>
	<h4>Contect Request</h4>
	<div class="row">   
 <br><br>
	<table border="1" width="100%">
		<tr>
			<th>S.No</th>
			<th>NAME</th>
			<th>EMAIL</th>
			<th>MOBILE</th>
			<th>MESSAGE</th>
			<th>Action</th>

		</tr>

	<?php
	$sql = "SELECT * FROM help";
                $result = $con->query($sql);
					 
	 $num=$result-> num_rows ;
//$link = db_connect();



$limit = 4; 


    if (isset($_GET["page"] )) 
        {
        $page  = $_GET["page"]; 
        } 
    else 
       {
        $page=1; 
       };  

$record_index= ($page-1) * $limit;      
$sql = "SELECT * FROM help LIMIT $record_index, $limit";

   $retval = mysqli_query($con, $sql);



   if (mysqli_num_rows($retval) > 0) {

         while($row = mysqli_fetch_assoc($retval)) {

        echo '<tr>';

                            echo '<td>'. $row['id'] . '</td>';
                            echo '<td>'. $row['name'] . '</td>';
                            echo '<td>'. $row['email'] . '</td>';
                            echo '<td>'. $row['mob'] . '</td>';
                            echo '<td>'. $row['msg'] . '</td>'; 
							echo '<td>'. "<a class='btn btn-danger' href=delete_help.php?id=".$row["id"].">&nbsp;&nbsp;Delete</a><br></td></tr>";
     }
} 
    else {
    echo "There is no data found!!!";
}
echo "</tbody>";  
 echo "</table>";

    
	$sql = "SELECT COUNT(*) FROM help"; 
$retval1 = mysqli_query($con, $sql);  
$row = mysqli_fetch_row($retval1);  
$total_records = $row[0];
    //  echo $total_records;
$total_pages = ceil($total_records / $limit);  

   echo "<ul style='margin-left:15%;'>"; 
   echo "<li><a  href='help1.php?page=".($page-1)."'>Previous</a></li>"; 
for ($i=1; $i<=$total_pages; $i++) {  

 

  
    echo "<li><a style='width:10%;' href='help1.php?page=".$i."'>".$i."</a></li>";
    

                
};  echo "<li><a href='help1.php?page=".($page+1)."'>NEXT</a></li>";
   echo"</ul></div>";
   echo '</center>';
    mysqli_close($con);
			}
			
?>



	
	</div>

</body>
</html>

