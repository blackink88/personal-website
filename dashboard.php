<?php

 /*    Session handling and the connection  */
session_start();
if(!isset($_SESSION['username']) || !isset($_SESSION['userid'])){
   
    header('Location: login.php');
    exit;
}
require 'connect.php';
?>


<?php 
 /*    Add a post to the database, get the from the form  */

if(isset($_POST['insert'])) {
$blog_title = $_POST['blog_title'];
$blog_content = $_POST['blog_content'];
			try{
    $statement = $connect->prepare("INSERT INTO `post` (`postid`, `blog_post`, `blog_title`) VALUES ('NULL', :blog_content, :blog_title)");
    $statement->bindParam(':blog_content', $blog_content);
    $statement->bindParam(':blog_title', $blog_title);
    $statement->execute();
}
catch(PDOException $e){
    die("Connection to database failed: " . $e->getMessage());
}
		
	}
?>


<html>
<head>

    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
   <link href="https://fonts.googleapis.com/css?family=Poppins:400,900" rel="stylesheet">
        <style type="text/css">

            .wrapper{
                
                
                margin-top:20px;
            }
    </style>
</head>
    
    
    
<body>
    <div class="wrapper">
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<ul class="nav nav-pills">
				<li class="nav-item">
					<a class="nav-link active" href="#">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Manage Content</a>
				</li>
				
			
			</ul>
		</div>
	</div>
    
<div  class="row">
    	<div class="col-md-6">
    <form action "" method="post">
				<div class="form-group form-control-sm form-control-lg">
					 
					<label for="blog_title">
						Blog Title
					</label>
					<input type="text" class="form-control" id="blog_title" name="blog_title" />
				</div>
				
				<div class="form-group form-control-sm form-control-lg">
    <label for="blog_content">Blog content</label>
    <textarea class="form-control" id="blog_content" rows="3" name="blog_content"></textarea>
  </div>
				<button type="submit" class="btn btn-primary" name="insert">
					Submit
				</button>
			</form>
		</div>
</div>
    </div>
        </div>
</body>

</html>