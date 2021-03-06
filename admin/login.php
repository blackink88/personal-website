<?php
	require '../connect.php';
 session_start();
?>
    
    <?php
	if(isset($_POST['login'])) {
		$errorMsg = '';
		// The Form data
		$username = $_POST['username'];
		$password = $_POST['password'];
		if($username == '')
			$errorMsg = 'Enter the username';
		if($password == '')
			$errorMsg = 'Enter the password';
		if($errorMsg == '') {
			try {
				$stmt = $connect->prepare('SELECT userid, username, password, name FROM user WHERE username = :username');
				$stmt->execute(array(
					':username' => $username
					));
				$data = $stmt->fetch(PDO::FETCH_ASSOC);
				if($data == false){
					$errorMsg = "The user $username has not found.";
				}
				else {
					if($password == $data['password']) {
						$_SESSION['userid'] = $data['userid'];
						$_SESSION['username'] = $data['username'];
						header('Location: dashboard.php');
						exit;
					}
					else
						$errorMsg = 'Password does not match.';
				}
			}
			catch(PDOException $e) {
				$errorMsg = $e->getMessage();
			}
		}
	}
?>

<html>
<head><title>Login</title></head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

 
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
   <link href="https://fonts.googleapis.com/css?family=Poppins:400,900" rel="stylesheet">
	
<body>
    
    <div class="container-fluid">
	<div class="row">
		<div class="col-md-4">
            <?php
				if(isset($errorMsg)){
					echo '<div style="color:#FF0000;text-align:center;font-size:17px;">'.$errMsg.'</div>';
				}
			?>
			<form action "" method="post" >
				<div class="form-group">
					 
					<label for="username">
						Username
					</label>
					<input type="text" class="form-control" name="username" id="username" value="<?php if(isset($_POST['username'])) echo $_POST['username'] ?>" />
				</div>
				<div class="form-group">
					 
					<label for="password">
						Password
					</label>
					<input type="password" name="password" class="form-control" id="password" value="<?php if(isset($_POST['password'])) echo $_POST['password'] ?>" />
				</div>
				
				
				<button type="submit" class="btn btn-primary" name="login"  value="Login">
					Submit
				</button>
			</form>
		</div>
	</div>
</div>

</body>
</html>
