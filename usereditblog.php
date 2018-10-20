	<?php include 'user_header.php' ?>
		<script type="text/javascript">
	//<![CDATA[
		bkLib.onDomLoaded(function() {
		new nicEditor().panelInstance('area1');
        new nicEditor({fullPanel : true}).panelInstance('area1');
        new nicEditor({iconsPath : '../nicEditorIcons.gif'}).panelInstance('area1');
        new nicEditor({buttonList : ['fontSize','bold','italic','underline','strikeThrough','subscript','superscript','html','image']}).panelInstance('area1');
   	    new nicEditor({maxHeight : 100}).panelInstance('area1');
	});
	
	
	</script>

		<title>Blog</title>
	</head>
		<body>
			<?php
				$con=mysqli_connect("localhost","root","","blogging");
				if(isset($_GET['bed']))
				{	
				$blogid1=$_GET['bed'];
				$sel="SELECT * FROM post where blog_id=$blogid1";
				$qry=mysqli_query($con,$sel);
				$row=mysqli_fetch_assoc($qry);
				$ebhead=$row['blog_head'];
				$ecatname=$row['category_name'];
				$eimage=$row['blog_image'];
				$edesc=$row['blog_description'];
				
				?>
			<br /><br />
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
					<div class="well">
						<fieldset>
							<form action="database.php?ebidu=<?php echo $blogid1?>" method="POST" enctype="multipart/form-data">
								<div class="col-sm-12">
									<div class="form-group">
										<label>Blog Heading:</label>
										<input type="text" name="bhead" class="form-group" size="50" value="<?php echo "$ebhead";?>" >
									</div>
								</div>	
								<div class="col-sm-12">
									<div class="form-group">
										<label>Category:</label>
											<select name="category">
											<option value="<?php echo"$ecatname";?>"> <?php echo"$ecatname";?></option>		
										</select>
										</div>
								</div>
									
								<div class="col-sm-12">
									<div class="form-group">
										<label>Blog Image:</label>
										<input type="file" name="ebupload" value="<?php echo"$eimage";?>">
									</div>
								</div>
										
								
								<div class="col-sm-12">
									<div class="form-group">
										<label>Blog Description :</label>
									</div>
								</div>	
								<div class="col-sm-12">
									<div class="form-group">
										<textarea class="form-control" name="ta" id="area1" value="<?php echo $edesc;?> "> <?php echo $edesc;?>  </textarea>
									</div>
								</div>
								<div class="col-sm-12">
									<div class="form-group">
										<input type="submit" name="userediting" class="form-group" value="Done" style="height:30px; width:50px;color:white; background-color:black;">
									</div>
								</div>
							</form>
						</fieldset>
						</div>
					</div>	
				</div>	
				<?php } ?>