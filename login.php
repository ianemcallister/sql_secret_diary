<?php
	
	//start the session
	session_start();

	//save an error
	$error='';
	$message="You have been logged out. Have a nice day!";
		

	//loading the database access values
	$configs = require 'config.php';

	//define the link
	$link = mysqli_connect($configs['servername'], $configs['username'], $configs['password'], $configs['dbname']);

	//handle logins
	/*
	if($_POST['submit']=='Sign Up') {

		if(!$_POST['email']) $error.="<br/>Please enter your e-mail";
			else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) $error.="<br/>Please enter a vaild e-mail";

		if(!$_POST['password']) $error.="<br/>Please enter your password";
			else {

				if(strlen($_POST['password'])<8) $error.="<br/>Please enter a password with at least 8 characters";
				if(!preg_match('`[A-Z]`',$_POST['password'])) $error.="<br/>Please include at least one capital leter in your password";

			}

		if($error) echo "There were error(s) in your signup details: ".$error;
		else {
			

			$query="SELECT * FROM `users` WHERE `username`='".mysqli_real_escape_string($link, $_POST['email'])."'";

			$result = mysqli_query($link, $query);

			$results = mysqli_num_rows($result);

			if($results) echo "That e-mail address is already registered.  Do you want to login?";
			else {
				$query="INSERT INTO `users` (`username`, `password`) VALUES('".mysqli_escape_string($link, $_POST['email'])."', '".md5(md5($_POST['email'].$_POST['password']))."')";

				mysqli_query($link, $query);

				echo "You've been signed up";

				$_SESSION['id']=mysqli_insert_id($link);

				print_r($_SESSION);

				// Redirect to logg in page


			}


		}

	}

	//to handle logins instead of sign ups
	if($_POST['submit']=='Log In') {

		//build the query
		$query="SELECT * FROM `users` WHERE `username`='".mysqli_real_escape_string($link, $_POST['loginemail'])."' AND password='".md5(md5($_POST['loginemail'].$_POST['loginpassword']))."' LIMIT 1;";

		//action the query and save the results
		$result = mysqli_query($link, $query);

		//view the results
		$row = mysqli_num_rows($result);
	
		if($row) {
			$_SESSION['id']=$row['id'];

			//redirect to logged in page
			print_r($_SESSION);
		} else {

			echo "We couldn't find a user with that email and password.  Please try again.";

		}


	}*/

?>