<?php
	
	$pg="";
	if(isset($_GET['page']))
	$pg=$_GET['page'];
								
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

    <!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title><?php echo "$pg";?></title>
	<meta name="description" content="Free Html5 Templates and Free Responsive Themes Designed by Kimmy | zerotheme.com">
	<meta name="author" content="www.zerotheme.com">
	
    <!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <!-- CSS
  ================================================== -->
	
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<script src="js/jquery3.2.1.min.js "></script>
		<script src ="js/bootstrap.min.js "></script>
	<link rel="stylesheet" href="css/zerogrid.css">
	<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
	<link rel="stylesheet" href="css/responsiveslides.css" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<script rel="text/js" src="js/editorfile.js"> </script>
	
	<!--[if lt IE 8]>
       <div style=' clear: both; text-align:center; position: relative;'>
         <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
           <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
        </a>
      </div>
    <![endif]-->
    <!--[if lt IE 9]>
		<script src="js/html5.js"></script>
		<script src="js/css3-mediaqueries.js"></script>
	<![endif]-->
	
	<link href='./images/favicon.ico' rel='icon' type='image/x-icon'/>
    
	<script src="js/jquery.min.js"></script>
	<script src="js/responsiveslides.js"></script>
	<script src="js/jquery3.2.1.min.js "></script>
		<script src ="js/bootstrap.min.js "></script>
	<script>
		$(function () {
		  $("#slider").responsiveSlides({
			auto: true,
			pager: false,
			nav: true,
			speed: 500,
			maxwidth: 962,
			namespace: "centered-btns"
		  });
		});
	</script>
</head>
<body>
<header>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="wrap-header zerogrid">
						<div id="logo"><img src="./images/logo1.png" width="190px" ></div>
						<div class="social">
							<ul>
								<li><a href="#"><img src="./images/social/facebook-icon.png" /></a></li>
								<li><a href="#"><img src="./images/social/google-icon.png" /></a></li>
								<li><a href="#"><img src="./images/social/twitter-bird-icon.png" /></a></li>
								<li><a href="#"><img src="./images/social/rss-icon.png" /></a></li>
							</ul>
						</div>
						<nav>
						
							<div class="wrap-nav">
								<div class="menu">
									<ul>
									
										<li ><a href="database.php?us=user">Home</a></li>
										<li><a href="database.php?v=userprofile">Profile </a></li>
										<li><a href="database.php?myb=mblog">My Blogs </a></li>
										<li><a href="database.php?blow=job">Post Blogs </a></li>
										<li><a href="database.php?lg=out">Logout</a></li>
									
									</ul>
								</div>
								
								<div class="minimenu"><div>MENU</div>
									<select onchange="location=this.value">
										<option></option>
										<option value="user.php">Blog</option>
										<option value="profile.php">Blog</option>
											<option value="logout.php">Logout</option>
									</select>
								</div>
							</div>
						</nav>
						
					</div>
				</div>
			</div>
		</div>	
</header>
</body>
</html>