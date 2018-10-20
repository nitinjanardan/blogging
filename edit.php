<?php	
		$email=$_SESSION['nit'];
		$var="SELECT * FROM user_detail WHERE u_email='$email'";
		$qry=mysqli_query($con,$var);
		$row=mysqli_fetch_array($qry);
		$fname=$row['u_fname'];
		$lname=$row['u_lname'];
		$email=$row['u_email'];
		$mob_no=$row['u_mob_no'];
		$dob1=$row['u_dob'];
		$gen=$row['u_gender'];
		$addr=$row['u_address'];
		$pass=$row['u_password'];
		?>
		

<html>
	<head>
		<title>Edit Profile</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<script src="js/jquery3.2.1.min.js "></script>
		<script src ="js/bootstrap.min.js "></script>
		
	</head>
	
	<body>
	
			<center><h1><b style="height:60px;"><i><u>Edit Page</u></i></b></h1></center>
		<br />
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="well">
						<fieldset>
							
							<form action="database.php" method="POST">		
								<div class="col-sm-6">
									<div class="form-group">
										<label>First Name :</label>
										<input type="text" class="form-control" name="fname" value="<?php echo "$fname";?>">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label>Last Name :</label>
											<input type="text" class="form-control" name="lname" value="<?php echo "$lname"?>">
									</div>
								</div>	
								<div class="col-sm-6">
									<div class="form-group">
										<label>Email :</label>
											<input type="text" class="form-control" name="email" value="<?php echo "$email"?>">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label>Mobile No. :</label>
											<input type="text" class="form-control" name="mobile_no" value="<?php echo "$mob_no"?>">
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label>Date Of Birth :</label>
											<input type="text" class="form-control" name="dob" value="<?php echo "$dob1"?>">
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label>Gender :</label>
										<input type="text" class="form-control" name="gender" value="<?php echo "$gen"?>">
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label>City :</label>
											<select name="city">
													<option value="Nothing Selected"> </option>
													<option value="hyd">Hyderabad</option>
													<option value="mumbai">Mumbai</option>
													<option value="chennai">Chennai</option>
													<option value="pune">Pune</option>
													<option value="delhi">Delhi</option>
											</select>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label>Change Password :</label>
										<input type="password" class="form-control" name="pass" value="<?php echo "$pass"?>">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label>Address:</label>
										<input type="text" class="form-control" name="address" value="<?php echo "$addr"?>">
									</div>
								</div>
								<div>
									<input type="submit" value="Done"  name="update" class="col-sm-offset-6" style="height:40px; width:80px;color:white; background-color:black;">
								</div>
							</form>
						</fieldset>
					</div>
				</div>
			</div>
		</div>
			
	</body>
</html>