<?php


$send = @$_POST['send'];

$d_name = "";
$cr_username = "";
$email = "";

$d_name =strip_tags($_POST['d_name']);

$cr_username = strip_tags($_POST['cr_username']);


$email = strip_tags($_POST['email']);



if($send){



require_once './phpmailer/phpmail/PHPMailerAutoload.php';




$m = new PHPMailer;

$m->isSMTP();
$m->SMTPAuth = true;
$m->SMTPDebug = 2;

$m->Host = 'mail.bvulive.in';
$m->Username = 'admin@bvulive.in';
$m->Password = 'myniki123';
$m->SMTPSecure = 'tls';
$m->Port = 587;

//From email address and name
$m->From = 'admin@bvulive.in';
$m->FromName = 'admin';

//Address to which recipient will reply
$m->addReplyTo('admin@bvulive.in','Admin');

//To address and name
$m->addAddress('narora200@gmail.com','Nikhil Arora'); //Recipient name is optional

//CC and BCC
//$m->addCC("cc@example.com");

$mail_id = explode(',', $email);
$count_mail_id = count($mail_id);


	$j=0;
	for($j=0;$j<$count_mail_id;$j++){

	$m->addBCC($mail_id[$j]);

	}



	//Send HTML or Plain Text email
	$m->isHTML(true);

	//Provide file path and name of the attachments
	//$m->addAttachment("file.txt", "File.txt");        
	//$m->addAttachment("images/profile.png"); //Filename is optional


	$m->Subject = 'Prattle | bvulive CHAT awaits you!!!';
	$m->Body    = "You have been invited to join Prattle | bvulive CHAT. <br />
					Logon to <a href='http://bvulive.in/college/index.php'>Prattle</a> and enter the details as given below<br /><br />

					Chatroom Name:".$d_name ."
					<br />
					Invited By: ".$cr_username."

					";

	$m->AltBody = 'This is the body of the e-mail!';
	if(!$m->send()){
	echo "Mailer Error: " . $m->ErrorInfo;




	} else {

	echo "Message has been sent successfully";	

	echo '<script> location.replace("invite.php"); </script>';
	};
}








?>

