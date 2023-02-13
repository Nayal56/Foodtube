<?php session_start(); ?>
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
                    <div class="image img">
<br>
                  <figure>

<figcaption><h1>Admin</h1></figcaption> 

</figure>
                       
                    </div>

                   
                </div>
                <nav class="navbar-sidebar2">
  <ul class="list-unstyled navbar__list">
                   
                        <li>
                            <a class="js-arrow" href="admin.php">
                                <i class="fas fa-copy"></i>New Videos
                                
                            </a>
                    
                        </li>
                                                <li>
                            <a class="js-arrow" href="allvideos.php">
                                <i class="fas fa-copy"></i>All Videos
                            </a>
                        </li>
                                                                                               <li class="active has-sub">
                            <a class="js-arrow" href="blocked.php">
                                <i class="fas fa-copy"></i>Blocked Users
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
                                            <li class="list-inline-item">Videos</li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END BREADCRUMB--><br>
                                    
<div class="container">
  <h2>All Videos</h2>
<br>       
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Account Type</th>
                <th>Full Details / Unblock</th>
      </tr>
    </thead>
    <tbody>
         <?php    
    $con= mysqli_connect("127.0.0.1","root","","foodtube");
    $result = mysqli_query($con,"SELECT * FROM user where status='blocked' order by id desc");
    while($row=mysqli_fetch_array($result))
    {

        $id = $row["id"];
        $_SESSION["videoid"]=$id;
        ?>
      <tr>
        <td><?php echo $row["name"]; ?></td>
        <td><?php echo $row["mobile"]; ?></td>
                <td><?php echo $row["type"]; ?></td>
        <form action="#" method="post">
                <input type="text" value="<?php echo $row[0]; ?>" style="display: none;" name="userid">
            <input type="text" value="<?php echo $id; ?>" style="display: none;" name="id">
        <td><button type="submit" class="btn btn-info" name="user">Full details</button>
            <button type="submit" class="btn btn-dark" name="unblock">Unblock</button></td>
      </form>
      </tr>
  <?php } ?>

    </tbody>
  </table>
</div>
<?php 
if(isset($_POST['unblock'])){
    $id=$_POST['id'];
    $results = mysqli_query($con, "UPDATE user SET status = 'null' WHERE id = '$id'");
    echo "<script>alert('This User has been Unblocked');window.location.href='blocked.php';</script>";
}
if(isset($_POST['user'])){
    $_SESSION['userid']=$_POST['userid'];
    echo "<script>window.location.href='userdetails.php';</script>";
}
?>



    
<br>


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