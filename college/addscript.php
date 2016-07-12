<?php include('./inc/header.inc.php'); ?>


<title>Prattle | Create Chatroom </title>
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

$create = @$_POST['create'];
//declaring variables to prevent errors.
$c_name = ""; //will be used to create a database
$c_key = ""; //will be used to check existence
$c_username = ""; //will be used to login
$c_password = ""; //will be used to login
$c_description = ""; //description




$c_name = mysql_real_escape_string(strip_tags($_POST['c_name']));
$c_name_lower = strtolower($c_name);
$c_name_first_capital = ucwords($c_name_lower);

$c_key = md5($c_name_lower);

$c_username= mysql_real_escape_string(strip_tags($_POST['c_username']));

$c_password = mysql_real_escape_string(strip_tags($_POST['c_password']));

$c_description = mysql_real_escape_string(strip_tags($_POST['c_description']));
if($create){

$sql = mysql_query("SELECT * FROM chatroom WHERE c_key='$c_key'"); // query the chatroom name
	//Check for their existence
	$count = mysql_num_rows($sql); //Count the number of rows returned
	if ($count == 0) {

		//MAKING USERNAME UNIQUE
		$username_sql = mysql_query("SELECT * FROM chatroom WHERE c_username = '$c_name_first_capital'"); // query the username
		$username_count = mysql_num_rows($username_sql);
		if($username_count==0){

		

		//check all of the fields have been filled in
		if($c_name&&$c_key&&$c_username&&$c_password&&$c_description){
			
			$sql_insert = mysql_query("INSERT INTO chatroom VALUES ( '' , '$c_name_first_capital' , '$c_key' , '$c_username' , '$c_password' , '$c_description') ");

			if($sql_insert){
														
				echo "<div class='alert alert-success'><h2>Welcome to <span style='font-size:2em;font-weight:900;'>Prattle CHAT</span></h2>Your chatroom is being created..</div>";

					//changing database to chats to accomodate all the chats.
					mysql_select_db("chats") or die("Couldn't select Chat DB.Contact webadmin@....");
					
					//creating table dynamically in "chats" database.
					$sql_create_table = "CREATE TABLE ".$c_name_first_capital." (
					chat_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
					chat_name VARCHAR(30) NOT NULL,
				 	chat_message TEXT NOT NULL,
					chat_time TIMESTAMP
					)";

					if(mysql_query($sql_create_table)){
						echo "<div class='alert alert-info'><h4>Your chatroom is ready now!</h4></div>";
					}else{
						echo "<div class='alert alert-danger'".mysql_error(mysql_connect("localhost" , "root" , "myniki123"))."</div>"; //change here
					}
					mysql_select_db("bvuevents") or die("Couldn't revert back to the previous database");
					$sql_insert_chatroom_login = mysql_query("INSERT INTO chatroom_login VALUES ('', '$c_username', '$c_password', '$c_name_first_capital')");
					if($sql_insert_chatroom_login){
						echo "<div class='alert alert-info'><h4>Explore....</h4></div>";
					}else{

						echo "<div class='alert alert-danger'".mysql_error(mysql_connect("localhost" , "root" , "myniki123"))."</div>"; //change here
					}


					echo '<div class="col-sm-6">
					<div id="login">
						<div class="text-center">
							<a href="joinchatroom.php" class="btn btn-primary" role="button">Log On</a>
						</div>
					</div>
					</div>
					</div>';

			}
			else
			{	
				echo "<div class='alert alert-danger'".mysql_error(mysql_connect("localhost" , "root" , "myniki123"))."</div>"; //change here
			}

		}else{
			echo "<div class='alert alert-danger><h4>Please fill in all the fields</h4></div>";
		}
	}
	else
	{
		echo "<div class='alert alert-info><h4>Username already exists!!</h4></div>";
	}
	

	} 
	else 
	{
	echo '<div class="alert alert-info">
  	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  	<h3>Chatroom name is already in use.<br> Try with another one.</h3>	
	</div>';
		
	}


}


?>





<?php include('./inc/footer.inc.php');?>