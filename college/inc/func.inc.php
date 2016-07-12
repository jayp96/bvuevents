<?php

function send_msg($sender, $message){

	if(!empty($sender) && !empty($message)){

			$esc_sender = mysql_real_escape_string($sender);
			$esc_message = mysql_real_escape_string($message);

			$query = mysql_query("INSERT INTO chat VALUES ('', '$esc_sender', '$esc_message')");

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

	$query = mysql_query("SELECT * FROM chat");

	$i = 0;

	while($chat = mysql_fetch_assoc($query)){

		$info[$i]['sender'] = $chat['sender'];
		$info[$i]['message'] = $chat['message'];

		$i++;

	}
	$rows = mysql_num_rows($query);

	for($i;$i--;$i>0){

		echo "Sender ".$info[$i]['sender']. "<br />";
		echo $info[$i]['message']."<br /><br />";


	}

	}



?>