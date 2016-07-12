<?php include('./inc/header.inc.php'); ?>
<?php

if(!isset($_SESSION["chat_name"])){
	$chat_name = '';
}
else{

	$chat_name = $_SESSION["chat_name"];
	
}

?>

<title>Prattle | Invite Login </title>
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
<h2>Prattle | Chatroom Invitation Login</h2>
</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div class="col-sm-offset-2 col-sm-10">
<form role="form" class="form-horizontal" action="setuserscript.php" method="POST">

<div class="form-group">
    <label class="control-label col-sm-2" for="cr_name">Chatroom Name:</label>
    <div class="col-sm-6">
    	<input type="text" class="form-control" id="cr_name" name="d_name" value="<?php echo $chat_name;?>" readonly>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-2" for="username">Username:</label>
    <div class="col-sm-6">
    	<input type="text" class="form-control" id="username" name="cr_username">
    </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-2" for="password">Password:</label>
    <div class="col-sm-6">
    	<input type="password" class="form-control" id="password" name="cr_password">
    </div>
</div>

<div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <input type="submit" class="btn btn-default" value="Join" name="join"></input>
    </div>
</div>
	

</form>
</div>


<?php include('./inc/footer.inc.php');?>