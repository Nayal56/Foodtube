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
$query="select * from views where videoid='$videoid'";
	if($con)
	{
		$rs=mysqli_query($con,$query);
		$fr=mysqli_fetch_row($rs);
		if($fr==null){
	
		}
	}
	header("Location: video.php");
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
		$id=$fr[0];
			if($email==$_SESSION['email'] && $password==$fr[3])
			{
				header("Location: video.php");
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
$query = "insert into user(name,email,password,gender,mobile,image) VALUES('$name','$email','$password','$gender','$mobile','$imgContent')";
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
ul#menu li {
  display:inline;
}
<style>
.link:hover {
  text-decoration: underline;
}
</style>
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

					<li class="active"><a href="index.php" class="home-icon"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
					<li><a href="indian.php" class="user-icon"><span class="glyphicon glyphicon-home glyphicon-blackboard" aria-hidden="true"></span>Indian</a></li>
					<li><a href="fastfood.php" class="sub-icon"><span class="glyphicon glyphicon-home glyphicon-cutlery" aria-hidden="true"></span>Fast Food</a></li>
					<li><a href="drinks.php" class="menu1"><span class="glyphicon glyphicon-glass" aria-hidden="true" style="margin-top: 10px"></span><p style="margin-top: -18px; margin-left: 48px">Drinks</p></a></li>
					
						<!-- script-for-menu -->
				
					<li><a href="Seafood.php" class="menu"><span class="glyphicon glyphicon-film glyphicon-tint" aria-hidden="true"></span>Sea Food</a></li>
						
						<!-- script-for-menu -->
					
					<li><a href="chinese.php" class="song-icon"><span class="glyphicon glyphicon-tent" aria-hidden="true" style="margin-top: 10px"></span><p style="margin-top: -18px; margin-left: 48px">Chinese</p></a></li>
					<li><a href="restaurant.php" class="news-icon"><span class="glyphicon glyphicon-home glyphicon-oil" aria-hidden="true"></span>Restaurant</a></li>
					<li><a href="bakery.php" class="news-icon"><span class="glyphicon glyphicon-apple" aria-hidden="true" style="margin-top: 10px"></span><p style="margin-top: -18px; margin-left: 48px">Bakery</p></a></li> glyphicon-blackboard" aria-hidden="true"></span>Restaurant</a></li>
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


					</div>
				</div>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<div class="show-top-grids">
				<div class="col-sm-8 single-left">
					<div class="song">
						<div class="song-info">
													<?php    
	$con= mysqli_connect("127.0.0.1","root","","foodtube");

	$vid_url = "videos/";
	$video = $_SESSION['video'];
	$result = mysqli_query($con,"SELECT * FROM videos where id='$video'");

	
	while($row=mysqli_fetch_array($result))
	{


		$video = $vid_url.$row["video"];
		$type = $row["extention"];
		$id = $row["id"];

		?>
							<h3><?php echo $row["title"];?></h3>	<br>
					</div>
						<div class="video-grid">
									<video width="560" height="315" controls autoplay>
   			<source src="<?php echo $video; ?>" type="video/<?php echo $type;} ?>">
   			Your browser does not support the video tag.
 		</video>					<div class="song-grid-right col-md-2">
					<div class="share">
							<?php  

	if(isset($_SESSION['name']) && !empty($_SESSION['name'])){
	$con= mysqli_connect("127.0.0.1","root","","foodtube");
	$userid= $_SESSION['id'];
$videoid= $_SESSION['video'];

	$result = mysqli_query($con,"SELECT * FROM liked where videoid='$videoid' and userid='$userid'");

		$fr=mysqli_fetch_row($result);
		if($fr!=null){
	

		{
echo '<ul id="menu"><form action="#" method="post">
        <button type="submit" class="btn btn-default btn-sm" name="liked">
          <span class="glyphicon glyphicon-thumbs-up" style=" color: blue"></span> Liked
        </button></form></ul>';
		}}
		else{
		echo '<ul id="menu"><form action="#" method="post">
        <button type="submit" class="btn btn-default btn-sm" name="like">
          <span class="glyphicon glyphicon-thumbs-up"></span> Like
        </button></form></ul>';	
		}
}else{
		echo '<ul id="menu"><form action="#" method="post">
        <button type="submit" class="btn btn-default btn-sm" name="like">
          <span class="glyphicon glyphicon-thumbs-up"></span> Like
        </button></form></ul>';	
}

		?>

</div></div>		
				<?php
if(isset($_POST['like']))
{
	if(isset($_SESSION['name']) && !empty($_SESSION['name'])){
                 	$userid= $_SESSION['id'];
                 	$videoid= $_SESSION['video'];
     

$conn = new mysqli("localhost","root","","foodtube");

$query = "insert into liked(userid,videoid,liked) VALUES('$userid','$videoid','liked')";
if($conn->query($query)==TRUE)
{
					echo "<script>window.location.href='video.php';</script>";
}
else
{
	echo"Sorry you've not entered the data correctly";
}
}else{
	echo '<script>alert("Login first");</script>';
}
}
?>
				<?php
if(isset($_POST['liked']))
{
	if(isset($_SESSION['name']) && !empty($_SESSION['name'])){
                 	$userid= $_SESSION['id'];

$conn = new mysqli("localhost","root","","foodtube");

$query = "DELETE FROM liked WHERE userid='$userid'";
if($conn->query($query)==TRUE)
{
					echo "<script>window.location.href='video.php';</script>";
}
else
{
	echo"Sorry you've not entered the data correctly";
}
}else{
	echo '<script>alert("Login first");</script>';
}
}
?>
			<div class="song-grid-right col-md-">
					<div class="share">
			<ul id="menu">
             <a href="#section2">   <button type="button" class="btn btn-default btn-sm">
          <span class="glyphicon glyphicon-comment"></span> Comment
        </button></a>

</ul>  
</div></div>
			<div class="song-grid-right col-md-4">
					<div class="share">
			<ul id="menu">
               <button type="button" class="btn btn-default btn-sm" style="border: none;">
          <span class="glyphicon glyphicon-play"></span> Views<?php
          $videoid= $_SESSION['video']; 
          $con=mysqli_connect("localhost","root","","foodtube");
$query="select * from views where videoid='$videoid'";
$rs=mysqli_query($con,$query);
$row=mysqli_fetch_row($rs);
echo ' ('.$row[1].')';
          ?>
        </button>

</ul>  
</div></div>




						</div>
					</div>




					<div class="clearfix"> </div>
					<div class="published">
						<script src="jquery.min.js"></script>
							<script>
								$(document).ready(function () {
									size_li = $("#myList li").size();
									x=1;
									$('#myList li:lt('+x+')').show();
									$('#loadMore').click(function () {
										x= (x+1 <= size_li) ? x+1 : size_li;
										$('#myList li:lt('+x+')').show();
									});
									$('#showLess').click(function () {
										x=(x-1<0) ? 1 : x-1;
										$('#myList li').not(':lt('+x+')').hide();
									});
								});
							</script>
						
							<div class="load_more">	
								<ul id="myList">
									<li>													<?php    
	$con= mysqli_connect("127.0.0.1","root","","foodtube");

	$vid_url = "videos/";
	$video = $_SESSION['video'];
	$result = mysqli_query($con,"SELECT * FROM videos where id='$video'");

	
	while($row=mysqli_fetch_array($result))
	{


		$video = $vid_url.$row["video"];
		$type = $row["extention"];
		$id = $row["id"];

		?>
										<h4>Published on <?php echo $row['date'];?></h4>
										<p><?php echo $row['description']; ?></p><?php } ?>
									</li>
									<li>

										<div class="load-grids">
											<div class="load-grid">
												<p>Category</p>
											</div>
											<div class="load-grid">
												<a href="movies.html">Entertainment</a>
											</div>
											<div class="clearfix"> </div>
										</div>
									</li>
								</ul>
							</div>
					</div>
					<script>
$(document).ready(function(){
  // Add smooth scrolling to all links
  $("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
});
</script>
					<div class="all-comments" id = "section2">
						<div class="all-comments-info">
							<a href="#">All Comments</a>
							<div class="box">
								<form action="#" method="post">
									<textarea placeholder="Send your Comment" required="" name="comment"></textarea>
									<input type="submit" name="send" value="SEND">
									<div class="clearfix"> </div>
								</form>
							</div>

				<?php
if(isset($_POST['send']))
{
	if(isset($_SESSION['name']) && !empty($_SESSION['name'])){
                 	$userid= $_SESSION['id'];
                 	$videoid= $_SESSION['video'];
                   $comment= $_POST['comment'];
                   $name= $_SESSION['name'];
     

$conn = new mysqli("localhost","root","","foodtube");

$query = "insert into comment(userid,videoid,comment,username) VALUES('$userid','$videoid','$comment','$name')";
if($conn->query($query)==TRUE)
{
					echo "<script>alert('Your comment was uploaded'); window.location.href='video.php';</script>";
}
else
{
	echo"Sorry you've not entered the data correctly";
}
}else{
	echo '<script>alert("Login first");</script>';
}
}
?>
						</div>
												
						<div class="media-grids">
							<?php    
	$con= mysqli_connect("127.0.0.1","root","","foodtube");
$videoid= $_SESSION['video'];
	$result = mysqli_query($con,"SELECT * FROM comment where videoid='$videoid'");

	
	while($row=mysqli_fetch_array($result))
	{


		?>


							<div class="media">
								<h5> <?php echo $row["username"]; ?></h5>
							
								<div class="media-body">
									<p><?php echo $row["comment"]; ?></p>
								</div>
							</div><?php }?>



						</div>
					</div>
				</div>
				<div class="col-md-4 single-right">
					<h3>More Videos</h3>
					<div class="single-grid-right">
						<?php    
	$con= mysqli_connect("127.0.0.1","root","","foodtube");

	$vid_url = "videos/";
	$result = mysqli_query($con,"SELECT * FROM videos ORDER BY id limit 0,13");
	$row = mysqli_fetch_assoc($result);
	
	while($row=mysqli_fetch_array($result))
	{
		$video = $vid_url.$row["video"];
		$type = $row["extention"];
		$id = $row["id"];
		?>
						<div class="single-right-grids">
							<div class="col-md-4 single-right-grid-left">
																	<video width="120" height="80">
   			<source src="<?php echo $video; ?>" type="video/<?php echo $type; ?>">
   			Your browser does not support the video tag.
 		</video>
							</div>
							<div class="col-md-8 single-right-grid-right">
							<form action="#" method="post">
	<input type="text" value="<?php echo $id; ?>" name="id" style="display: none">
						<h3> <input type="submit" name="video" class="link" value="<?php echo $row["title"];?>"
style="border:none;background-color:transparent;font-size: 15px;on:hover {text-decoration: underline;}"></h3>
</form>
								<p class="author"><a href="#" class="author"><?php
$userid= $row["userid"];
	$results = mysqli_query($con,"SELECT * FROM user where id= '$userid'");
		while($rows=mysqli_fetch_array($results))
	{
		echo 'Uploaded By '.$rows["name"];
	}
		?></a></p>
								<p class="views"><?php
          
          $con=mysqli_connect("localhost","root","","foodtube");
$query="select * from views where videoid='$id'";
$rs=mysqli_query($con,$query);
$row=mysqli_fetch_row($rs);
echo $row[1].' Views';
          ?></p>
							</div>
							<div class="clearfix"> </div>
						</div><?php } ?>


					</div>
				</div>
				<div class="clearfix"> </div>
			</div>							
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