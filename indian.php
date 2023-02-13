<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php 	session_start(); 
      	if(isset($_POST['dashboard'])){
      	      		if($_SESSION['type']=='Normal'){
      		header('Location: user.php');
      	}else{
      		header('Location: expert.php');
      	}
      	}
?>
<?php 
if(isset($_POST['video'])){
	$videoid=$_POST['id'];
$_SESSION['video']=$videoid;


}
?>
<?php if(isset($_POST['video'])){
	$videoid=$_SESSION['video'];
	$con= mysqli_connect("127.0.0.1","root","","foodtube");
$query="select * from views where videoid='$videoid'";
	if($con)
	{
		$rs=mysqli_query($con,$query);
		$fr=mysqli_fetch_row($rs);
       $fe=$fr[1]+1;

	$query="UPDATE views SET views = '$fe' WHERE videoid='$videoid'";
	$rs=mysqli_query($con,$query);
		header("Location: video.php");
	}
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
				header("Location: index.php");
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
<style>
.link:hover {
  text-decoration: underline;
}
</style>
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

			</div>
			<div class="header-top-right">
				<div class="file">
					<a href="upload.php">Upload</a>
				</div>	

				<div class="signin">

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
	
        <div class="col-sm-3 col-md-2 sidebar">
			<div class="top-navigation">
				<div class="t-menu">MENU</div>
				<div class="t-img">
					<img src="images/lines.png" alt="" />
				</div>
				<div class="clearfix"> </div>
			</div>
				<div class="drop-navigation drop-navigation">
				  <ul class="nav nav-sidebar">

					<li><a href="index.php" class="home-icon"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
					<li class="active"><a href="indian.php" class="user-icon"><span class="glyphicon glyphicon-home glyphicon-blackboard" aria-hidden="true"></span>Indian</a></li>
					<li><a href="fastfood.php" class="sub-icon"><span class="glyphicon glyphicon-home glyphicon-cutlery" aria-hidden="true"></span>Fast Food</a></li>
					<li><a href="drinks.php" class="menu1"><span class="glyphicon glyphicon-glass" aria-hidden="true" style="margin-top: 10px"></span><p style="margin-top: -18px; margin-left: 48px">Drinks</p></a></li>
					
						<!-- script-for-menu -->
				
					<li><a href="Seafood.php" class="menu"><span class="glyphicon glyphicon-film glyphicon-tint" aria-hidden="true"></span>Sea Food</a></li>
						
						<!-- script-for-menu -->
					
					<li><a href="chinese.php" class="song-icon"><span class="glyphicon glyphicon-tent" aria-hidden="true" style="margin-top: 10px"></span><p style="margin-top: -18px; margin-left: 48px">Chinese</p></a></li>
					<li><a href="restaurant.php" class="news-icon"><span class="glyphicon glyphicon-home glyphicon-oil" aria-hidden="true"></span>Restaurant</a></li>
					<li><a href="bakery.php" class="news-icon"><span class="glyphicon glyphicon-apple" aria-hidden="true" style="margin-top: 10px"></span><p style="margin-top: -18px; margin-left: 48px">Bakery</p></a></li>
				  </ul>
				  <!-- script-for-menu -->
						<script>
							$( ".top-navigation" ).click(function() {
							$( ".drop-navigation" ).slideToggle( 300, function() {
							// Animation complete.
							});
							});
						</script>
					<div class="side-bottom">
						<div class="side-bottomom-icons">
							<ul class="nav2">
								<li><a href="#" class="facebook"> </a></li>
								<li><a href="#" class="facebook twitter"> </a></li>
								<li><a href="#" class="facebook chrome"> </a></li>
								<li><a href="#" class="facebook dribbble"> </a></li>
							</ul>
						</div>
					
					</div>
				</div>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<div class="main-grids">
				<div class="top-grids">
					<div class="recommended-info">
						<h2>Indian Food Videos</h2><br>
						<?php    
	$con= mysqli_connect("127.0.0.1","root","","foodtube");

	$vid_url = "videos/";
	$result = mysqli_query($con,"SELECT * FROM videos where category='indian'");
	
	while($row=mysqli_fetch_array($result))
	{
		$video = $vid_url.$row["video"];
		$type = $row["extention"];
		$id = $row["id"];
		$_SESSION["videoid"]=$id;
		?>

					<div class="col-md-4 resent-grid recommended-grid slider-top-grids">
						<div class="resent-grid-img recommended-grid-img">
									<video width="360" height="200">
   			<source src="<?php echo $video; ?>" type="video/<?php echo $type; ?>">
   			Your browser does not support the video tag.
 		</video>

						</div>
						<div class="resent-grid-info recommended-grid-info">
<form action="#" method="post">
	<input type="text" value="<?php echo $id; ?>" name="id" style="display: none">
						<h3> <input type="submit" name="video" class="link" value="<?php echo $row["title"];?>"
style="border:none;background-color:transparent;on:hover {text-decoration: underline;}"></h3>
</form>

							<ul>
<li><p class="author author-info"><a href="#" class="author"><?php
$userid= $row["userid"];
	$results = mysqli_query($con,"SELECT * FROM user where id= '$userid'");
		while($rows=mysqli_fetch_array($results))
	{
		echo 'Uploaded By '.$rows["name"];
	}
		?></a></p></li>
<li class="right-list">
<p class="views views-info"><?php
          $videoid= $_SESSION['videoid']; 
          $con=mysqli_connect("localhost","root","","foodtube");
$query="select * from liked where videoid='$videoid'";
$rs=mysqli_query($con,$query);
$row=mysqli_num_rows($rs);
echo $row." Likes";
          ?></p>
	<p class="views views-info">
<?php
          $videoid= $_SESSION['videoid']; 
          $con=mysqli_connect("localhost","root","","foodtube");
$query="select * from views where videoid='$videoid'";
$rs=mysqli_query($con,$query);
$row=mysqli_fetch_row($rs);
echo $row[1].' Views';
          ?></p>
</li>
								
							</ul>
						</div><br>
					</div>
<?php
	}
?>
					</div>	


					<div class="clearfix"> </div>
				</div><br>

				<div class="recommended">
					<div class="recommended-grids">
						<div class="recommended-info">
</div></div>							</div></div>	
			<!-- footer -->
						<div class="footer" style="margin-top: 306px">
				<div class="footer-grids">
					<div class="footer-top">
						<div class="footer-top-nav">
							<ul>
								<li><h4 style="color:white;">Created by Arpit and Ashwani<h4></li>
							</ul>
					</div>
				</div>
			</div>
			<!-- //footer -->
		</div>
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