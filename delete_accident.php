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
background-color:pink;
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
<center> 
 <h2><u>List Of Accident records</u></h2>
  <br><br></center>
<div class="row">   

    <a href="addnew.php" class="btn btn-success" style="background-color:pink;font-size:16px;">Add New Record</a>

<br><br>
	<table border="1" width="100%">
		  <thead><tr>
			<th>R_ID</th>
			<th>Place</th>
			<th>Date and Time</th>
			<th>Kill</th>
			<th>Wound</th>
			<th>Vehicle Type</th>
			<th>Plate Number</th>
			<th>Reason</th>
				<th>action</th>
		</tr>  </thead>

    <tbody>


<?php

//include 'db.php';
$sql = "Delete from record where  r_id = '$ctrl'";
			if (mysqli_query($con, $sql))
				{
				echo "<script> alert('The record Deleted successfuly');</script>";
				} 
			else 
				{
					echo "<script> alert('Check if the field contain special charecter, or contact an administrator');</script>";
					return;
				}
$sql = "SELECT * FROM record";
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






 $sql = "SELECT * FROM record LIMIT $record_index, $limit";

   $retval = mysqli_query($con, $sql);
//  print_r($retval);


   if (mysqli_num_rows($retval) > 0) {

         while($row = mysqli_fetch_assoc($retval)) {

        echo '<tr>';


                            echo '<td>'. $row['r_id'] . '</td>';
                            echo '<td>'. $row['place'] . '</td>';
                            echo '<td>'. $row['dt'] . '</td>';
                            echo '<td>'. $row['kill'] . '</td>'; 
							echo '<td>'. $row['wound'] . '</td>';
							echo '<td>'. $row['v_type'] . '</td>';
							echo '<td>'. $row['v_number'] . '</td>';
							echo '<td>'. $row['reason'] . '</td>';
                          
						   //echo '<td>'. "<a class='btn btn-primary'  href=javascript:void(0) data-id=". $row['r_id'].">&nbsp;&nbsp;Edit&nbsp;&nbsp;&nbsp;&nbsp;</a><br>"."<a class='btn btn-danger' href=delete.php?id=".$row["r_id"].">&nbsp;&nbsp;Delete</a><br></td></tr>";

                           echo '<td>'. "<a class='btn btn-primary' href=update_accident.php?id=".$row["r_id"].">&nbsp;&nbsp;Edit&nbsp;&nbsp;&nbsp;&nbsp;</a><br>"."<a class='btn btn-danger' href=pagination.php?id=".$row["r_id"].">&nbsp;&nbsp;Delete</a><br></td></tr>";
     }


} 
    else {
    echo "0 results";
}



echo "</tbody>";  
 echo "</table>";


$sql = "SELECT COUNT(*) FROM record"; 
$retval1 = mysqli_query($con, $sql);  
$row = mysqli_fetch_row($retval1);  
$total_records = $row[0];
    //  echo $total_records;
$total_pages = ceil($total_records / $limit);  

   echo "<ul>"; 
   echo "<li><a href='pagination.php?page=".($page-1)."'>Previous</a></li>"; 
for ($i=1; $i<=$total_pages; $i++) {  

 

  
    echo "<li><a style='width:10%;' href='pagination.php?page=".$i."'>".$i."</a></li>";
    

                
};  echo "<li><a href='pagination.php?page=".($page+1)."'>NEXT</a></li>";
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
