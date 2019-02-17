<?php
	// echo $_POST["username"].$_POST["password"].$_POST["email"];
	$username = $_POST["username"];
	$password = $_POST["password"];
	$email = $_POST["email"];
	require_once("dbtools.inc.php");
	
	$link = creat_connect();
	$sql = "INSERT INTO userdata (ID, Username, Password, Email) 
			VALUES('', '$username', '$password', '$email')";

	$result = excute_sql($link, "demoDB", $sql);
	echo $result;
?>