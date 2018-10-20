<body>
<!--------------Header--------------->

<?php 
		include 'header.php';

	?>
	 
<!--------------Content--------------->
<section id="content">
	<div class="wrap-content zerogrid">
		<div class="row block05">
			<div class="title"><span>BLOG</span></div>
			<div class="col-2-3">
				<div class="wrap-col">
						<?php 
						 $con=mysqli_connect("localhost","root","","blogging");
						 if(isset($_GET['b']))
						 {
							 $bid=$_GET['b'];
							 $qry1="SELECT * FROM post WHERE blog_id='$bid'";
								$qry=mysqli_query($con,$qry1);
						 }
						while($row=mysqli_fetch_assoc($qry))
						 {
							 $bid=$row['blog_id'];
							 $bhead=$row['blog_head'];
							 $bimage=$row['blog_image'];
							 $desc=$row['blog_description'];
							 $bdate=$row['blog_date'];
							 $catname=$row['category_name'];
							 $uid=$row['u_id'];
							 $fname=$row['name'];?>
					<article>
						<h2><a href="#"><?php echo $bhead ; ?></a></h2>
						<div class="info">Posted By <?php echo"$fname";?> | &nbsp Posted On <?php echo "$bdate";?> | &nbsp Posted In <?php echo "$catname"; ?></div>
						<img src = <?php echo"$bimage";?> >
						<p><?php echo"$desc" ?></p>
						<br>
						<div >
					<!--	<form >
							Your credentials will be confidential. Please login for comment on posts.
							<br >
							
								<textarea rows="5" cols="70" name="comment" id="comment" style='border:2px solid #CCC'></textarea>
								<br >
								<center><input type="submit" name="submit" value="Submit"><center>
							</form> -->
						</div>
						</article>
					
						 <?php } ?>
				</div>
			</div>
				<div class="col-1-3">	
					<div class="box">
						<div class="heading"><h2>Categories</h2></div>
						<div class="content">
							<div class="list">
								<ul>
								<?php 
								 $sql="SELECT * from category";
								 $qry=mysqli_query($con,$sql);
								 while($row=mysqli_fetch_assoc($qry))
									{
										$catname=$row['category_name'];
										$catid=$row['category_id'];
										?>
									<li><a href="index.php?c=<?php echo "$catname";?>"><?php echo "$catname"?></a></li>
									<?php } ?>
									</ul>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</section>
<!--------------Footer--------------->
<?php include 'footer.php'?>
