<?php include 'header.php'?>
<html>
	<head>
		<title>Registration form </title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<script src="js/jquery3.2.1.min.js "></script>
		<script src ="js/bootstrap.min.js "></script>
		<script>
			window.setTimeout(function () {
    $(".alert-danger").fadeTo(500, 0).slideUp(500, function () {
        $(this).remove();
    });
}, 5000);
		</script>
</head>			
				<?php
	if(isset($_GET['re']))
		{
			$x=$_GET['re'];
			
		}
			?>
	
		<body>
			<center><h1><b><i><u>Registration Form</u></i></b></h1></center>
			<br />
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
						<?php 
				if (!empty($x))
				{
					
				echo"<div class='alert alert-danger'> <a href='#' class='close' data-dismiss='alert'>&times;</a>";
				echo"<h4> $x </h4>";
				echo"</div>";
				}
				?>
							<div class="well">
								<fieldset>
									<legend><b>Registration Form</b></legend>
									<form action="database.php" method="POST">
										<div class="col-sm-6">
											<div class="form-group">
												<label>First Name:</label>
												<input type="text" class="form-control" name="u_fname" placeholder="first name">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>Last Name:</label>
												<input  type="text" class="form-control" name="u_lname" placeholder="last name">
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												<label>Email:</label>
												<input type="text" class="form-control" name="u_email" placeholder="user@domain.com" >
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												<label>Password:</label>
												<input type="password" class="form-control" name="u_password" placeholder="***********">
											</div>
										</div>	
										<div class="col-sm-4">
											<div class="form-group">
												<label>Confirm Password:</label>
												<input type="password" class="form-control" name="u_cpassword" placeholder="***********">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>Mobile Number:</label>
												<input type="text" class="form-control" name="u_mob_no" placeholder="enter your number">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>Date of Birth:</label>
												<input type="text" class="form-control" name="u_dob" placeholder="dd/mm/yyyy">
											</div>
										</div>	
										<div class="col-sm-6">
											<div class="form-group">
												<label >Gender:</label>
												<select name="u_gender">
												<option value="0"></option>
												<option value="male">Male</option>
												<option value="female">Female</option>
												<option value="others">Others</option>
												</select>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label >City:</label>
													<select name="u_city">
													<option value="0"></option>
													<option value="hyd">Hyderabad</option>
													<option value="mumbai">Mumbai</option>
													<option value="chennai">Chennai</option>
													<option value="pune">Pune</option>
													<option value="delhi">Delhi</option>
												</select>
											</div>
										</div>
										<div class="col-sm-12">
											<div class="form-group">
												<label> Address : </label>
												<textarea class="form-control" rows="4" id="address"name="u_address" ></textarea>
											</div>
										</div>
										<br /><br />
										<div >
											<input type="submit" value="submit" class="col-sm-offset-6" name="reg"  style="height:40px; width:80px;color:white; background-color:black;" >
											<a href="login.php"class="col-sm-offset-2"><b>Already have an account?</b>  </a>
										</div>		
								</form>
							</fieldset>
						</div>
					</div>
				</div>
			</div>		
		</body>
		<?php include 'footer.php'?>
</html>