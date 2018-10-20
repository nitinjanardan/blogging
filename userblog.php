<html>
	<?php
				include 'user_header.php';		
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
			<form action="database.php" method="POST">
		<div class="container">
			<div class="row">
				<div class="col-sm-12" "well">
					<center><h2>  Blogs Posted</h2> </center>
					
									
										
									<table class="table table-striped table-hover">
									<thead>
									<tr>
									<th><label><input type="checkbox" id="checkAll" name="check[]" onClick="selectAll(this)"> Select All </label> </th>
									<th>Blog heading</th>
									<th>Blog Image</th>
									<th>Blog Category</th>
									<th>Posted Status</th>
									<th>Action</th>
									</tr>
					  </thead>
							
						<?php
							
							
							$bid=$_SESSION['id'];	
							$qry1="SELECT * FROM post WHERE u_id='$bid'";
							$res1=mysqli_query($con,$qry1);
							foreach($res1 as $row)
							{
								$blog_head=$row['blog_head'];
								$blog_image=$row['blog_image'];
								$blog_describe=$row['blog_description'];
								$u_id=$row['u_id'];
								$category_name=$row['category_name'];
								$blogid1 = $row['blog_id'];
								$v=$row['verified'];
								
						?>
								
						<tbody>
						 <tr class="info">
						  <td><input type="checkbox" name="check[]" value="<?php echo $bid ?>"></td>
						  <td><?php echo $blog_head;?></td>
						  <td><img src="<?php echo $blog_image;?>" class="img-thumbnail" height="30" width="80"></td>
						  <td><?php echo $category_name;?></td>
						  <td><?php if($v=='yes')echo '<a class="btn btn-success" href="#"> VERIFIED </a>'; else { echo '<a class="btn btn-danger" href="#"> NON-VERIFIED </a>'; }?></td>
						  <td> <a class="btn btn-success"  href="usereditblog.php?bed=<?php echo $blogid1;?>" >Edit</a></td>
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
						