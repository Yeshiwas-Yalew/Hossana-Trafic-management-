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
<html>
<head>
<title>Accident Records Management System</title>
<link rel="stylesheet" href="styles1.css" type="text/css" />
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
<body style="background-color:darkbrown;
background-size:cover;
background-repeat:no-repeat;
background-attachment:fixed;
color:#fff;">
<?php 
include("menu.php");
?>
<?php
//$sql = "CALL allacc()";
$result = $con->query($sql);
?>
<!--<h1>Welcome to <?php //echo $_settings->info('name') ?></h1>-->
<hr class="bg-light">
<center>
<table style="color:#5555;"><tr><td>
                <span class="info-box-text">Today's record
                
                  <?php 
				  			  $query1="select * from record where date(dt)='".date('Y-m-d')."' ";
	 $result1=mysqli_query($con,$query1);
	 $num=mysqli_num_rows($result1);
                 
                    echo number_format($num);
                   /* $offense = $conn->query("SELECT * FROM `offense_list` where date(date_created) = '".date('Y-m-d')."' ")->num_rows;
                    echo number_format($offense);*/
                  ?>
                  <?php ?>
          </span>
            </td>
			<td><span></span></td><td><span></span></td><td><span></span></td><td><span></span></td><td><span></span></td><td><span></span></td>
			<td>
                <span class="info-box-text">Total record</span>
                
                  <?php 
				  			  $query1="select * from record ";
	 $result1=mysqli_query($con,$query1);
	 $num=mysqli_num_rows($result1);
                 
                    echo number_format($num);
                   /* $offense = $conn->query("SELECT * FROM `offense_list` where date(date_created) = '".date('Y-m-d')."' ")->num_rows;
                    echo number_format($offense);*/
                  ?>
                  <?php ?>
          
            </td></tr><tr></tr>
			<tr><td>
                <span class="info-box-text">Total number of system users 
                
                  <?php 
				  			  $query1="select * from admin";
	 $result1=mysqli_query($con,$query1);
	 $num=mysqli_num_rows($result1);
                 
                    echo number_format($num);
                   /* $offense = $conn->query("SELECT * FROM `offense_list` where date(date_created) = '".date('Y-m-d')."' ")->num_rows;
                    echo number_format($offense);*/
                  ?>
                  <?php ?>
          </span>
            </td>
			<td><span></span></td><td><span></span></td><td><span></span></td><td><span></span></td><td><span></span></td><td><span></span></td>
			<td>
                <span class="info-box-text">Total number of helping requests</span>
                
                  <?php 
				  			  $query1="select * from help ";
	 $result1=mysqli_query($con,$query1);
	 $num=mysqli_num_rows($result1);
                 
                    echo number_format($num);
                   /* $offense = $conn->query("SELECT * FROM `offense_list` where date(date_created) = '".date('Y-m-d')."' ")->num_rows;
                    echo number_format($offense);*/
                  ?>
                  <?php ?>
          
            </td></tr></table>
              <!-- /.info-box-content -->
           
		   <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-light elevation-1"><i class="fas fa-calendar-day"></i></span>

              <div class="info-box-content">
         <a href="<?php echo base_url ?>admin/?page=accidents"> <span class="info-box-text">List of Accident </span>
                <span class="info-box-number text-right">
                  <?php 
                    $accidents_list = $conn->query("SELECT * FROM `accidents_list`")->num_rows;
                    echo number_format($accidents_list);
                  ?>
                  <?php ?>
                </span> </a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-id-card"></i></span>

              <div class="info-box-content">
              <a href="<?php echo base_url ?>admin/?page=drivers"class="nav-link nav-maintenance_offenses">
			   <span class="info-box-text">Total Driver's Listed</span>
                <span class="info-box-number text-right">
                  <?php 
                    $drivers = $conn->query("SELECT id FROM `drivers_list` ")->num_rows;
                    echo number_format($drivers);
                  ?>
                </span> </a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-id-card"></i></span>

              <div class="info-box-content">
                <a href="<?php echo base_url ?>admin/?page=offenses"class="nav-link nav-maintenance_offenses">         
			   	 <span class="info-box-text">Total offense record</span>
                  <span class="info-box-number text-right">
                  <?php 
                    $offense_record= $conn->query("SELECT id FROM `offense_list` ")->num_rows;
                    echo number_format($offense_record);
                  ?>
                </span> </a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-lightblue elevation-1"><i class="fas fa-traffic-light"></i></span>

              <div class="info-box-content">
				 <a href="<?php echo base_url ?>admin/?page=maintenance/offenses" class="nav-link nav-maintenance_offenses">
				<span class="info-box-text">Total Offenses List </span>
                <span class="info-box-number text-right">
                <?php 
                    $to = $conn->query("SELECT id FROM `offenses` where status = 1 ")->num_rows;
                    echo number_format($to);
                  ?>
                </span> </a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
        </div>
			<?php }?>