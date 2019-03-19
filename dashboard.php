<?php


include('session.php');
require 'connect.php';

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
</head>
    
    
    
<body>
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
    
    

    <form role="form">
				<div class="form-group form-control-sm form-control-lg">
					 
					<label for="blog_title">
						Blog Title
					</label>
					<input type="blog_title" class="form-control" id="blog_title" name="blog_title" />
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


</body>

</html>