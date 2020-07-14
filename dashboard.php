<?php 
require 'includes/config.php';
require 'includes/logo_upload_handler.php';

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

    $_SESSION['massage'] = "Recode has been deleted !";
    $_SESSION['msg_type'] = "danger";
    header('location: dashboard.php');
    
}

if(isset($_GET['edit'])){

    echo "<div class='modal fade' id='exampleModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
    <div class='modal-dialog' role='document'>
      <div class='modal-content'>
        <div class='modal-header'>
          <h5 class='modal-title' id='exampleModalLabel'>Modal title</h5>
          <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
        </div>
      </div>
    </div>
  </div>";
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
                    <a class="nav-link" href="#">Welcome <?php echo $designer_username; ?></a>
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
                    <h3>User Details</h3> <br>
                    <img src="<?php echo $user_profice_pic; ?>" class="rounded-circle img-thumbnail profile-img" alt="">
                    <h5><?php echo $designer_username; ?></h5>
                    <h6>Front-End Developer</h6>
                </div>
                <br>
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active " id="v-pills-logo-tab" data-toggle="pill" href="#v-pills-logo" role="tab" aria-controls="v-pills-logo" aria-selected="true"><i class="fas fa-pen-nib mr-3"></i>Your Logos</a>
                    <a class="nav-link " id="v-pills-upload-tab" data-toggle="pill" href="#v-pills-upload" role="tab" aria-controls="v-pills-upload" aria-selected="false"><i class="fas fa-cloud-upload-alt mr-3"></i>Upload Logo</a>
                    <a class="nav-link " id="v-pills-payment-tab" data-toggle="pill" href="#v-pills-payment" role="tab" aria-controls="v-pills-payment" aria-selected="false"><i class="fas fa-money-check-alt mr-3"></i>Payments Methods</a>
                    <a class="nav-link " id="v-pills-analytics-tab" data-toggle="pill" href="#v-pills-analytics" role="tab" aria-controls="v-pills-analytics" aria-selected="false"><i class="fas fa-chart-line mr-3"></i>analytics</a>
                </div>
            </div>
            <!-- End sidebar -->

            <div class="col-sm-10 rightbar">
                <br>
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <?php
                            if(in_array("logo upladed", $error_array)){ 
                                echo " 
                                    <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                        Logo <strong>upload success</strong>.
                                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                        </button>
                                    </div>";
                            }

                            
                            if(in_array("logo_upladed_Faild", $error_array)){ 
                                echo " 
                                    <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                        Logo <strong>upladed Faild !</strong>.
                                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                        </button>
                                    </div>";
                            }
                        ?>
                    </div>
                </div>
                 <!-- Nav Pills -->
                <div class="tab-content" id="v-pills-tabContent">
                   
                    <!-- Your Logos -->
                    <div class="tab-pane fade show active card" id="v-pills-logo" role="tabpanel" aria-labelledby="v-pills-logo-tab">
                       <div class="container">
                       <br>
                        <h4 class="card-t text-center"><i class="fas fa-pen-nib mr-3"></i>Your Logos</h4>
                        <br>
                        <?php 
                            
                            $result = mysqli_query($con, "SELECT * FROM logo_details");
                        ?>
                            <div class="row justify-content-center">
                                <table class="table">
                                    <thead class="thead-dark text-center">
                                        <tr>
                                            <th>Logo</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th colspan="2">Action</th>
                                        </tr>
                                    </thead>
                                    <?php 
                                        while($row = $result->fetch_assoc()): ?>
                                        <tr>
                                            <td class=""><img src="<?php echo $row['logo_img']; ?>" style="height: 50px;" alt=""></td>
                                            <td class="text-center"><?php echo $row['logo_name']; ?></td>
                                            <td  class="text-center"> $ <?php echo $row['price']; ?></td>
                                            <td  class="text-center">
                                                <a href="dashboard.php?edit=<?php echo $row['id']; ?>" class="btn btn-success"  data-toggle="modal" data-target="#exampleModal">edit</a>
                                                <a href="dashboard.php?delete=<?php echo $row['id']; ?>"  class="btn btn-danger">delete</a>
                                            </td>
                                        </tr>
                                    <?php endwhile ?>
                                </table>
                            </div>
                       </div>
                    </div>
                     <!-- Your Logos End -->

                    <!-- Upload Logo  -->
                    <div class="tab-pane fade card" id="v-pills-upload" role="tabpanel" aria-labelledby="v-pills-upload-tab">
                        <br>
                        <h4 class="card-t text-center"><i class="fas fa-cloud-upload-alt mr-3"></i>Upload Logo</h4>
                        <br>
                        <!-- Upload from -->
                        <div class="container">
                            <div class="row">
                                <div class="col-ms-12 col-sm-12">
                                <hr>
                                    <form class="form" action="dashboard.php" method="POST" id="registrationForm">
                                        <!-- From Error Dislay -->
                                        <?php 
                                            /*
                                            if(in_array("username already in use", $error_array)){
                                                echo "
                                                    <div class='alert alert-danger' role='alert'>
                                                        username already in use
                                                    </div> 
                                                "; 
                                            }*/
                                            if(in_array("Your about must be between 30 and 100 characters", $error_array)){
                                                echo "
                                                    <div class='alert alert-danger' role='alert'>
                                                        Your about must be between 30 and 100 characters
                                                    </div>
                                                "; 
                                            } 
                                            
                                        ?>
                                        <div class="form-group">
                                            <div class="row">
                                            <input type="hidden" name="username" value="<?php echo $designer_username; ?>">
                                                <div class="col-md-6">
                                                    <label for="logoname"><h4>Logo Nome</h4></label>
                                                    <input type="text" class="form-control" name="logoname" id="logo_name"  placeholder="Logo Name" value="<?php 
                                                    if(isset($_SESSION['upload_logo_name'])) {
                                                        echo $_SESSION['upload_logo_name'];
                                                    } 
                                                    ?>" required>
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="logo_price"><h4>Price</h4></label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">$</span>
                                                        </div>
                                                        <input type="number" class="form-control"  name="logo_price" value="<?php 
                                                        if(isset($_SESSION['upload_logo_price'])) {
                                                            echo $_SESSION['upload_logo_price'];
                                                        } 
                                                        ?>" required >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- You can Add new Filds
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="company"><h4>Company</h4></label>
                                                        <input type="text" class="form-control" name="company" id="company" placeholder="Company" value="<?php 
                                                        if(isset($_SESSION['designer_company'])) {
                                                            echo $_SESSION['designer_company'];
                                                        } 
                                                        ?>" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="birthday"><h4>Date of Birth</h4></label>
                                                    <input type="date" class="form-control" name="birthday" id="birthday" value="<?php 
                                                    if(isset($_SESSION['designer_birthday'])) {
                                                        echo $_SESSION['designer_birthday'];
                                                    } 
                                                    ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        -->
                                        
                                        <div class="form-group">    
                        <div class="col-xs-12">
                            <label for="logoabout"><h4>Brief Description of Logo</h4></label>
                            <textarea name="logoabout" id="logoabout" rows="5" class="form-control" placeholder="Write somthing here......." required ><?php 
                                if(isset($_SESSION['logo_about'])) {
                                    echo $_SESSION['logo_about'];
                                } 
                                ?> </textarea>
                            <label for="about"><h6>Words</h6><?php
                                if(isset($_POST['about'])){
                                    $about_words = 0;
                                    $about_words = strlen($_POST['about']);
                                    echo $about_words; 
                                }
                            ?></label>
                        </div>
                    </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="logo_img"><h4>Image</h4></label>
                                                    <input type="text" class="form-control" name="logo_img" id="logo_img" value="./assets/images/logos/logo1.png">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- You can Add new Filds
                                        <div class="form-group">    
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="city"><h4>City</h4></label>
                                                    <input type="text" class="form-control" name="city" id="city" placeholder="City" value="<?php 
                                                    if(isset($_SESSION['designer_city'])) {
                                                        echo $_SESSION['designer_city'];
                                                    } 
                                                    ?>" required>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="country"><h4>Country</h4></label>
                                                    <input type="text" class="form-control" name="country" id="country" placeholder="Country" value="<?php 
                                                    if(isset($_SESSION['designer_country'])) {
                                                        echo $_SESSION['designer_country'];
                                                    } 
                                                    ?>" required>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="zip"><h4>Zip Code</h4></label>
                                                    <input type="text" class="form-control" name="zipcode" id="zip" placeholder="Zip Code" value="<?php 
                                                    if(isset($_SESSION['designer_zip'])) {
                                                        echo $_SESSION['designer_zip'];
                                                    } 
                                                    ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        -->

                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <br>
                                                <button class="btn btn-primary form-control" type="submit" name="logo_upload"><i class="fas fa-cloud-upload-alt mr-3"></i>Upload Logo</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Upload form End -->
                    </div>
                    <!-- Upload Logo End -->

                    <!-- Payment Method  -->
                    <div class="tab-pane fade card" id="v-pills-payment" role="tabpanel" aria-labelledby="v-pills-payment-tab">
                        <br>
                        <h4 class="card-t text-center"><i class="fas fa-money-check-alt mr-3"></i>Manage Your Payments Methods</h4>
                    </div>
                     <!-- Payment Method End -->

                      <!-- Analytics  -->
                    <div class="tab-pane fade card" id="v-pills-analytics" role="tabpanel" aria-labelledby="v-pills-analytics-tab">
                        <br>
                        <h4 class="card-t text-center"><i class="fas fa-chart-line mr-3"></i>analytics</h4>
                    </div>
                     <!-- Analytics End -->
                </div> 
                <!-- Nav Pills -->
        
            </div>
        </div>
    </div>
    <!-- Dashbord Content End -->

    <!-- Footer -->
    <footer class="container-fluid">
    <p>Footer Text</p>
    </footer>
    <!-- Footer End -->




<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>