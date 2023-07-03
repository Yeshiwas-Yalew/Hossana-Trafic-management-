<!DOCTYPE html>
<html lang="en">
<?php
session_start();
$num=0;
include("connect.php");
if(!(isset($_SESSION['log_user'])))
			{
header("location:check.php");
			}
			else
			{	
$user_name=$_SESSION['log_user'];

					?>	

<head>
<style>
.loginpad
{
padding-left:70px;
}
table{
color:#000;
border:none;
background-color:yellow;
//color:yellow;
}
th{
font-size:16px;
background-color:black;
color:#fff;
}
</style>
</head>
<body >
<?php 
include("menu.php");
?>
<?php $result = $con->query($sql);
$ctrl=$_GET['id'];
?>
<div class="container">
  <center><h2><u>List Of System users</u></h2>
<br><br></center>
<div class="row">   

    <a href="manage_user.php" class="btn btn-success" style="background-color:yellow;font-size:16px;">Add more system user</a>

  <br><br>
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
$sql = "Delete from admin where  ad_id = '$ctrl'";
			if (mysqli_query($con, $sql))
				{
				echo "<script> alert('The user Deleted successfuly');</script>";
				} 
			else 
				{
					echo "<script> alert('Check if the field contain special charecter, or contact an administrator');</script>";
					return;
				}
$sql = "SELECT * FROM admin";
                $result = $con->query($sql);
					 
	 $num=$result-> num_rows ;
//$link = db_connect();



$limit = 5; 


    if (isset($_GET["page"] )) 
        {
        $page  = $_GET["page"]; 
        } 
    else 
       {
        $page=1; 
       };  

$record_index= ($page-1) * $limit;      






 $sql = "SELECT * FROM admin LIMIT $record_index, $limit";

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
                          	echo '<td>'. $row['Status'] . '</td>';
							 /* echo '<td>';
							if(($row['Status'])=="Active")
						  "<a class='btn btn-primary'  href=javascript:void(0) data-id=". $row['ad_id'].">&nbsp;&nbsp;Inactive &nbsp;&nbsp;&nbsp;&nbsp;</a><br>";
					   else
						   echo "<a class='btn btn-danger' href=delete.php?id=".$row["ad_id"].">&nbsp;&nbsp;Active</a><br>";
					   echo "</td></tr>";*/

                           echo '<td>'. "<a class='btn btn-primary' href=update_user.php?id=".$row["ad_id"].">&nbsp;&nbsp;Edit&nbsp;&nbsp;&nbsp;&nbsp;</a><br>"."<a class='btn btn-danger' href=delete.php?id=".$row["ad_id"].">&nbsp;&nbsp;Delete</a><br></td></tr>";
     }


} 
    else {
    echo "0 results";
}



echo "</tbody>";  
 echo "</table>";


$sql = "SELECT COUNT(*) FROM admin"; 
$retval1 = mysqli_query($con, $sql);  
$row = mysqli_fetch_row($retval1);  
$total_records = $row[0];
    //  echo $total_records;
$total_pages = ceil($total_records / $limit);  

   echo "<ul>"; 
   echo "<li><a href='view_user.php?page=".($page-1)."'>Previous</a></li>"; 
for ($i=1; $i<=$total_pages; $i++) {  

 

  
    echo "<li><a style='width:10%;' href='view_user.php?page=".$i."'>".$i."</a></li>";
    

                
};  echo "<li><a href='view_user.php?page=".($page+1)."'>NEXT</a></li>";
   echo"</ul></div>";
    
    mysqli_close($con);
			}
?>


    </div>
</div>
<script>
	$(document).ready(function(){
		$('.delete_data').click(function(){
			_conf("Are you sure to delete this driver permanently?","delete_driver",[$(this).attr('data-id')])
		})
		$('.view_details').click(function(){
			uni_modal("<i class='fa fa-id-card'></i> Driver's Information","drivers/view_details.php?id="+$(this).attr('data-id'),'large')
		})
		$('.table').dataTable({
			columnDefs: [
				{ orderable: false, targets: [3,4] }
			]
		});
	})
	function delete_driver($id){
		start_loader();
		$.ajax({
			url:_base_url_+"classes/Master.php?f=delete_driver",
			method:"POST",
			data:{id: $id},
			dataType:"json",
			error:err=>{
				console.log(err)
				alert_toast("An error occured.",'error');
				end_loader();
			},
			success:function(resp){
				if(typeof resp== 'object' && resp.status == 'success'){
					location.reload();
				}else{
					alert_toast("An error occured.",'error');
					end_loader();
				}
			}
		})
	}
</script>
</body>

</html>
