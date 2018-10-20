<html>
	<?php
				include 'a_header.php';		
	?>
	<head>
		<title> Manage Blogs </title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<script rel="text/js" src="js/jquery-3.2.1.js"> </script>
		<script rel="text/js" src="js/bootstrap.min.js"> </script>
		<script>
			function selectAll(source) 
			{
				checkboxes = document.getElementsByName('check[]');
				for(var i in checkboxes)
				checkboxes[i].checked = source.checked;
			}
		</script>
	</head>
	<body>
		<br />
													<a class="btn btn-success" href="database.php?vri=vr">Verified User</a>
													<a class="btn btn-success" href="database.php?nvr=nv">Non-Verified User</a>
													<a class="btn btn-success" href="database.php?bk=blk">Block User</a>
													<a class="btn btn-success" href="database.php?ub=unblock">Unblock User</a>
													<a class="btn btn-success" href="database.php?d=del">Delete User</a>
													<hr>
													<br>
			<form action="database.php" method="POST">
		<div class="container">
			<div class="row">
				<div class="col-sm-12" "well">
					<center><h2> All Deleted User</h2> </center>
					
									
																				
											
											<input class="btn btn-success" type="submit" name="deleted1" value="Restore"  >
									<table class="table table-striped table-hover">
									<thead>
									<tr>
									<th><label><input type="checkbox" id="checkAll" name="check[]" onClick="selectAll(this)"> Select All </label> </th>
									<th>First Name</th>
									<th>Last Name</th>
									<th>Email</th>
									<th>Status</th>
								
									</tr>
					  </thead>
							<?php 
	$con=mysqli_connect("localhost","root","","blogging");
	$sel="SELECT * FROM user_detail WHERE  is_delete='1'";
	$qry=mysqli_query($con,$sel);
	foreach($qry as $row3)
	{
		$fname=$row3['u_fname'];
		$lname=$row3['u_lname'];
		$email=$row3['u_email'];
		$is_verified=$row3['verified'];
		$bid=$row3['u_id'];
	?>
	
	
	
						
						<tbody>
						 <tr class="info">
						  <td><input type="checkbox" name="check[]" value="<?php echo $bid ?>"></td>
						  <td><?php echo $fname;?></td>
						  <td><?php echo $lname;?></td>
						  <td><?php echo $email;?></td>
						  <td><?php echo $is_verified;?></td>
						 
						</tr>
					   </tbody>
						
									<?php } ?>
						</table>
								</div>
							</div>
						</div>	
			</form>
	</body>
</html>	
						