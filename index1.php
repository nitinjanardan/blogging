<?php
	
include 'header.php';
?>
<body>
<!--------------Header--------------->


	 
<!--------------Content--------------->
<section id="content">
	<div class="wrap-content zerogrid">
		<div class="row block05">
			<div class="title"><span>BLOG</span></div>
			<div class="col-2-3">
				<div class="wrap-col">
						<?php 
						 $con=mysqli_connect("localhost","root","","blogging");
						 if(isset($_GET['c']))
						 {
							 $cat=$_GET['c'];
							 $qry1="SELECT * FROM post where category_name='$cat'";
							 $res1=mysqli_query($con,$qry1);
						 } 
						 else
						 {
							$qry1="SELECT * FROM post";
							 $res1=mysqli_query($con,$qry1);
						  
						 }
						 while($row=mysqli_fetch_assoc($res1))
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
						<p><?php echo"$desc" ?>......</p>
						<a href ="single.php?b=<?php echo"$bid"?>">Read more.....</a>
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
									<li><a href="index.php?c=<?php echo "$catname";?>"><?php echo "$catname";?></a></li>
									<?php } ?></ul>
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
