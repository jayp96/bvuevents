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

	    			if(!$c_id){		
		    				echo '
		    			
		    			<ul class="nav navbar-nav navbar-left" style="padding-top:30px;font-weight:700;"> 
					<!-- Change here before submitting to the server--><li><a href="addchatroom.php"><span class="glyphicon glyphicon-send"></span> Add Chatroom</a>
					</li><!-- Change here before submitting to the server--><li><a href="joinchatroom.php"><span class="glyphicon glyphicon-transfer"></span> Join Chatroom</a></li>
					</ul>

					<ul class="nav navbar-nav navbar-right" style="padding-top:30px;font-weight:700;">
		     		
		      		 <!-- Change here before submitting to the server--><li><a href="leave.php"><span class="glyphicon glyphicon-log-out"></span> Leave</a></li>
		      		 
		      		 </ul>
		      		 ';
		    		}else{


		    			echo '<ul class="nav navbar-nav navbar-left" style="padding-top:30px;font-weight:700;"> 
					<!-- Change here before submitting to the server--><li><a href="invite.php"><span class="glyphicon glyphicon-send"></span> Invite Members</a>
					</li><!-- Change here before submitting to the server--><li><a href="joinchatroom.php"><span class="glyphicon glyphicon-transfer"></span> Join Chatroom</a></li>
					</ul>


					<ul class="nav navbar-nav navbar-right" style="padding-top:30px;font-weight:700;">
		     		
		      		 <!-- Change here before submitting to the server--><li><a href="chatroom_leave.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
		      		 
		      		 </ul>
		    			';


		    		}
    			}
    			
    		?>
		</div>
		
		</div>
</nav>

<!--cr_username and d_name dono dene h email me-->

<?php



$sql_extract_data = mysql_query("SELECT cr_username,d_name FROM chatroom_login WHERE cr_id='$c_id'");

while($sql_extract = mysql_fetch_assoc($sql_extract_data)){


	$chatroom_username = $sql_extract['cr_username'];
	$chatroom_name = $sql_extract['d_name'];
	

}



?>

<form role="form" class="form-horizontal" action="invitescript.php" method="POST">

<div class="form-group">
    <label class="control-label col-sm-2" for="cr_name">Chatroom Name:</label>
    <div class="col-sm-4">
    	<input type="text" class="form-control" id="cr_name" name="d_name" value="<?php echo $chatroom_name; ?>" readonly>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-2" for="username">Username:</label>
    <div class="col-sm-4">
    	<input type="text" class="form-control" id="username" name="cr_username" value="<?php echo $chatroom_username;?>" readonly>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-2" for="email">Invitee email address:</label>
    <div class="col-sm-4">
    	<input type="text" class="form-control" id="email" name="email">
    </div>
    <div class="col-sm-5" style="padding-top:7px;">
    	For more than 1 use comma (",") delimiter
    </div>
</div>

<div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <input type="submit" class="btn btn-default" value="Send" name="send"></input>
    </div>
</div>
	

</form>





<?php include('./inc/footer.inc.php');?>