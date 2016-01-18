<?php

	session_start();

	//loading the database access values
	$configs = require 'config.php';

	//define the link
	$link = mysqli_connect($configs['servername'], $configs['username'], $configs['password'], $configs['dbname']);
	
	$query="UPDATE users SET diary='".mysqli_real_escape_string($link, $_POST['diary'])."'WHERE userID='".$_SESSION['id']."' LIMIT 1";

	echo $query;
	
	mysqli_query($link, $query);
	

?>