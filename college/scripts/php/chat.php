<?php
	session_start();
	if(!isset($_SESSION["chat_name"])){
	$chat_name = '';
	}
	else{

	$chat_name = $_SESSION["chat_name"];
	
	}


	mysql_connect("localhost" , "root" , "myniki123") or die("Couldn't connect to SQL");
	mysql_select_db("chats") or die("Couldn't select DB");


	

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

	get_msg();
?>