<?php include("login.php"); ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Secret Diary</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
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
 			<div class="navbar-header">
 				<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
 					<!--hamburger menu-->
 					<span class="icon-bar"></span>
 					<span class="icon-bar"></span>
 					<span class="icon-bar"></span>
 				</button>
 				<a class="navbar-brand">Secret Diary</a>
 			</div>

 			<div class="collapse navbar-collapse">
 				<form class="navbar-form navbar-right" method="post">
 					<div class="form-group">
 						<input type="email" name="loginemail" placeholder="Email" class="form-control" value="<?php echo ('test@gmail.com')/*addslashes($_POST['loginemail']);*/ ?>" />
 					</div>
 					<div class="form-group">
 						<input type="password" name="loginpassword" placeholder="Password" class="form-control" value="<?php echo ('testing')/*addslashes($_POST['loginpassword']);*/ ?>" />
 					</div>
 					<input type="submit" name="submit" class="btn btn-success" value="Log In">
 				</form>
 			</div>
 		</div>
 	</div>

 	<!--Main body elements-->
 	<div class="container contentContainer" id="topContainer">
 		<div class="row">
 			<div class="col-md-6 col-md-offset-3" id="topRow">
 				<h1 class="marginTop">Secret Diary</h1>
 				<p class="lead">Your own private diary, with you wherever you go.</p>

 				<?php

 					if($error) {
 						echo '<div class="alert alert-danger">'.addslashes($error).'<div>';
 					}

 					if($message) {
 						echo '<div class="alert alert-sucess">'.addslashes($message).'</div>';
 					}

 				?>

 				<p class="bold marginTop">Interested? Sign Up Below!</p>

 				<form class="marginTop" method="post">
 					<div class="form-group">
 						<label for="email">Email Address</label>
 						<input type="email" name="email" class="form-control" placeholder="Your Email" value="testing@gmail.com" /> <!-- update this with addslashes-->
 					</div>
 					<div class="form-group">
 						<label for="password">Password</label>
 						<input type="password" name="password" class="form-control" placeholder="password" value="testing" /> <!-- update this with addslashes-->
 					</div>
 					<input type="submit" name="submit" value="Sign Up" class="btn btn-success btn-lg marginTop" />
 				</form>
 			</div>
 		</div>
 	</div>

 	<!--
	<form method="post">
		<input type="email" name="email" class="form-control" placeholder="Your Email" value="<? echo addslashes($_POST['email']); ?>" />
		<input type="password" name="password" class="form-control" placeholder="Password" value="<? echo addslashes($_POST['password']); ?>" />
		<input type="submit" name="submit" value="Sign Up" class="btn btn-success btn-lg marginTop"/> 
	</form>


	<form method="post">
		<input type="email" name="loginemail" placeholder="Email" class="form-control" value="<?php echo addslashes($_POST['loginemail']); ?>" />
		<input type="password" name="loginpassword" placeholder="Password" class="form-control" value="<?php echo addslashes($_POST['loginpassword']); ?>" />
		<input type="submit" name= "submit" class="btn btn-success" value="Log In">
	</form>
	-->

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    
    <script src="js/bootstrap.min.js"></script>
    <script>
    	$(".contentContainer").css("min-height",$(window).height());
    </script>
</body>
</html>

