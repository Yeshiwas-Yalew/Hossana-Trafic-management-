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
    <div  style="margin-left:0%;margin-bottom:1%;padding:2% 2%;width:100%;">
<?php
//include("menu.php");
?>
				
<div class="card card-outline card-primary">
	<div class="card-header" style="align:center;">
		<h3 class="card-title">List of Accidents' Records</h3>
		<div class="card-tools">
			<a href="addnew.php" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span>  Create New</a>
		</div>
	</div>
	<div class="card-body">
		<div class="container-fluid">
        <div class="container-fluid">
			<table class="table table-hover table-stripped"  border="1" width="900" style="color:#000; border:none; background-color:pink;">
				<colgroup>
					<col width="15%">
					<col width="25%">
					<col width="25%">
					<col width="35%">
					<col width="35%">
					<col width="50%">
					<col width="55%">
					<col width="35%">
					<col width="35%">
					<col width="15%">
				</colgroup>
				<thead>
					<tr>
					    <th>S.No</th>
						<th>R_ID</th>
						<th>Place</th>
						<th>Date and Time</th>
						<th>Kill</th>
						<th>Wound</th>
						<th>Vehicle Type</th>
						<th>Vehicle Number
						<th>Reason</th>
						<th>Action</th>
					</tr>
				

				</thead>
				<tbody>
					<?php 
					$i = 1;
					$query_page=mysqli_query($con,"select * from record order by r_id asc ");
	
					//	$qry = $conn->query("SELECT r.*,d.license_id_no FROM `offense_list` r inner join `drivers_list` d on r.driver_id = d.id order by unix_timestamp(r.date_created) desc ");
						while($rows = $query_page->fetch_assoc()):
					?>
						<tr>
					
	 
							<td class="text-center"><?php echo $i++; ?></td>
							<td><?php echo $rows['r_id'] ?></td>
							<td><a href="javascript:void(0)" class="view_details" data-id="<?php echo $row['id'] ?>"><?php echo $rows['place'] ?></a></td>
							<td><?php echo $rows['dt']?></td>
							<td><?php echo $rows['kill']?></td>
							<!--<td class="text-center">
                                <?php //if($row['status'] == 1): ?>
                                    <span class="badge badge-success">Paid</span>
                                <?php //else: ?>
                                    <span class="badge badge-secondary">Pending</span>
                                <?php// endif; ?>
							
                            </td>-->
							<td><?php echo $rows['wound']?></td>
	 <td><?php echo $rows['v_type']?></td> 
	  <td><?php echo $rows['v_number']?></td> 
	   <td><?php echo $rows['reason']?></td> 
							<td align="center">
								 <!--<button type="button" class="btn btn-flat btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
				                  		Action
				                    <span class="sr-only">Toggle Dropdown</span>
				                  </button>-->
				                  <div class="dropdown-menu" role="menu">
				                    <a class="dropdown-item" href="?page=offenses/manage_record&id=<?php echo $row['id'] ?>"><span class="fa fa-edit text-primary"></span> Edit</a>
				                    <div class="dropdown-divider"></div>
				                    <a class="dropdown-item delete_data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><span class="fa fa-trash text-danger"></span> Delete</a>
				                  </div>
							</td>
						</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
		</div>
	</div>
</div>
<?php
			}
	?>
	
	
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
<script>
	$(document).ready(function(){
		$('.delete_data').click(function(){
			_conf("Are you sure to delete this offense record permanently?","delete_offense",[$(this).attr('data-id')])
		})
		$('.view_details').click(function(){
			uni_modal("<i class='fa fa-ticket'></i> Driver's Offense Ticket Details","offenses/view_details.php?id="+$(this).attr('data-id'),'mid-large')
		})
		$('.table').dataTable({
			columnDefs:[{ orderable: false, targets: [5,6] }]
		});
	})
	function delete_offense($id){
		start_loader();
		$.ajax({
			url:_base_url_+"classes/Master.php?f=delete_offense_record",
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