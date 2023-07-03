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
background-color:green;
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


    <tbody>


<?php

//include 'db.php';
$sql = "Delete from help where id = '$ctrl'";
			if (mysqli_query($con, $sql))
				{
				echo "<script> alert('Comment is deleted successfuly');</script>";
				} 
			else 
				{
					echo "<script> alert('Check if the field contain special charecter, or contact an administrator');</script>";
					return;
				}
$sql = "SELECT * FROM help";
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






 $sql = "SELECT * FROM help LIMIT $record_index, $limit";

   $retval = mysqli_query($con, $sql);
//  print_r($retval);


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
    echo "0 results";
}



echo "</tbody>";  
 echo "</table>";


$sql = "SELECT COUNT(*) FROM help"; 
$retval1 = mysqli_query($con, $sql);  
$row = mysqli_fetch_row($retval1);  
$total_records = $row[0];
    //  echo $total_records;
$total_pages = ceil($total_records / $limit);  

   echo "<ul>"; 
   echo "<li><a href='help1.php?page=".($page-1)."'>Previous</a></li>"; 
for ($i=1; $i<=$total_pages; $i++) {  

 

  
    echo "<li><a style='width:10%;' href='help1.php?page=".$i."'>".$i."</a></li>";
    

                
};  echo "<li><a href='help1.php?page=".($page+1)."'>NEXT</a></li>";
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
