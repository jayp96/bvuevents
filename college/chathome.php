<?php include('./inc/header.inc.php'); ?>


<title>Prattle | ChatNow </title>
</head>
<style>

#messages{

	width: 500px;
	height: 300px;
	padding: 5px;
	margin: 10px;
	border: 1px solid #CCC;
	overflow: auto;

}

#feedback{

	font-family: 'Secular One', sans-serif;
	font-size: 1.5em;
	font-weight: 300;
	font-color: #4059e5;

}
</style>
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

	$chatname_extract_sql = mysql_query("SELECT * FROM chatroom_login WHERE cr_id='$c_id'");

	while($chatname_extract_array = mysql_fetch_assoc($chatname_extract_sql)){
	$chatname_details['cr_id'] = $chatname_extract_array['cr_id'];
	$chatname_details['cr_username'] = $chatname_extract_array['cr_username'];
	$chatname_details['cr_password'] = $chatname_extract_array['cr_password'];
	$chatname_details['d_name'] = $chatname_extract_array['d_name']; 
}
	$_SESSION["chat_name"] = $chatname_details['d_name']; //will be used to refer in php scripts folder

	echo "<h2>Welcome ".$chatname_details['cr_username']."</h2>";





?>

<?php mysql_select_db("chats") or die("Couldn't select DB");?>
<?php

function send_msg($sender, $message){

	if(!empty($sender) && !empty($message)){

			$esc_sender = mysql_real_escape_string($sender);
			$esc_message = mysql_real_escape_string($message);

			$query = mysql_query("INSERT INTO ".$_SESSION["chat_name"]." VALUES ('', '$esc_sender', '$esc_message', '')");

			if($query){

				//echo "Message inserted in the database successfully.";
				return true;
			}else{
				//echo "Message not inserted.";
				return false;
			}



		}else { echo 'Please insert values in the fields'; return false;}
 
}





function get_msg(){

	$query = mysql_query("SELECT * FROM ".$_SESSION["chat_name"]);

	$i = 0;

	while($chat = mysql_fetch_assoc($query)){

		$info[$i]['chat_id'] = $chat['chat_id'];
		$info[$i]['chat_name'] = $chat['chat_name'];
		$info[$i]['chat_message'] = $chat['chat_message'];
		$info[$i]['chat_time'] = $chat['chat_time'];

		$i++;

	}
	$rows = mysql_num_rows($query);

	for($i;$i--;$i>0){

		echo "Sender ".$info[$i]['chat_name']. "<br />";
		echo $info[$i]['chat_message']."<br /><br />";


	}

	}


	
		if(isset($_POST['send'])){

			$sender = $_POST['sender'];
			$message = $_POST['message'];
			
			if(send_msg($sender, $message)){
				echo "<div id='feedback' style='font-family: \'Secular One\', sans-serif;font-size: 1.5em;font-weight: 300;color:#4059e5;text-align:center'>Message successfully sent!</div>";

				

			}else{
				
				echo "<div id='feedback' style='font-family: \'Secular One\', sans-serif;font-size: 1.5em;font-weight: 300;color:#4059e5;text-align:center'>Message Failed to send.</div>";
			}
		}
	
	



?>
<div id="messages">

	<?php get_msg();?>

</div> <!--Messages -->

<form role="form" method="POST" action="chathome.php" class="form-horizontal" id="form_input">
	<div>&nbsp;</div>
	
	
	


	<div class="col-sm-offset-2 col-sm-7">
	<div class="form-group">
		
		<div class="col-sm-10">
			<input type="text" class="form-control" name="sender" value="<?php echo $chatname_details['cr_username'];?>" id="sender" readonly>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-sm-2" for="message">Message:</label>
		<div class="col-sm-10">
			<textarea class="form-control" rows="5" name="message" id="message" placeholder="Type your text here..." ></textarea>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-6 col-sm-6">
			<input type="submit" class="btn btn-default" name="send" value="Send Message">	
		</div>
	</div>
	</div>

</form>

<!-- Javascripts -->
<script type="text/javascript" src="scripts/js/auto_chat.js"></script>



<?php include('./inc/footer.inc.php');?>