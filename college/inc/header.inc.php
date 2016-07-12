<?php 
session_start();
include("./inc/connect.inc.php");
if(!isset($_SESSION['u_id'])){
	$u_id = '';
}
else{

	$u_id = $_SESSION['u_id'];
	
}
if(!isset($_SESSION['chat_id'])){
	$c_id = '';
}
else{

	$c_id = $_SESSION['chat_id'];
	
}
	
?>


<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->

<head>

	 <meta charset="utf-8" />
	 <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	
	 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js">
	 </script>
	 <link href='https://fonts.googleapis.com/css?family=Lora:400,700' rel='stylesheet' type='text/css'>
	 <style>
	 	
	 </style>
	 	
	 	 
		 
		 
		 <link rel="icon" href="../../img/favicon.png">
	 
	 <style>
	 	
	 </style>


	 	 <!-- SELECTIZE files-->
	 	 <script src="js/standalone/selectize.min.js"></script>
	 	 <link rel="stylesheet" type="text/css" href="css/selectize.css">

	 	 
		 <!-- Custom css -->
		 <link rel="stylesheet" type="text/css" href="css/style.css">
		
		 <!-- Custom JS File -->
		 <script src="js/main.js"></script> 

		 

		 

