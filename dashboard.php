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
$date_added = date("Y-m-d");
$blog_title = $_POST['blog_title'];
$blog_content = $_POST['blog_content'];
			try{
    $statement = $connect->prepare("INSERT INTO `post` (`postid`, `blog_post`, `blog_title`, `date_added`) VALUES ('NULL', :blog_content, :blog_title, :date_added)");
    $statement->bindParam(':blog_content', $blog_content);
    $statement->bindParam(':blog_title', $blog_title);
    $statement->bindParam(':date_added', $date_added);
    $statement->execute();
}
catch(PDOException $e){
    die("Connection to database failed: " . $e->getMessage());
}
		
	}
?>


<html>
<head>
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
		<div class="col-md-6">
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
    
<div  class="row" style="margin-top:20px">
    

    	<div class="col-md-12 jumbotron">
            <div class="col-md-6">
                <h1>Add blog entry</h1></div>
  <form action="" method="post">
  <div class="form-group col-md-6">
    <label for="blog_title">Blog Title</label>
    <input type="text" class="form-control" id="blog_title" name="blog_title">
  </div>
  

  <div class="form-group  col-md-6">
    <label for="blog_content">Blog Content</label>
    <textarea class="form-control" id="blog_content" rows="3" name="blog_content"></textarea>
  </div>
      <div class="form-group col-md-6">
          <button type="submit" name="insert" class="btn btn-primary ">Submit</button></div>
</form>
		</div>
</div>
    </div>
        </div>
</body>

</html>