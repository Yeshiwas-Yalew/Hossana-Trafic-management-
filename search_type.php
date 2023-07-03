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
include("menu_user.php");
$result = $con->query($sql);
?>
		
		
 
  	<a href="manage_user.php" class="btn btn-success">Create</a>

  
	<table border="1" width="100%">
		  <thead><tr>
			<th>ID</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Sex</th>
			<th>Phone number</th>
			<th>Email Address</th>
			<th>User Name</th>
			<th>Account Type</th>
			<th>Status</th>
				<th>action</th>
		</tr>  </thead>

    <tbody>

<?php

//include 'db.php';
if(isset($_POST['btnsrc']))
		{
$dt=$_POST["Acc_Type"];
$sql = "select * from admin where  Acc_Type like '$dt%' order by ad_id desc ";
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






$sql= "select * from admin where  Acc_Type like '$dt%' order by ad_id desc LIMIT $record_index, $limit";
   $retval = mysqli_query($con, $sql);
//  print_r($retval);


   if (mysqli_num_rows($retval) > 0) {

         while($row = mysqli_fetch_assoc($retval)) {

        echo '<tr>';


                            echo '<td>'. $row['ad_id'] . '</td>';
                            echo '<td>'. $row['FName'] . '</td>';
                            echo '<td>'. $row['LName'] . '</td>';
                            echo '<td>'. $row['Sex'] . '</td>';
							echo '<td>'. $row['Phone'] . '</td>';
							echo '<td>'. $row['Email'] . '</td>';
							echo '<td>'. $row['ad_username'] . '</td>';
							echo '<td>'. $row['Acc_Type'] . '</td>';
                            echo '<td>'. $row['Status']. '</td>';
                            echo '<td>'. "<a class='btn btn-primary' href=update_user.php?id=".$row["ad_id"].">&nbsp;&nbsp;Edit&nbsp;&nbsp;&nbsp;&nbsp;</a><br>"."<a class='btn btn-danger' href=delete.php?id=".$row["ad_id"].">&nbsp;&nbsp;Delete</a><br></td></tr>";
     }


} 
    else {
    echo "0 results";
}

		

echo "</tbody>";  
 echo "</table>";


$sql = "SELECT COUNT(*) FROM admin where Acc_Type like '$dt%' order by ad_id desc"; 
$retval1 = mysqli_query($con, $sql);  
$row = mysqli_fetch_row($retval1);  
$total_records = $row[0];
    //  echo $total_records;
$total_pages = ceil($total_records / $limit);  

   echo "<ul>"; 
   echo "<li><a href='search_type.php?page=".($page-1)."'>Previous</a></li>"; 
for ($i=1; $i<=$total_pages; $i++) {  

 

  
    echo "<li><a style='width:10%;' href='search_type.php?page=".$i."'>".$i."</a></li>";
    

                
};  echo "<li><a href='search_type.php?page=".($page+1)."'>NEXT</a></li>";
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
