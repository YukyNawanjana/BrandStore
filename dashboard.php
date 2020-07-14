<?php 
require 'includes/config.php';
if (isset($_SESSION['designer_email'])) {
	$userLoggedIn = $_SESSION['designer_email'];
	$user_details_query = mysqli_query($con, "SELECT * FROM users WHERE email='$userLoggedIn'");
    $user = mysqli_fetch_array($user_details_query);

    $user_id = $user['id'];
    $user_mobile = $user['mobile'];
    $user_profice_pic = $user['profile_pic'];    
}
else {
	header("Location: index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha512-xA6Hp6oezhjd6LiLZynuukm80f8BoZ3OpcEYaqKoCV3HKQDrYjDE1Gu8ocxgxoXmwmSzM4iqPvCsOkQNiu41GA==" crossorigin="anonymous" />
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Login & Register </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Welcome <?php echo $_SESSION['user_name']; ?></a>
                </li> 
                <li class="nav-item active">
                    <a class="nav-link" href="logout.php">Log Out<i class="fas fa-sign-out-alt ml-2"></i></a>
                </li> 
            </ul>
        </div>
    </nav>

    <div class="container">
        <br>
        <h3 class="text-center">User Details</h3> 
        <br>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <img src="./<?php echo $user_profice_pic; ?>" style="position: absolute !important; top:40px; left:50%" class="rounded-circle img-thumbnail " alt="">
            </div>
            <div class="col-md-6 col-sm-12">
                    <div class="card ">
                        <div class="card-header text-black text-center"  style="padding : 7px 0px"><span><i class="fas fa-id-card mr-3"></i><strong>User Id</strong></span></div>
                            <div class="card-body" style="padding : 10px 0px">
                            <p class="card-text text-center"><span><?php echo $user_id; ?></span></p>
                            </div>
                    </div>

                    <div class="card ">
                        <div class="card-header text-black text-center"  style="padding : 7px 0px"><span><i class="fas fa-user mr-3"></i><strong>Name</strong></span></div>
                            <div class="card-body " style="padding : 10px 0px">
                            <p class="card-text text-center"><span><?php echo $_SESSION['user_name']; ?></span></p>
                            </div>
                    </div>

                    <div class="card ">
                        <div class="card-header text-black text-center"  style="padding : 7px 0px"><span><i class="fas fa-envelope mr-3"></i><strong>Email</strong></span></div>
                            <div class="card-body" style="padding : 10px 0px">
                            <p class="card-text text-center"><span><?php echo $_SESSION['user_email']; ?></span></p>
                            </div>
                    </div>

                    <div class="card ">
                        <div class="card-header text-black text-center"  style="padding : 7px 0px"><span><i class="fas fa-phone-alt mr-3"></i><strong>Mobile Number</strong></span></div>
                            <div class="card-body" style="padding : 10px 0px">
                            <p class="card-text text-center"><span><?php echo $user_mobile; ?></span></p>
                            </div>
                    </div>

                </div><!-- col-md-6 End-->
        </div>
    </div>    





<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>