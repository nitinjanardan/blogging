<?php 
	$blo=$_SESSION['ro'];
	//$cate2=$_SESSION['cate'];
	if($blo=='admin')
	{
		include 'a_header.php';
	}
	else
	{
		include 'user_header.php';
	}
	
	$selc="SELECT * FROM category ";
	$qryc= mysqli_query($con,$selc);
	
?>
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
			<br /><br />
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
					<div class="well">
						<fieldset>
							<form action="database.php" method="POST" enctype="multipart/form-data">
								<div class="col-sm-12">
									<div class="form-group">
										<label>Blog Heading:</label>
										<input type="text" name="bhead" class="form-group" size="50">
									</div>
								</div>	
								<div class="col-sm-12">
									<div class="form-group">
										<label>Category:</label>
											<select name="category1">
											<?php foreach($qryc as $categ)
												{	
													$name=$categ['category_name'];
												?> 
												
												<option value="<?php echo"$name";?>"> <?php echo"$name";?></option>		
											
										<?php } ?>
										</select>
										</div>
								</div>
									
								<div class="col-sm-12">
									<div class="form-group">
										<label>Blog Image:</label>
										<input type="file" name="bupload" >
									</div>
								</div>
										
								
								<div class="col-sm-12">
									<div class="form-group">
										<label>Blog Description :</label>
									</div>
								</div>	
								<div class="col-sm-12">
									<div class="form-group">
										<textarea class="form-control" name="ta" id="area1"> </textarea>
									</div>
								</div>
								<div class="col-sm-12">
									<div class="form-group">
										<input type="submit" name="blogup" class="form-group" value="POST" style="height:30px; width:50px;color:white; background-color:black;">
									</div>
								</div>
							</form>
						</fieldset>
						</div>
					</div>	
				</div>	
