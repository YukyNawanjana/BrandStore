<?php 
require 'includes/config.php';
require 'includes/upload_handler.php';
if (isset($_SESSION['designer_email'])) {
	$userLoggedIn = $_SESSION['designer_email'];
	$user_details_query = mysqli_query($con, "SELECT * FROM users WHERE email='$userLoggedIn'");
    $user = mysqli_fetch_array($user_details_query);

    $designer_query = mysqli_query($con,"SELECT * FROM designer WHERE email='$userLoggedIn'");
    $row = mysqli_fetch_array($designer_query);
    
    $designer_username = $row['username'];
    $_SESSION['designer_username'] = $designer_username;
    

    
    $user_id = $user['id'];
    $user_mobile = $user['mobile'];
    $user_profice_pic = $user['profile_pic'];    
}
else {
	header("Location: index.php");
}


if(isset($_GET['delete'])){
    $id = $_GET['delete'];

    $query = mysqli_query($con, "DELETE FROM logo_details WHERE id=$id");

    header('location: dashboard_logo.php');
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha512-xA6Hp6oezhjd6LiLZynuukm80f8BoZ3OpcEYaqKoCV3HKQDrYjDE1Gu8ocxgxoXmwmSzM4iqPvCsOkQNiu41GA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="./assets/css/dashboard.css">
</head>
<body>
    
    <!-- Nav Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">Login & Register </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Welcome Yasiru<?php// echo $designer_username; ?></a>
                </li> 
                <li class="nav-item active">
                    <a class="nav-link" href="logout.php">Log Out<i class="fas fa-sign-out-alt ml-2"></i></a>
                </li> 
            </ul>
        </div>
    </nav>
    <!-- Nav Bar End -->


    <!-- Dashbord Content -->
    <div class="container-fluid">
    <div class="row content">
        <div class="col-sm-2 sidenav">
        <hr>
            <div class="text-center">
                <h3>User Details</h3> <br><?php// echo $user_profice_pic; ?>
                <img src="./assets/images/profile_pic/12.jpg " class="rounded-circle img-thumbnail profile-img" alt="">
                <h5>user name</h5>
                <h6>Front-End Developer</h6>
            </div>
            <br>