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

<h2>Prattle Register</h2>
<div class="container">

<form role="form" class="form-horizontal" action="registerscript.php" method="POST" enctype="multipart/form-data">
<div class="col-sm-offset-2 col-sm-10">

<div class="form-group">
    <label class="control-label col-sm-2" for="name">Name:</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="u_name" name="u_name">
    </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-2" for="u_enroll">Enrollment No:</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="u_enroll" name="u_enroll">
    </div>
</div>

<div class="col-sm-offset-1 col-sm-4" style="padding: 0px 0px;padding-right:1px;">
            <div class="form-group">
              
              
              <input type="hidden" id="pseudo_batch" class="" name="">
        
            <select id="u_batch" placeholder="Batch" name="u_batch" class="selectized" required>
                <option value="" selected="">Batch</option>
                <option value="CSE - M">CSE - M</option>
                <option value="CSE - E">CSE - E</option>
                <option value="ECE(1) - M">ECE(1) - M</option>
                <option value="ECE(2) - M">ECE(2) - M</option>
                <option value="ECE - E">ECE - E</option>
                <option value="IT - M">IT - M</option>
                <option value="IT - E">IT - E</option>
                <option value="EEE">EEE</option>
                <option value="ICE">ICE</option>
            </select>
            </div>
</div>
<div class="col-sm-offset-1 col-sm-4"  style="padding: 0px 0px;padding-right:1px;">
            <div class="form-group">
              
              
              <input type="hidden" id="pseudo_year" class="" name="">
        
            <select id="u_year" placeholder="Year" name="u_year" class="selectized" required>
                <option value="" selected="">Year</option>
                <option value="1st Year">1st Year</option>
                <option value="2nd Year">2nd Year</option>
                <option value="3rd Year">3rd Year</option>
                <option value="4th Year">4th Year</option>
                
            </select>
            </div>
</div>
</div>
<div class="col-sm-offset-2 col-sm-10">
<div class="form-group">
        <label for="u_pic" class="control-label col-sm-2">Upload Pic:</label>
        <div class="col-sm-6">
        <input type="file" id="u_pic" name="u_pic" required>
        </div>
</div>


<div class="form-group">
    <label class="control-label col-sm-2" for="email">Email address:</label>
    <div class="col-sm-6">
    	<input type="email" class="form-control" id="email" name="u_email">
    </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-2" for="password">Password:</label>
    <div class="col-sm-6">
    	<input type="password" class="form-control" id="password" name="u_password">
    </div>
</div>
<div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <input type="submit" class="btn btn-default" name="log" value="Register"></input>
    </div>
</div>
	
</div>
</form>
</div>



<script src="js/registerselectize.js" type="text/javascript"></script>

<?php include('./inc/footer.inc.php');?>