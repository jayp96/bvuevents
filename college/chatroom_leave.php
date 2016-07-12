<?php
session_start();
unset($_SESSION["chat_id"]);
echo '<script> location.replace("home.php"); </script>';


?>