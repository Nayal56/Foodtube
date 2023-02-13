<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php 	session_start(); 
      	if(isset($_POST['dashboard'])){
      		header('Location: user.php');
      	}
?>

<?php

if(!empty($_POST['login']))
{
	$email=$_POST['emails'];
	$password=$_POST['passwords'];
	$con= mysqli_connect("127.0.0.1","root","","foodtube");
	$i="select * from user where email='$email' and password='$password'";
	if($con)
	{
		$rs=mysqli_query($con,$i);
		$fr=mysqli_fetch_row($rs);
		$_SESSION['id']=$fr[0];
		$_SESSION['name']=$fr[1];
		$_SESSION['email']=$fr[2];
		$_SESSION['photo']=$fr[6];
        $_SESSION['type']=$fr[7];
        $_SESSION['status']=$fr[8];
		$id=$fr[0];
			if($email==$_SESSION['email'] && $password==$fr[3])
			{
				header("Location: upload.php");
			}
			elseif($email=="admin" && $password=="admin"){
                header("Location: admin.php");
			}
			else
			{
				echo "<script>alert('You have entered a wrong Email id or Password'); window.location.href='index.php';</script>";
			}
	}
}
?>

<?php
if(isset($_POST['signup']))
{
$conn = new mysqli("localhost","root","","foodtube");
   $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false){
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$gender = $_POST['gender'];
$mobile = $_POST['mobile'];
$type = $_POST['type'];
$query = "insert into user(name,email,password,gender,mobile,image,type) VALUES('$name','$email','$password','$gender','$mobile','$imgContent','$type')";
if($conn->query($query)==TRUE)
{
					echo "<script>alert('You Account Id has been created'); window.location.href='index.php';</script>";
}
else
{
	echo"Sorry you've not entered the data correctly";
}
}
}
?>

<!DOCTYPE HTML>
<html>
<head>
<title>My Play a Entertainment Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="My Play Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' media="all" />
<!-- //bootstrap -->
<link href="css/dashboard.css" rel="stylesheet">
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' media="all" />
<script src="js/jquery-1.11.1.min.js"></script>
<!--start-smoth-scrolling-->
<!-- fonts -->
<link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
<!-- //fonts -->
</head>
  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php"><h1><img src="images/foodtube.jpeg"style="height: 80px; width:130px;margin-left:20px; margin-top:-15px;" alt="" /></h1></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
			<div class="top-search">
				<form class="navbar-form navbar-right">
					<input type="text" class="form-control" placeholder="Search...">
					<input type="submit" value=" ">
				</form>
			</div>
			<div class="header-top-right">
				

				<div class="signin">

<button class="btn btn-primary"onClick="javascript:window.location.href='index.php'"style="margin-top: -8px">Home</button>
					<!-- pop-up-box -->
									<script type="text/javascript" src="js/modernizr.custom.min.js"></script>    
									<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
									<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
									<!--//pop-up-box -->
								
										
								
								
									<script>
											$(document).ready(function() {
											$('.popup-with-zoom-anim').magnificPopup({
												type: 'inline',
												fixedContentPos: false,
												fixedBgPos: true,
												overflowY: 'auto',
												closeBtnInside: true,
												preloader: false,
												midClick: true,
												removalDelay: 300,
												mainClass: 'my-mfp-zoom-in'
											});
																											
											});
									</script>	
				</div>

				<div class="signin">
					 <?php
			           if(isset($_SESSION['name']) && !empty($_SESSION['name']))
			          {
			          	echo '<form action="#" method="post">
			<div class="dropdown" style="margin-top: -8px">
  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="text-transform: capitalize">Welcome '.$_SESSION['name'].'
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
   <center> <input type="submit" class="dropdown-item btn btn-primary" style="font-size:20px; padding-left:40px; padding-right:50px;" name="dashboard" value="Dashboard"></center>      
   <center> <input type="submit" class="dropdown-item btn btn-primary" style="font-size:20px; padding-left:60px; padding-right:68px; margin-top: 5px;" name="logout" value="Logout"></center>
     
  </ul>

</div>
</form>';
      if(isset($_POST['logout'])){
      	session_destroy();
echo '<script>
{
  location.reload();
}
</script>';
      }

      
			          }else{
                       echo '<a href="#small-dialog" class="play-icon popup-with-zoom-anim">Sign Up</a>'; }?>
					<div id="small-dialog" class="mfp-hide">
						<h3>Signup</h3>
						<div class="social-sits">
							<div class="facebook-button">
								<a href="#">Connect with Facebook</a>
							</div>
							<div class="chrome-button">
								<a href="#">Connect with Google</a>
							</div>
							<div class="button-bottom">
								<p>Already have an account? <a href="#small-dialog2" class="play-icon popup-with-zoom-anim">Login</a></p>
							</div>
						</div>
						<div class="signup">
<form class="form-wrap"	 name="myform" action="#" method="post" enctype="multipart/form-data">
								<h4>Account Type</h4>
								<span style="font-size: 15px">Normal <input type="radio" name="type" value="Normal"></span><span style="margin-left: 50px;font-size: 15px"> Expert <input type="radio" name="type" value="Expert"></span>
								<input type="text" name="name" class="email" placeholder="Enter Your Name" required="required" />
								<input type="text" name="email" class="email" placeholder="Enter Your Email" required="required" />
								<input type="password" id="password" name="password" class="email" placeholder="Enter Your Password" required="required" />
								<input type="password" id="confirm_password"name="confirm_password" class="email" placeholder="Confirm Your Password" required="required" /><br>
								<span style="font-size: 15px">Male <input type="radio" name="gender" value="Male"></span><span style="margin-left: 50px;font-size: 15px"> Female <input type="radio" name="gender" value="Female"></span>
								<input type="text" name="mobile" class="email" placeholder="Enter Your Mobile no." required="required" />
								<h4>Upload your photo</h4>
								<input type="file" name="image" style="font-size: 15px"/>
								<input type="submit" name="signup" value="Signup"/>
							</form>
										<!-- End banner Area -->
	<script>var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;</script>
							<div class="forgot">
								<a href="#">Forgot password ?</a>
							</div>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="signin">
					 <?php
			           if(isset($_SESSION['name']) && !empty($_SESSION['name']))
			          {}else{	
			          	echo '<a href="#small-dialog2" class="play-icon popup-with-zoom-anim">Sign In</a>'; } ?>
					<div id="small-dialog2" class="mfp-hide">
						<h3>Login</h3>
						<div class="social-sits">
							<div class="facebook-button">
								<a href="#">Connect with Facebook</a>
							</div>
							<div class="chrome-button">
								<a href="#">Connect with Google</a>
							</div>
							<div class="button-bottom">
								<p>New account? <a href="#small-dialog" class="play-icon popup-with-zoom-anim">Signup</a></p>
							</div>
						</div>
						<div class="signup">
							<form action="#" method="post">
								<input type="text" name="emails" class="email" placeholder="Enter your email" required="required" />
								<input type="password" name="passwords" placeholder="Enter your Password" required="required" />
								<input type="submit" name="login"  value="LOGIN"/>
							</form>
										<!-- End banner Area -->

							<div class="forgot">
								<a href="#">Forgot password ?</a>
							</div>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>

				<div class="clearfix"> </div>
			</div>
        </div>
		<div class="clearfix"> </div>
      </div>
    </nav>
	
		<!-- upload -->
		<div class="upload">
			<!-- container -->
			<div class="container">
				<div class="upload-grids">
					<div class="upload-right">
						<div class="upload-file">
							<div class="services-icon">
								<span class="glyphicon glyphicon-open" aria-hidden="true"></span>
							</div>
								<form action="#" method="post" enctype="multipart/form-data">
							<input type="file" value="Choose file.." name="uploadvideo" required>
							<?php
// connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'foodtube');

// Uploads files
if (isset($_POST['upload'])) { 
      if(isset($_SESSION['name']) && !empty($_SESSION['name']))
			          {
			          	$b="blocked";
			      
if($_SESSION['status']==$b){
	echo '<script>alert("you can not upload video, your account has been blocked");</script>';
	}else{


    $filename = $_FILES['uploadvideo']['name'];
    $title = $_POST['title'];
$description = $_POST['description'];
$date = date("d/m/y"); 
$userid = $_SESSION['id'];
$category = $_POST['category'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
    // destination of the file on the server
    $destination = 'videos/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['uploadvideo']['tmp_name'];
    $size = $_FILES['uploadvideo']['size'];

    if (!in_array($extension, ['mp4','3gp','avi','mkv','webm'])) {

    } elseif ($_FILES['uploadvideo']['size'] > 1000000000) { // file shouldn't be larger than 1Megabyte
        echo "<script>alert('File is too large!');</script>";
    } else {
    	   
        if (move_uploaded_file($file, $destination)) {

            $sql = "INSERT INTO temp (video,title,description,date,userid,extention,category) VALUES ('$filename','$title','$description','$date','$userid','$ext','$category')";
        }
           try{
            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Files Uploaded Successfull');</script>";
            }
        }catch(Exception $e){ echo $e;}
    }

}
}
else{
	echo '<script>alert("First Login");</script>';
}
}

    ?>
    <?php 
$con= mysqli_connect("localhost","root","","foodtube");
$query= "insert into views(views)VALUES('0')";
mysqli_query($con, $query)
    ?>
						
						<div class="upload-info">
							<h5>Select files to upload</h5>
							<span>or</span>
							<p>Drag and drop files</p>
						</div><br><br><div class="col-md-3"></div><div class="col-md-6">
							<div class="form-group">
  <label for="sel1"><h5>Select Category:</h5></label>
  <select class="form-control" id="sel1" name="category">
    <option>Indian</option>
    <option>Fast Food</option>
    <option>Drinks</option>
    <option>Sea Food</option>
    <option>Chinese</option>
    <option>Bakery</option>
    <option>Restraunt</option>
  </select>
</div>
						 <center><input type = "text" class = "form-control" name="title" placeholder = "Video Title" required></center><br>
						 <center><textarea class = "form-control" name="description" rows="10" placeholder = "Video Description" required></textarea></center><br>
						<center><input type="submit" class="btn btn-primary" value="Upload your Video" name="upload"></center>
					</div>
					</div>

				</form>
					
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
			<!-- //container -->
		</div>
	</div>
		<!-- //upload -->
			<!-- footer -->
						<div class="footer">>
				<div class="container">
					<div class="footer-top">
						<div class="footer-top-nav">
								<ul>
								<li><h4 style="color:white;">Created by Arpit and Ashwani<h4></li>
							</ul>
						</div>
						
					</div>
				</div>
			</div>
			<!-- //footer -->
		<div class="clearfix"> </div>
	<div class="drop-menu">
		<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu4">
		  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Regular link</a></li>
		  <li role="presentation" class="disabled"><a role="menuitem" tabindex="-1" href="#">Disabled link</a></li>
		  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another link</a></li>
		</ul>
	</div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
  </body>
</html>