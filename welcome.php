
<?php

//Indlæs JWT biblioteket
require 'vendor/autoload.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$key = 'HemmeligGenereretKey';

//her tjekkes der om brugeren er logget ind. Hvis ikke, send tilbage til index.php, aka loging skærm.
//Hvis der ikke er en token sat i cookie, tilbage til index.php
if(isset($_COOKIE['token'])){
	$decoded = JWT::decode($_COOKIE['token'], new Key($key, 'HS256'));
} else {
	header('location:index.php');
}

?>

<!doctype html>
<html lang="en">
  	<head>
    	<!-- Required meta tags -->
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1">

    	<!-- Bootstrap CSS -->
    	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    	<title>Du er logget ind. "inspect" </title>
  	</head>
  	<body>
    	<div class="container">
    		<h1 class="text-center mt-5 mb-5">Du er logget ind. "inspect" og se storage for cookie -> token</h1>
    		<div class="row">
    			<div class="col-md-4">&nbsp;</div>
    			<div class="col-md-4 text-center">
    				<h1>Welcome <b><?php echo $decoded->data->user_name; ?></b></h1>
    				<a href="logout.php">Logout</a>    				
		    	</div>
	    	</div>
    	</div>
  	</body>
</html>

