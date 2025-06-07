<?php
	session_start();
	session_destroy();
	echo "<script> alert('You have been successfully logged out!!'); </script>";
	header('Location:login.php');
?>