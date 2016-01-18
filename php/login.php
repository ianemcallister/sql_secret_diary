<?php

	//start the session
	session_start();

	//handle logout
	if ($_GET["logout"]==1 AND $_SESSION['id']) { 

		session_destroy(); 

		$message="You have been logged out. Have a nice day!";
	}

	//loading the database access values
	$configs = require 'php/config.php';

	//define the link
	$link = mysqli_connect($configs['servername'], $configs['username'], $configs['password'], $configs['dbname']);

	//handle logins
	if ($_POST['submit']=="Sign Up") {

		//received e-mail and error check
		if(!$_POST['email']) $error.="<br/>Please enter your e-mail";
			else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) $error.="<br/>Please enter a vaild e-mail";

		//received password and check for robustness
		if(!$_POST['password']) $error.="<br/>Please enter your password";
		else {

			if(strlen($_POST['password'])<8) $error.="<br/>Please enter a password with at least 8 characters";
			if(!preg_match('/[A-Z]/',$_POST['password'])) $error.="<br/>Please include at least one capital leter in your password";

		}

		//if there were errors, notify the user, otherwise login
		if($error) echo "There were error(s) in your signup details: ".$error;
		else {
			
			//build the query
			$query="SELECT * FROM `users` WHERE `username`='".mysqli_real_escape_string($link, $_POST['email'])."'";

			$result = mysqli_query($link, $query);

			$results = mysqli_num_rows($result);

			//notify the user if that e-mail is in use already
			if($results) echo "That e-mail address is already registered.  Do you want to login?";
			else {
				
				//if this is a new e-mail, add to the database
				$query="INSERT INTO `users` (`username`, `password`, `diary`) VALUES('".mysqli_escape_string($link, $_POST['email'])."', '".md5(md5($_POST['email'].$_POST['password']))."', 'Entry 1:')";

				mysqli_query($link, $query);

				$success="You've been signed up!";

				//generate a new session id
				$_SESSION['id']=mysqli_insert_id($link);

				// Redirect to log in page
				header("Location:php/mainpage.php");

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
		$row = mysqli_fetch_array($result);
	
		//if resulst were returned log the sesson id and launch the page
		if($row) {
			$_SESSION['id']=$row['userID'];

			//redirect to logged in page
			header("Location:php/mainpage.php");
			
		} else {
			//If not, notify the user of an error
			$error = "We could not find a user with that email and password. Please try again.";

		}


	}

?>