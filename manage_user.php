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
<link rel="stylesheet" href="styles3.css" type="text/css" />
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
<div class="card card-outline card-primary">
	<div class="card-body">
		<div class="container-fluid">
			<div id="msg"></div>
			<form method="post" action="" id="manage-user" style="color:black;height:auto;">	
				<input type="hidden" name="id" value="<?php echo isset($meta['id']) ? $meta['id']: '' ?>">
				<div class="form-group col-6">
					<label for="name" >First Name</label>
					<input type="text" name="fname" id="firstname" class="form-control" value="<?php echo isset($meta['firstname']) ? $meta['firstname']: '' ?>" required>
				</div>
				<div class="form-group col-6">
					<label for="name">Last Name</label>
					<input type="text" name="lname" id="lastname" class="form-control" value="<?php echo isset($meta['lastname']) ? $meta['lastname']: '' ?>" required>
				</div>
				<div class="form-group col-6">
					<label for="type">Sex</label>
					<select name="sex" id="type" class="custom-select">
						<option value="Male" <?php echo isset($meta['Sex']) && $meta['Sex'] == 1 ? 'selected' : '' ?>>Male</option>
						<option value="Female" <?php echo isset($meta['Sex']) && $meta['Sex'] == 2 ? 'selected' : '' ?>>Female</option>
					</select>
				</div>
				<div class="form-group col-6">
					<label for="username">Phone number</label>
					<input type="text" name="phone" id="username" class="form-control" value="<?php echo isset($meta['phone']) ? $meta['Phone']: '' ?>" required  autocomplete="off">
				</div>
				<div class="form-group col-6">
					<label for="username">Email address</label>
					<input type="text" name="email" id="username" class="form-control" value="<?php echo isset($meta['Email']) ? $meta['Email']: '' ?>" required  autocomplete="off">
				</div>
				<div class="form-group col-6">
					<label for="username">Username</label>
					<input type="text" name="usrname" id="username" class="form-control" value="<?php echo isset($meta['username']) ? $meta['username']: '' ?>" required  autocomplete="off">
				</div>
				<div class="form-group col-6">
					<label for="password">Password</label>
					<input type="password" name="password" id="password" class="form-control" value="" autocomplete="off" <?php echo isset($meta['id']) ? "": 'required' ?>>
                    <?php if(isset($_GET['id'])): ?>
					<small><i>Leave this blank if you dont want to change the password.</i></small>
                    <?php endif; ?>
				</div>
				<div class="form-group col-6">
					<label for="type">Login Type</label>
					<select name="type" id="type" class="custom-select">
						<option value="Admin" <?php echo isset($meta['type']) && $meta['type'] == 1 ? 'selected' : '' ?>>Admin</option>
						<option value="Status" <?php echo isset($meta['type']) && $meta['type'] == 2 ? 'selected' : '' ?>>Staff</option>
					</select>
				</div>
					<div class="form-group col-6">
					<label for="type">Account Status</label>
					<select name="status" id="type" class="custom-select">
						<option value="Active" <?php echo isset($meta['status']) && $meta['status'] == 1 ? 'selected' : '' ?>>Active</option>
						<option value="Inactive" <?php echo isset($meta['status']) && $meta['status'] == 2 ? 'selected' : '' ?>>Inactive</option>
					</select>
				</div>
				<!--<div class="form-group col-6">
					<label for="" class="control-label">Avatar</label>
					<div class="custom-file">
		              <input type="file" class="custom-file-input rounded-circle" id="customFile" name="img" onchange="displayImg(this,$(this))">
		              <label class="custom-file-label" for="customFile">Choose file</label>
		            </div>
				</div>
				<div class="form-group col-6 d-flex justify-content-center">
					<img src="<?php //echo validate_image(isset($meta['avatar']) ? $meta['avatar'] :'') ?>" alt="" id="cimg" class="img-fluid img-thumbnail">
				</div>-->
			</form>
		</div>
	</div>
	<div class="card-footer">
			<div class="col-md-12">
				<div class="row">
					<button name="btnreg" class="btn btn-sm btn-primary mr-2" form="manage-user">Save</button>
					<a class="btn btn-sm btn-secondary" href="./?page=user/list">Cancel</a>
				</div>
			</div>
		</div>
</div>
<style>
	img#cimg{
		height: 15vh;
		width: 15vh;
		object-fit: cover;
		border-radius: 100% 100%;
	}
</style>
<script>
	function displayImg(input,_this) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	        	$('#cimg').attr('src', e.target.result);
	        }

	        reader.readAsDataURL(input.files[0]);
	    }
	}
	$('#manage-user').submit(function(e){
		e.preventDefault();
		start_loader()
		$.ajax({
			url:_base_url_+'classes/Users.php?f=save',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp ==1){
					location.href = './?page=user/list';
				}else{
					$('#msg').html('<div class="alert alert-danger">Username already exist</div>')
				}
                end_loader()
			}
		})
	})

</script>
 <?php
if(isset($_POST["btnreg"]))
{
	function validate_input($data) 
		{
  			 $data = trim($data);
  			 $data = stripslashes($data);
   			$data = htmlspecialchars($data);
   			return $data;
		}
	$type =validate_input( $_POST["type"]);
	$fname = validate_input($_POST["fname"]);
	$sex = validate_input($_POST["sex"]);
	$lname = validate_input($_POST["lname"]);
	$ad_usrname = validate_input($_POST["usrname"]);
	$ad_password = validate_input($_POST["password"]);
	$phone_number = validate_input($_POST["phone"]);
	$email = validate_input($_POST["email"]);
	if( $type=="" ||$ad_usrname==""|| $fname=="" || $lname==""|| $ad_password=="")
	{
		echo "<script> alert('All field required');</script>";
		return;
	}
			 
	else
	{
		$sql = "SELECT * FROM admin where ad_username= '$ad_usrname'";

   $retval = mysqli_query($con, $sql);
   if (mysqli_num_rows($retval) > 0)	
   {echo "<script> alert('This user name is already existed in database, pls change username');</script>";
   return;}
   else
   {   
	 
if($type==1)
	$type="Admin";
else
	$type="Staff";
$Status="Active";
		$sql = "INSERT INTO admin VALUES ('@','$fname','$lname','$sex','$phone_number','$email','$type','$ad_usrname','$ad_password','$Status')";
			if (mysqli_query($con, $sql))
				{
					echo "<script> alert('The new account has been successfuly recorded');</script>";
				} 
			else 
				{
					echo "<script> alert('Check if the field contain special charecter, or contact an administrator');</script>";
					return;
				}

	}

	}	
}
?>
<?php
	
		}
?>
	
</body>
</html>
