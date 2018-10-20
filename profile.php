<?php
	
	$email=$_SESSION['nit'];
	$var="SELECT * FROM user_detail  WHERE u_email='$email'";
	$qry=mysqli_query($con,$var);
	$row=mysqli_fetch_array($qry);
	$id=$row['u_id'];
	$fname=$row['u_fname'];
	$lname=$row['u_lname'];
	$email=$row['u_email'];
	$mob_no=$row['u_mob_no'];
	$dob1=$row['u_dob'];
	$gen=$row['u_gender'];
	$addr=$row['u_address'];
	$img1=$row['u_image'];
	$city=$row['u_city'];
	$role=$_SESSION['ro'];
	if($role=='admin')
	{
		include 'a_header.php';
	}
	elseif($role=='user')
	{
		include 'user_header.php';
	}
?>
<html>
	<head>
		<title>profile</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<script src="js/jquery3.2.1.min.js "></script>
		<script src ="js/bootstrap.min.js "></script>
	
	</head>
	<body>
		<center><h1><b style="height:60px;"><i><u>Profile Page</u></i></b></h1></center>
		<br />
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="well">
					<fieldset>
							<form action="database.php" method="POST" enctype="multipart/form-data">
								<div class="col-sm-4">
									<div class="form-group">
									
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
									
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
									<img src="<?php echo"$img1";?>" class="img-circle" width="150" height="150">
								</div>
								</div>
								<div class="col-sm-2">
									<div class="form-group">
									
									</div>
								</div>
								<div class="col-sm-2">
									<div class="form-group">
									
									</div>
								</div>
								<div class="col-sm-2">
									<div class="form-group">
									
									</div>
								</div>
								<div class="col-sm-2">
									<div class="form-group">
									
									</div>
								</div>	
								<div class="col-sm-2">
									<div class="form-group">
									<input type="file" name="fileupload" >
									</div>
								</div>
								<div class="col-sm-2">
									<div class="form-group">
										<input type="submit" name="upload" value="Upload">
									</div>
								</div>
								<!--</form>
								
								<form action="edit.php" method="POST">-->
								<div class="col-sm-12">
									<div class="form-group">
									
									</div>
								</div>

								<div class="col-sm-12">
									<div class="form-group">
									
									</div>
								</div>		
								<div class= "col-sm-12">
									<div class="form-group">
										<label>ID :</label>
										<?php echo"$id";?>
									</div>
								</div>		
								<div class="col-sm-6">
									<div class="form-group">
										<label>First Name :</label>
										<?php echo"$fname";?>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label>Last Name :</label>
										<?php echo"$lname";?>
									</div>
								</div>	
								<div class="col-sm-6">
									<div class="form-group">
										<label>Email :</label>
										<?php echo"$email";?>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label>Mobile No. :</label>
										<?php echo"$mob_no";?>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label>Date Of Birth :</label>
										<?php echo"$dob1";?>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label>Gender :</label>
										<?php echo"$gen";?>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label>Address:</label>
										<?php echo"$addr";?>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label>City:</label>
										<?php echo"$city";?>
									</div>
								</div>
								<div class="col-sm-12">
									<div class="form-group">
										<input type="submit" name="edit" value="Edit Profile"style="height:40px; width:80px;color:white; background-color:black;" >
									</div>
								</div>
								</form>	
						</fieldset>
					</div>
				</div>
			</div>
		</div>				
	</body>	
	
		
	
</html>