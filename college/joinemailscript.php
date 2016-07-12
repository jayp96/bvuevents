<?php include('./inc/header.inc.php'); ?>


<title>Prattle | Login </title>
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

<div class="text-center">
<h2>Prattle | Chatroom Login</h2>
</div>


<?php

$login = @$_POST['login'];
//declaring variables to prevent errors.
$d_name = ""; //chatroom name
$cr_username = ""; //chatroom username




$d_name = mysql_real_escape_string(strip_tags($_POST['d_name']));
$cr_username = mysql_real_escape_string(strip_tags($_POST['cr_username']));
$cr_username_lower = strtolower($cr_username);
$cr_username_first_capital = ucwords($cr_username_lower);




if($login){


$chatname_sql = mysql_query("SELECT * FROM chatroom_login WHERE d_name='$d_name'"); // query the chat
	//Check for their existence
	$chatname_count = mysql_num_rows($chatname_sql);
	if($chatname_count==0){
		echo '<div class="alert alert-info">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<h3>No such ChatRoom exists.<br> Please try again.</h3>
		</div>';

	}else{
		$i = 0;
		while($chat_login = mysql_fetch_assoc($chatname_sql)){
			$chat_user[$i]['cr_username'] = $chat_login['cr_username']; 
			
			
			$i++;
		} 

	
		$result_flag = 0;
		$num_rows_total = $i;
		
		for($i=0;$i<$num_rows_total;$i++){
			
			if(!strcmp($cr_username_first_capital,$chat_user[$i]['cr_username'])){
				
				
				$result_flag = 1;
				$chat_username = $cr_username_first_capital;
				
				
				

			}else{
				
			}
		}

		if($result_flag == 1){
			
			echo '<div class="alert alert-success">
		  	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	  		<h3>Welcome to your own ChatROOM</h3><h1>'.$d_name.'</h1><br>
			</div>



			';

			$chat_sql = mysql_query("SELECT d_name FROM chatroom_login WHERE cr_username = '$chat_username'");
			$chat_result_sql = mysql_fetch_assoc($chat_sql);
			
			$chat_name = $chat_result_sql['d_name'];
			$_SESSION["chat_name"] = $chat_name; //will be used to set username and password related to this database/chat-name.
			

			
			 // Redirecting here...	 
			 echo '<script> location.replace("setuser.php"); </script>';
			 exit();


		}else{
			
			echo '<div class="alert alert-danger">
		  	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	  		<h3>Wrong Invite Member entered</h3><br> <h3>Please try again.</h3>
			</div>';

		}

	}






}


?>









<?php include('./inc/footer.inc.php');?>