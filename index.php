
<?php
session_start();
// Redirect to login page if user is not logged in
if (empty($_SESSION['pass'])) {
    header("location:login.php");
}

// Include database connection
include "connect.php";
$run = mysqli_query($conn,"select * from profiles order by eid");
?>

<!doctype html>
<html class="fixed sidebar-light">
<head>
    <!-- Meta information -->
    <meta charset="UTF-8">
    <title>SRKREC ADMINISTRATION</title>
    <meta name="keywords" content="srkr" />
    <meta name="description" content="srkrec-administration">
    <meta name="author" content="#">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="vendor/font-awesome/css/all.min.css" />
    <link rel="stylesheet" href="vendor/boxicons/css/boxicons.min.css" />
    <link rel="stylesheet" href="css/theme.css" />
    <link rel="stylesheet" href="css/skins/default.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="vendor/modernizr/modernizr.js"></script>


	

</head>
<body>
    <section class="body">
        <?php include 'navbar.php'?>
            <!-- Content section -->
            <section role="main" class="content-body">
                <header class="page-header">
                    <h2>SRKREC ADMINISTRATION</h2>
                </header>
                <!-- department starts -->
						<div class="col-lg-12">
							<div class="row mb-3">
							
								<div class="col-xl-4">
									<section class="card card-featured-left card-featured-secondary mb-3">
										<div class="card-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-secondary">
														<i class="fas fa-desktop"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary mt-3">
														<h4 class="title"><b>COMPUTER SCIENCE &<br>ENGINEERING</b></h4>
														<div class="info">
															(Since 1991)
														</div>
													</div>
													<div class="summary-footer">
														<a class="text-muted text-uppercase" href="#">(View)</a>
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>
							</div>
						</div>

								
				<!-- department ends -->
				<!-- staff details start -->
				

        <!-- Vendor -->
        <script src="vendor/jquery/jquery.js"></script>
        <script src="vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
        <script src="vendor/popper/umd/popper.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.js"></script>
        <!-- Theme Base, Components and Settings -->
        <script src="js/theme.js"></script>
    </body>
</html>