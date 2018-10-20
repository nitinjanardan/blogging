<?php
	session_start();
	$con=mysqli_connect("localhost","root","","blogging");
	if(isset($_POST['reg']))		// registration
	{
		$fname=$_POST['u_fname'];
		$lname=$_POST['u_lname'];
		$email=$_POST['u_email'];
		$pass=$_POST['u_password'];
		$cpass=$_POST['u_cpassword'];
		$mobno=$_POST['u_mob_no'];
		$dob=$_POST['u_dob'];
		$gen=$_POST['u_gender'];
		$city=$_POST['u_city'];
		$addr=$_POST['u_address'];
		
		if(empty($fname && $lname && $email && $pass && $cpass && $mobno && $dob && $gen && $city && $addr ))
		{
			$msg="Please Enter the required field";
			 header('location:registration.php?re='.$msg);
		}
		elseif($pass==$cpass)
		{
			$sel="SELECT * FROM  user_detail WHERE u_email='$email'";
			$qry=mysqli_query($con,$sel);
			$row=mysqli_fetch_assoc($qry);
			$demail=$row['u_email'];
			
			
			if($demail==$email)
			{
				$msg1="Email already exist";
				header('location:registration.php?re='.$msg1);
			}
			else
			{
				$ins="INSERT INTO user_detail (u_fname,u_lname,u_email,u_password,u_mob_no,u_dob,u_gender,u_city,u_address) VALUES ('$fname','$lname','$email','$pass','$mobno','$dob','$gen','$city','$addr')";
				$qry1=mysqli_query($con,$ins);
				header('location:login.php');
				$msg2="Your Account has been created Successfully";
				header('location:login.php?su='.$msg2);
			}
		}
		else
		{
			$msg3="Wrong Password";
			header('location:registration.php?re='.$msg3);
		}
	}
	elseif(isset($_POST['login']))    // login
	{
		
		$email = $_POST['u_email'];
		$pass = $_POST['u_pass'];
		$_SESSION['nit']=$email;
		
		if(empty($email && $pass))
		{
			$msg3="Please fill empty field";
			header('location:login.php?re='.$msg3);
		}
		else
		{
			$sel2="SELECT * FROM user_detail WHERE u_email='$email' AND u_password='$pass'" ;
			$qry2=mysqli_query($con,$sel2);
			$row1=mysqli_fetch_assoc($qry2);
				$role=$row1['role'];
				$_SESSION['ro']=$role;
				$id=$row1['u_id'];
				$_SESSION['id']=$id;
				$verified=$row1['verified'];
				$block=$row1['block'];
				$fname=$row1['u_fname'];
				$_SESSION['name']=$fname;
				
				if($row1>0)
			{
				if($role=='admin' && $verified=='yes' && $block=='no')
				{
				require 'profile.php';
				}
				elseif($role=='admin' && $verified=='no' && $block=='yes')
				{
					$msg4="Wait your accont has been verifying";
					header('location:login.php?re='.$msg4);	
				}
				elseif($role=='admin' && $verified=='yes' && $block=='yes')
				{
					$msg3="Your account has been blocked for some reason";
					header('location:login.php?re='.$msg3);
				}
				else
				{
					require 'profile.php';
				}
			}
			else
			{
				$msg5="Login Failed";
				header('location:login.php?re='.$msg5);
					require 'registration.php';
			}
		}
	}	
	elseif(isset($_POST['upload'])) //file upload
	{
		$upload=$_SESSION['nit'];
		$target_file = "upload/".basename($_FILES["fileupload"]["name"]);
		$query = "update user_detail set u_image='$target_file' where u_email='$upload'";
		if(($_FILES["fileupload"]["type"]=="image/txt")or($_FILES["fileupload"]["type"]=="image/pdf"))
		{
			echo "invalid file format!!!";
		}
		else
		{
			if(!mysqli_query($con,$query))
			{
				echo mysqli_error($con);
			}
			if(move_uploaded_file($_FILES["fileupload"]["tmp_name"], $target_file))
			{
				require 'profile.php';    
					
			}
		}
	}
	elseif(isset($_POST['edit']))   //edit coding
	{
		$upload=$_SESSION['nit'];
		require 'edit.php';
	}
	elseif(isset($_POST['update'])) //update coding 
	{
		$upload=$_SESSION['nit'];
		$efname=$_POST['fname'];
		$elname=$_POST['lname'];
		$eemail=$_POST['email'];
		$emobno=$_POST['mobile_no'];
		$edob=$_POST['dob'];
		$egender=$_POST['gender'];
		$epass=$_POST['pass'];
		$eaddr=$_POST['address'];
		$ecity=$_POST['city'];
		
		$sel3 =" UPDATE user_detail SET u_fname='$efname',u_lname='$elname',u_email='$eemail',u_password='$epass',u_mob_no='$emobno',u_dob='$edob',u_gender='$egender',u_address='$eaddr',u_city='$ecity' WHERE u_email='$eemail'";
			$qry3=mysqli_query($con,$sel3);
			
			if(!$qry3)
			{
				echo "error";
			}
			else
			{
				require 'profile.php';
			}
			
	}
	elseif(isset($_POST['out'])) //logout
	{
		session_unset();
		session_destroy();
		require 'login.php';
	}
	
	
	elseif(isset($_GET['profile']))	// profile page coding header
	{
		require 'profile.php';
	}
	
	elseif(isset($_POST['deleted1']))	//delete coding
	{
		
		$var2=$_POST['check'];
		foreach($var2 as $row)
		{
			$qry2="UPDATE user_detail SET is_delete = '0' WHERE u_id ='$row'";
			$res2=mysqli_query($con,$qry2);
		}
		require 'delete.php';
		
	}
	elseif(isset($_GET['v']))  //href profile user header coding
	{
			$a=$_GET['v'];
			if($a=="userprofile")
			{	
				require 'profile.php';
			}	
	}
	elseif(isset($_GET['us']))  //href user header coding 
	{
		$g=$_GET['us'];
		if($g=="user")
		{
			header('location: index.php');
		}
	}
	elseif(isset($_GET['lg']))  //href user header coding 
	{
		$g=$_GET['lg'];
		if($g=="out")
		{
			require 'logout.php';
		}
	}
	elseif(isset($_GET['ad']))  // href admin header  coding
	{
		$ge=$_GET['ad'];
		if($ge=="a_head")
		{
			header ('location: index.php');
		}
	}
	
	elseif(isset($_GET['asd'])) //href admin profile coding
	{
		$ge=$_GET['asd'];
		
		if($ge=="adminprofile")
		{
			require 'profile.php';
		}
	}
	
	elseif(isset($_GET['nvr'])) // href nonverified coding
	{
		$ge=$_GET['nvr'];
		if($ge=="nv")
		{
			require 'non-verified.php';
		}
	}
	
	elseif(isset($_GET['vri']))	//href verified coding
	{
		$ge=$_GET['vri'];
		if($ge=="vr")
		{
			require 'verified.php';
		}
	}
	
	elseif(isset($_GET['bk'])) //href block coding
	{
		$ge=$_GET['bk'];
		if($ge=="blk")
		{
			require 'block.php';
		}
	}
	
	elseif(isset($_GET['ub']))  // href unblock coding
	{
		$ge=$_GET['ub'];
		if($ge=="unblock")
		{
			require 'unblock.php';
		}
	}
	
	elseif(isset($_GET['d'])) // href  delete coding
	{
		$ge=$_GET['d'];
		if($ge=="del")
		{
			require 'delete.php';
		}
	}
	elseif(isset($_GET['my'])) // href my account nav bar coding
	{
		$my1=$_GET['my'];
		if($my1=="acc")
		{
			require 'profile.php';
		}
	}
	elseif(isset($_GET['blow'])) //  href post blog for both user n admin 
	{
		$se=$_GET['blow'];
		if($se=="job")
		{
			require 'blog.php';
		}
	}
		elseif(isset($_GET['abl'])) //  href post blog for both user n admin 
	{
		$se=$_GET['abl'];
		if($se=="ablog")
		{
		
			require 'postblog.php';
				
		}
	}	
	elseif(isset($_GET['myb'])) //href userblog
	{
		$ab=$_GET['myb'];
		if($ab=="mblog")
		require 'userblog.php';
	}
	
	elseif(isset($_POST['blogup']))  /// post blog coding
	{
		$blog = $_POST['bhead'];         // blog heading post
		$addr=$_POST['ta'];
		 $bid=$_SESSION['id'];	
		 $fname=$_SESSION['name'];
		 $role=$_SESSION['ro'];
		 		 
		$target_file1 = "upload/".basename($_FILES["bupload"]["name"]);
		
		if(($_FILES["bupload"]["type"]=="image/txt")or($_FILES["bupload"]["type"]=="image/pdf"))
		{
			echo "invalid file format!!!";
		}
		else
		{
			
			if(move_uploaded_file($_FILES["bupload"]["tmp_name"], $target_file1))
			{
				 	
			}
		}
		 $bcategory=$_POST['category1'];
		
		 $qry1="INSERT INTO post(blog_head,blog_description,u_id,category_name,blog_image,name) VALUES ('$blog','$addr','$bid','$bcategory','$target_file1','$fname')";
					$fin=mysqli_query($con,$qry1);
					if($role=='admin')
					{
					require 'postblog.php';
					}
					else
					{
						require 'userblog.php';
					}
	}
	elseif(isset($_POST['blogverify'])) // verify button coding
	{
			$checkv=$_POST['check'];
		
		foreach($checkv as $row)
		{
			$qry2="UPDATE post SET verified = 'yes' WHERE blog_id ='$row' ";
			$res2=mysqli_query($con,$qry2);		
		}
		require'postblog.php';
	}
	
	elseif(isset($_POST['blogblock']))	//blog block coding
	{
			$checkv=$_POST['check'];
		
		foreach($checkv as $row)
		{
			$qry2="UPDATE post SET block = 'yes' WHERE blog_id ='$row' ";
			$res2=mysqli_query($con,$qry2);		
		}
		require'blockblog.php';
	}
	elseif(isset($_POST['ublogblock'])) //unblock blog coding
	{
			$checkv=$_POST['check'];
		
		foreach($checkv as $row)
		{
			$qry2="UPDATE post SET block = 'no' WHERE blog_id ='$row' ";
			$res2=mysqli_query($con,$qry2);		
		}
		require'unblockblog.php';
	}
	elseif(isset($_POST['blogdelete'])) // blog delete coding
	{
			$checkv=$_POST['check'];
		
		foreach($checkv as $row)
		{
			$qry2="UPDATE post SET is_delete = 'yes' WHERE blog_id ='$row' ";
			$res2=mysqli_query($con,$qry2);		
		}
		require'deleteblog.php';
	}
	elseif(isset($_POST['blogrestore'])) // restore blog coding 
	{
			$checkv=$_POST['check'];
		
		foreach($checkv as $row)
		{
			$qry2="UPDATE post SET is_delete = 'no' WHERE blog_id ='$row' ";
			$res2=mysqli_query($con,$qry2);		
		}
		require'postblog.php';
	}
	elseif(isset($_GET['vb']))
	{
		$vbb=$_GET['vb'];
		if($vbb="verified")
		{
			require 'verifiedblog.php';
		}
	}
	elseif(isset($_GET['nvb']))
	{
		$vbb=$_GET['nvb'];
		if($vbb="nonverified")
		{
			require 'non-verifiedblog.php';
		}
	}
	elseif(isset($_GET['bb']))
	{
		$vbb=$_GET['bb'];
		if($vbb="block")
		{
			require 'blockblog.php';
		}
	}
	elseif(isset($_GET['ub1']))
	{
		$vbb=$_GET['ub1'];
		if($vbb="unblockb")
		{
			require 'unblockblog.php';
		}
	}
	elseif(isset($_GET['db']))
	{
		$vbb=$_GET['db'];
		if($vbb="delete")
		{
			require 'deleteblog.php';
		}
	}
	elseif(isset($_GET['userblogblock']))
	{
		$checkv=$_POST['check'];
		
		foreach($checkv as $row)
		{
			$qry2="UPDATE post SET block = 'yes' WHERE blog_id ='$row' ";
			$res2=mysqli_query($con,$qry2);		
		}
		require'userblog.php' ;
	}
	elseif(isset($_GET['be']))
	{
		require 'editblog.php';
	}
	elseif(isset($_POST['editing']))
	{
		$role=$_SESSION['ro'];
		$uid=$_SESSION['id'];
		$eblog=$_GET['ebid'];
		$blog_head=$_POST['bhead'];
			$target_file1 = "upload/".basename($_FILES["ebupload"]["name"]);
		$blog_describe=$_POST['ta'];
		$category_name=$_POST['category'];
		
		
			$qry8="UPDATE post SET blog_head='$blog_head', blog_image='$target_file1', blog_description='$blog_describe', category_name='$category_name' WHERE blog_id='$eblog' ";
			$res8=mysqli_query($con,$qry8);
		
		require 'postblog.php';
	}
	elseif(isset($_POST['userediting']))
	{
		
		$uid=$_SESSION['id'];
		$eblog1=$_GET['ebidu'];
		$blog_head=$_POST['bhead'];
			$target_file1 = "upload/".basename($_FILES["ebupload"]["name"]);
		$blog_describe=$_POST['ta'];
		$category_name=$_POST['category'];
		
		
			$qry8="UPDATE post SET blog_head='$blog_head', blog_image='$target_file1', blog_description='$blog_describe', category_name='$category_name' WHERE blog_id='$eblog1' ";
			$res8=mysqli_query($con,$qry8);
		
		require 'userblog.php';
	}
	elseif(isset($_POST['verify'])) // verify coding button
	{
		$var2 = $_POST['check'];
		foreach($var2 as $row2)
		{
			$qry="UPDATE user_detail SET verified = 'yes' WHERE u_id='$row2'";
			$res=mysqli_query($con,$qry);
		}
		require 'verified.php';
	}
	elseif(isset($_POST['blocked'])) // block button coding
	{
		$var2= $_POST['check'];
		//print_r($var2);
		foreach($var2 as $row2)
		{
			$qry= "UPDATE user_detail SET block='yes' WHERE u_id='$row2' ";
			//echo $qry;
			$res=mysqli_query($con,$qry);
		}
		require 'block.php';
	}
	elseif(isset($_POST['ublocked'])) // unblock button coding
	{
		$var2= $_POST['check'];
		//print_r($var2);
		foreach($var2 as $row2)
		{
			$qry= "UPDATE user_detail SET block='no' WHERE u_id='$row2' ";
			//echo $qry;
			$res=mysqli_query($con,$qry);
		}
		require 'unblock.php';
	}
?>