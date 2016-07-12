<?php include('./inc/header.inc.php'); ?>


<title>Prattle | Register </title>
</head>

<body>

	<nav class="navbar navbar-default">
		<div class="container-fluid" style="background-color:#494ca8;">
			<div class="navbar-header" style="padding-top: 25px;">
				<!-- Change here when changing the website root folder--><a href="index.php" class="navbar-brand" style="color:#d1d6d6 ;font-size:1.4em;font-weight:700;"><span style="color:white;font-size:1.43em;font-weight:900;">Prattle</span>Panel</a>
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar" style="background-color:#f2d535;"></span>
					<span class="icon-bar" style="background-color:#f2d535;"></span>
					<span class="icon-bar" style="background-color:#f2d535;"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
			<?php 
			if(!$u_id){


			echo '
			
			<ul class="nav navbar-nav navbar-right" style="padding-top:30px;font-weight:700;">
     		 <!-- Change here before submitting to the server--><li><a href="register.php"><span class="glyphicon glyphicon-sunglasses"></span> Register</a></li>
      		 
			
     		 <!-- Change here before submitting to the server--><li><a href="login.php"><span class="glyphicon glyphicon-sunglasses"></span> Login</a></li>
      		 

      		 
    		 </ul>';
    		}else{
    			echo '
    			
    			<ul class="nav navbar-nav navbar-left" style="padding-top:30px;font-weight:700;"> 
			<!-- Change here before submitting to the server--><li><a href="addchatroom.php"><span class="glyphicon glyphicon-send"></span> Add Chatroom</a>
			</li><!-- Change here before submitting to the server--><li><a href="joinchatroom.php"><span class="glyphicon glyphicon-transfer"></span> Join Chatroom</a></li>
			</ul>

			<ul class="nav navbar-nav navbar-right" style="padding-top:30px;font-weight:700;">
     		
      		 <!-- Change here before submitting to the server--><li><a href="leave.php"><span class="glyphicon glyphicon-log-out"></span> Leave</a></li>
      		 
      		 </ul>
      		 ';
    		}
    		?>
		</div>
		
		</div>
</nav>






<?php

	$log = @$_POST['log'];

	//declaring variables to prevent errors.
	$u_id = "";
	$u_key = ""; //encryption of u_password
	$u_name  = "";
	$u_enroll = "";
	$u_pic = "";
	$u_email = "";
	$u_password = "";
	
	$u_check = "";
	
	//mysql_real_escape_string prepends backslashes before some common things like inverted commas, double inverted commas etc.
	// for submitting inside the database as while entering into the database the INSERT INTO sql query has single inverted commas in it so if the content would have some inverted commas then it would create problems while storing , thus to make it work this function has to be used.


	
	

	// name for making the directory
	// for making the directory name ,the backslashes that gets prepended by mysql_real_escape_string function will not be needed to name the directory.

	// if the same thing is used for naming the directory also , then backslashes would get added up in the name of the directory and thus picture will not be displayed in the display section.
	  
	$u_name = strip_tags(@$_POST['u_name']);
	// convert the string to all lowercase
	
	$u_name_lower = strtolower($u_name);
	// Capitalise first letter of every word.


	$u_name_firstword = ucwords($u_name_lower);
	// strip out all whitespace

	$u_name_wspace = preg_replace('/\s*/', '', $u_name);
	
	
	$u_key = mysql_real_escape_string(@$_POST['u_password']);
	//md5 encrypted key
	$md5_u_key = md5($u_key);

	$u_enroll = strip_tags(@$_POST['u_enroll']);

	$u_batch = @$_POST['u_batch'];
	

	$u_year = @$_POST['u_year'];
	


	$u_pic = @$_FILES['u_pic']['name'];
	
	$u_email = mysql_real_escape_string(@$_POST['u_email']);
	$u_password = mysql_real_escape_string(@$_POST['u_password']);
	
	
	
	
	
	if($log){
		//Check if enrollment id already exists
		$u_enroll_check = mysql_query("SELECT u_enroll FROM chatusers WHERE u_enroll ='$u_enroll'");
		//Count the amount of rows where u_enroll = $u_enroll
		$enroll_check = mysql_num_rows($u_enroll_check);


		if($enroll_check == 0){
		//Check if email id already exists
		$e_check = mysql_query("SELECT u_email FROM chatusers WHERE u_email ='$u_email'");
		//Count the amount of rows where u_email = $u_email
		$check = mysql_num_rows($e_check);
		
		if($check == 0){
		
			//check all of the fields have been filled in
			if($u_name&&$u_key&&$u_enroll&&$u_batch&&$u_year&&$u_pic&&$u_email&&$u_password){
					
					

						
						//check the maximum length of username/first name/last name does not exceed 25 characters

					
						
						//Image Upload Script
						
						//Check Image filetype
						if((@$_FILES['u_pic']['type'] == "image/jpeg") || (@$_FILES['u_pic']['type'] == "image/jpg") || (@$_FILES['u_pic']['type'] == "image/gif") || (@$_FILES['u_pic']['type'] == "image/png") ){

							//Check Image Size to be less than 2 MB 
							if((@$_FILES['u_pic']['size'] < (1048576*2))){
								//This is because by default the Apache umask is set to 0022 by default.
								//Since umask is to revoke permission.
								 umask(0000);
								 $dir_name = $u_name_firstword;
								 $dir_path = "userdata/profile_pics/$dir_name"; 
								 if(mkdir($dir_path , 0777 , true)){
								 	
								 
									 if(file_exists("userdata/profile_pics/".$dir_name."/".@$_FILES['u_pic']['name'])){
									 	echo @$_FILES['u_pic']['name']."Already exists"; 
									 	}	else{	
										 		if(move_uploaded_file(@$_FILES['u_pic']['tmp_name'] , "userdata/profile_pics/$dir_name/".@$_FILES['u_pic']['name'])){

												 	
												 	//Query runs
												 	$query = mysql_query("INSERT INTO chatusers VALUES ( '' , '$md5_u_key' , '$u_name_firstword' , '$u_pic' , '$u_email' , '$u_password') ");
													if($query){
														
														die("<div class='alert alert-success'><h2>Welcome to <span style='font-size:2em;font-weight:900;'>bvulive CHAT</span></h2>Thanks for registering yourself! Enjoy!!!!!</div>");
													}else{
														echo "<div class='alert alert-danger'".mysql_error(mysql_connect("localhost" , "root" , "myniki123"))."</div>";
													}
											 	
											 	}else {
												 		//echo 'NOT uploaded';
												 }
									 	
									 		}
								 }else{
									 	//echo 'Folder not created';
									 }

							}else{
								echo '<div class="alert alert-info">Please Upload an image of file size less than 1 MB.For anything else you are most welcomed to send <a href="#">admin</a> an email!</div>';
							}
						}else{
							echo '<div class="alert alert-info">Please Upload image in either jpeg, gif or png format. For more details you are more than welcomed to send <a href="#">admin</a> an email!</div>';
						}

						
				
					

					
					

							


			}else{
				echo '<div class="alert alert-info">Please fill in all the fields!</div>';

			}
		}else{
			echo '<div class="alert alert-info">This email already exists!</div>';
		}
	}else{
		echo '<div class="alert alert-info">This enrollment number is already registered with us</div>';
	}

	}else{
		echo "<h1>Error. Contact the web admin @admin@bvulive.in</h1>";
	}

?>




<?php include('./inc/footer.inc.php');?>