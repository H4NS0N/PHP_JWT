<?php
    require 'vendor/autoload.php';
    use Firebase\JWT\JWT;

    //hvis noget går galt, smid en error gennem echo
    $error = '';

    if(isset($_POST['login'])){

        try{
            $dbHost = 'localhost';
            $dbName = 'phpJwt';            
            $dbUser = 'root';
            $dbPass = '';
    
            $connect = new PDO("mysql:host=" . $dbHost . ";dbname=" . $dbName, $dbUser, $dbPass);
        }catch(PDOException $err){
            echo "Databse connection problem: " . $err->getMessage();
            exit();
        }

        if(empty($_POST["email"])){
            $error = "Indtast email";
        }else if(empty($_POST["password"])){
            $error = "Indtast password";
        }else{
            //hvis alt går vel, authenticae bruger med jwt
            $query = "SELECT * FROM user WHERE user_email = ?";
            $statement = $connect->prepare($query);
            $statement->execute([$_POST["email"]]);
            $data = $statement->fetchAll(PDO::FETCH_ASSOC);
            if($data){
                if($data['user_password'] = $_POST['password']){
                    $key = 'HemmeligGenereretKey';
                    $token = JWT::encode(
                        array(
                            'iat' => time(),
                            'nbf' => time(),
                            'exp' => time() + 3600, //timer, ca. en måned her.
                            'data' => array(
                                'user_id' => $data['user_id'],
                                'user_name'	=> $data['user_name']
                            )
                        ),
                        $key,
                        //hashing metode
                        'HS256'
                    );
                    //Gemmer auth i en cookie så den adgang gemmes igennem alle sider
                    setcookie("token", $token, time() + 3600, "/", "", true, true);
                    header('location:welcome.php');
    
                } else {
                    $error = 'Forkert password';
                }
            } else {
                $error = 'Forkert email';
            }
        }
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

    	<title>How to Create Login using JWT Token in PHP</title>
  	</head>
  	<body>
    	<div class="container">
    		<h1 class="text-center mt-5 mb-5">Login for at lav en token!</h1>
    		<div class="row">
    			<div class="col-md-4">&nbsp;</div>
    			<div class="col-md-4">

    				<?php
                        if($error !== '')
                        {
                            echo '<div class="alert alert-danger">'.$error.'</div>';
                        }
    				?>

		    		<div class="card">
		    			<div class="card-header">Login</div>
		    			<div class="card-body">
		    				<form method="post">
		    					<div class="mb-3">
			    					<label>Email</label>
			    					<input type="email" name="email" class="form-control" />
			    				</div>
			    				<div class="mb-3">
			    					<label>Password</label>
			    					<input type="password" name="password" class="form-control" />
			    				</div>
			    				<div class="text-center">
			    					<input type="submit" name="login" class="btn btn-primary" value="Login" />
			    				</div>
		    				</form>
		    			</div>
		    		</div>
		    	</div>
	    	</div>
    	</div>
  	</body>
</html>
<?php 
    $connection = null;
?>