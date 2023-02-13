<?php 
session_start();
$a=0;
$id=$_SESSION["id"];
$con= mysqli_connect("localhost","root","","foodtube");
$query="select * from videos where userid='$id'";
$rs=mysqli_query($con,$query);
while($row=mysqli_fetch_array($rs)){
$r=$row['0'];
$q="select * from views where videoid='$r'";
$res=mysqli_query($con,$q);
while($rows=mysqli_fetch_array($res)){
$a=$rows['1']+$a;
}
}
?>

<?php 
$id=$_SESSION["id"];
$con= mysqli_connect("localhost","root","","foodtube");
$query="select * from videos where userid='$id'";
$rs=mysqli_query($con,$query);
$rowscount= mysqli_num_rows($rs);
?>

<?php 
$liked=0;
$id=$_SESSION["id"];
$con= mysqli_connect("localhost","root","","foodtube");
$query="select * from videos where userid='$id'";
$rs=mysqli_query($con,$query);
while($row=mysqli_fetch_array($rs)){
$like=$row['0'];
$querys="select * from liked where videoid='$like'";
$rse=mysqli_query($con,$querys);
$liked= mysqli_num_rows($rse)+$liked;
}
?>

<?php 
$comments=0;
$id=$_SESSION["id"];
$con= mysqli_connect("localhost","root","","foodtube");
$query="select * from videos where userid='$id'";
$rs=mysqli_query($con,$query);
while($row=mysqli_fetch_array($rs)){
$comment=$row['0'];
$querys="select * from comment where videoid='$comment'";
$rse=mysqli_query($con,$querys);
$comments= mysqli_num_rows($rse)+$comments;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard 2</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <link href="vendor/vector-map/jqvmap.min.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar2">
            <div class="logo">
                <a href="#">
                    <img src="images/foodtube.jpeg" alt="Cool Admin" height="10px"width="140px" style=" margin-top: 10px ;margin-left: 50px;"/>
                </a>
            </div>
            <div class="menu-sidebar2__content js-scrollbar1">
                <div class="account2">
                    <div class="image img-cir img-cir">
                                        <?php $image_data= $_SESSION['photo'];

                ?>
                  <img src="data:image/jpeg;base64,<?php echo base64_encode( $image_data ); ?>" />
                    </div>
                    <h4 class="name"><?php echo $_SESSION['name'];?></h4>
                   
                </div>
                <nav class="navbar-sidebar2">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="user.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard
                               
                            </a>
                        </li>
                        <li>
                            <a href="videos.php">
                                <i class="fas fa-chart-bar"></i>Videos</a>
                         
                        </li>
                                                                        <li>
                            <a href="Pendingvideos.php">
                                <i class="fas fa-chart-bar"></i>Pending Videos</a>
                         
                        </li>
                        <li>
                            <a href="myaccount.php">
                                <i class="fas fa-shopping-basket"></i>My Account</a>
                        </li>
                   
                        <li class="has-sub">
                            <a class="js-arrow" href="contactexpert.php">
                                <i class="fas fa-copy"></i>Contact Expert             
                            </a>
                        </li>
                       
               
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container2">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop2">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap2">
                            <div class="logo d-block d-lg-none">
                                <a href="#">
                                    <img src="images/icon/logo-white.png" alt="CoolAdmin" />
                                </a>
                            </div>
                            <div class="header-button2">
                            
                               
                                <div class="header-button-item mr-0 js-sidebar-btn">
                                    <i class="zmdi zmdi-menu"></i>
                                </div>
                                <div class="setting-menu js-right-sidebar d-none d-lg-block">
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="index.php">
                                                <i class="zmdi zmdi-account"></i>Home</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="upload.php">
                                                <i class="zmdi zmdi-settings"></i>Upload Video</a>
                                        </div>
                                   
                                    </div>
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="logout.php">
                                                <i class="zmdi zmdi-globe"></i>Logout</a>
                                        </div>
                                   
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- END HEADER DESKTOP-->

            <!-- BREADCRUMB-->
            <section class="au-breadcrumb m-t-75">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="au-breadcrumb-content">
                                    <div class="au-breadcrumb-left">
                                        <span class="au-breadcrumb-span">You are here:</span>
                                        <ul class="list-unstyled list-inline au-breadcrumb__list">
                                            <li class="list-inline-item active">
                                                <a href="#">Home</a>
                                            </li>
                                            <li class="list-inline-item seprate">
                                                <span>/</span>
                                            </li>
                                            <li class="list-inline-item">Dashboard</li>
                                        </ul>
                                    </div>
                                    <a href="upload.php" class="au-btn au-btn-icon au-btn--green">
                                        <i class="zmdi zmdi-plus"></i>Upload a Video</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END BREADCRUMB-->



            <!-- STATISTIC-->
            <section class="statistic">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item">
                                    <h2 class="number" id="p1">10,368</h2>
                                    <span class="desc">Total Views</span>
                                    <div class="icon">
                                        <i class="zmdi zmdi-account-o"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item">
                                    <h2 class="number"id="p2">388,688</h2>
                                    <span class="desc">Total Videos</span>
                                    <div class="icon">
                                        <i class="zmdi zmdi-shopping-cart"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item">
                                    <h2 class="number" id="p3">1,086</h2>
                                    <span class="desc">Total Likes</span>
                                    <div class="icon">
                                        <i class="zmdi zmdi-calendar-note"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item">
                                    <h2 class="number" id="p4">$1,060,386</h2>
                                    <span class="desc">Total Comments</span>
                                    <div class="icon">
                                        <i class="zmdi zmdi-money"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END STATISTIC-->

            <section>
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xl-8">
                                <!-- RECENT REPORT 2-->
                                <div class="recent-report2">
                                    <h3 class="title-3">Your Recent Video 
                            <script>
document.getElementById("p1").innerHTML = "<?php echo $a; ?>";
</script>
<script>
document.getElementById("p2").innerHTML = "<?php echo $rowscount; ?>";
</script>
<script>
document.getElementById("p3").innerHTML = "<?php echo $liked; ?>";
</script>
<script>
document.getElementById("p4").innerHTML = "<?php echo $comments; ?>";
</script>
 </h3>
 <?php    
    $con= mysqli_connect("127.0.0.1","root","","foodtube");

    $vid_url = "videos/";
    $userid = $_SESSION['id'];
    $result = mysqli_query($con,"SELECT * FROM videos where userid='$userid' order by id desc limit 0,1");

    
    while($row=mysqli_fetch_array($result))
    {
        $video = $vid_url.$row["video"];
        $type = $row["extention"];
        $id = $row["id"];

        ?>
                               <br>
                    
                        <div class="video-grid">
                                    <video width="560" height="315" controls>
            <source src="<?php echo $video; ?>" type="video/<?php echo $type; ?>">
            Your browser does not support the video tag.
        </video><br><br> <h3><?php echo $row["title"]; ?></h3><br>
     <p><?php echo $row["description"]; }?></p></div>
                                </div>
                                <!-- END RECENT REPORT 2             -->
                            </div>

                        </div>
                    </div>
                </div>
            </section>



            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>
    <script src="vendor/vector-map/jquery.vmap.js"></script>
    <script src="vendor/vector-map/jquery.vmap.min.js"></script>
    <script src="vendor/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="vendor/vector-map/jquery.vmap.world.js"></script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->