<html>
	<?php
				include 'a_header.php';		
	?>
	<head>
		<title> My Blogs </title>
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
													<a class="btn btn-success" href="database.php?vb=verified">Verified Blogs</a>
													<a class="btn btn-success" href="database.php?nvb=nonverified">Non-Verified Blogs</a>
													<a class="btn btn-success" href="database.php?bb=block">Block Blogs</a>
													<a class="btn btn-success" href="database.php?ub1=unblockb">Unblock Blogs</a>
													<a class="btn btn-success" href="database.php?db=delete">Delete Blogs</a>
													<hr>
													<br>
			<form action="database.php" method="POST">
		<div class="container">
			<div class="row">
				<div class="col-sm-12" "well">
					<center><h2> All Non Verified Blogs</h2> </center>
					
									
											<input class="btn btn-success" type="submit" name="blogverify" value="Verify"  >
									
											<input class="btn btn-warning" type="submit" name="blogblock" value="Block"  >
											<input class="btn btn-danger"type="submit" name="blogdelete" value="Delete"  >
									<table class="table table-striped table-hover">
									<thead>
									<tr>
									<th><label><input type="checkbox" id="checkAll" name="check[]" onClick="selectAll(this)"> Select All </label> </th>
									<th>Blog heading</th>
									<th>Blog Image</th>
									<th>Blog Category</th>
									<th>Posted By</th>
									
									</tr>
					  </thead>
							
						<?php
							$bid=$_SESSION['id'];
							$qry =" SELECT* FROM user_detail";
							$res = mysqli_query($con,$qry);
							foreach($res as $row)
							{
								$id=$row['u_id'];
							}
							$qry1="SELECT * FROM post where verified='no'";
							$res1=mysqli_query($con,$qry1);
							foreach($res1 as $row1)
							{
								$blog_head=$row1['blog_head'];
								$blog_image=$row1['blog_image'];
								$blog_describe=$row1['blog_description'];
								
								$u_id=$row1['u_id'];
								$category_name=$row1['category_name'];
								$bid=$row1['blog_id'];
							
						?>
						
						<tbody>
						 <tr class="info">
						  <td><input type="checkbox" name="check[]" value="<?php echo $bid ?>"></td>
						  <td><?php echo $blog_head;?></td>
						  <td><img src="<?php echo $blog_image;?>" class="img-thumbnail" height="30" width="80"></td>
						  <td><?php echo $category_name;?></td>
						  <td><?php echo $u_id;?></td>
						  
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
						