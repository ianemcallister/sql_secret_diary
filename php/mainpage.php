<?php
	session_start();
	error_reporting(0);

	//loading the database access values
	$configs = require 'config.php';

	//define the link
	$link = mysqli_connect($configs['servername'], $configs['username'], $configs['password'], $configs['dbname']);

	$query="SELECT diary FROM users WHERE userID='".$_SESSION['id']."' LIMIT 1";
	
	$result = mysqli_query($link,$query);
	
	if($row = mysqli_fetch_array($result))
	{
		$diary=$row['diary'];
	}
	else
	{
		$diary="Error loading diary.";
	}
	
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Secret Diary</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/styles.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
   <style>
   </style>
  </head>
 <body data-spy="scroll" data-target=".navbar-collapse">
 	<!--add the navbar-->
 	<div class="navbar navbar-default navbar-fixed-top">
 		<div class="container">
 			<div class="navbar-header pull-left">
 				<!--add branding-->
 				<a class="navbar-brand">Secret Diary</a>
 			</div>

 			<div class="pull-right">
 				<ul class="navbar-nav nav">
 					<li><a href="../index.php?logout=1">Log Out</a></li>
 				</ul>
 			</div>
 		</div>
 	</div>


 	<!--add the body-->
 	 <div class="container contentContainer" id="topContainer">
 		<div class="row">
 			<div class="col-md-6 col-md-offset-3" id="topRow">
 				<textarea class="form-control"><?php echo $diary; ?></textarea>
 			</div>
 		</div>
 	</div>

 	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    
    <script src="../js/bootstrap.min.js"></script>
    <script>
    	$(".contentContainer").css("min-height",$(window).height());
    	$("textarea").css("height",$(window).height()-110);
    	$("textarea").keyup(function() {
    		$.post("updatediary.php", {diary:$("textarea").val()} );
    	
    	});
    </script>

  </body>