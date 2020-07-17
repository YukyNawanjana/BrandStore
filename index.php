<?php 
    require 'includes/config.php';
    require 'includes/login_handler.php';
    require 'includes/register_handler.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logo Design</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha512-xA6Hp6oezhjd6LiLZynuukm80f8BoZ3OpcEYaqKoCV3HKQDrYjDE1Gu8ocxgxoXmwmSzM4iqPvCsOkQNiu41GA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="./assets/css/style.css">
  </head>
<body>
<!--- Nav Bar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">BrandStore</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link" data-toggle="modal" data-target="#signinForm">Log In</a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link" data-toggle="modal" data-target="#signupForm">Register</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown link
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
          
        </div>
      </li>
    </ul>
  </div>
</nav>
<!-- Nav Bar end --->

<!-- Modal Sign In(login ) -->
<div class="modal fade" id="signinForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title " id="exampleModalLongTitle">Sign In</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <!-- Login form -->
       <form class="text-center border border-light p-5 " action="index.php" method="POST">

            <p class="h4 mb-4">Sign In</p>
            <?php if(in_array("Email or password was incorrect", $error_array)){ 
                    echo "
                    <div class='alert alert-danger' role='alert'>
                        Email or password was incorrect
                    </div> 
                ";
            }
            ?>
            <!-- Email -->
            <input type="email" name="user_email" id="" class="form-control mb-4" placeholder="E-mail"  value="<?php 
            if(isset($_SESSION['log_email'])) {
                echo $_SESSION['log_email'];
            } 
            ?>"  required>

            <!-- Password -->
            <input type="password" name="user_password" id="" class="form-control mb-4" placeholder="Password" required>

            <div class="d-flex justify-content-around">
                <div>
                    <!-- Remember me -->
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember">
                        <label class="custom-control-label" for="defaultLoginFormRemember">Remember me</label>
                    </div>
                </div>
                <div>
                    <!-- Forgot password -->
                    <a href="">Forgot password?</a>
                </div>
            </div>

            <!-- Sign in button -->
            <button class="btn btn-primary btn-block my-4" type="submit" name="sign_in">Sign in</button>

            <!-- Register -->
            <p>Not a member?
                <a href="register.php">Register</a>
            </p>

            <!-- Social login -->
            <p>or sign in with:</p>

            <a href="#" class="mx-2" role="button"><i class="fab fa-facebook-f light-blue-text"></i></a>
            <a href="#" class="mx-2" role="button"><i class="fab fa-twitter light-blue-text"></i></a>
            <a href="#" class="mx-2" role="button"><i class="fab fa-linkedin-in light-blue-text"></i></a>
            <a href="#" class="mx-2" role="button"><i class="fab fa-github light-blue-text"></i></a>

        </form> 
        <!-- End form login -->
                
      </div>
    </div>
  </div>
</div>
<!--End Model -->

<!-- Model Sign up (Register) -->
<div class="modal fade" id="signupForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title " id="exampleModalLongTitle">Sign In</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <!-- Register form -->
          <form class="text-center border border-light p-5" action="index.php" method="POST">
            <p class="h4 mb-4">Sign up</p>
            <!-- From Error Dislay -->
            <?php 

                  if(in_array("Your first name must be between 2 and 25 characters<br>", $error_array)){
                      echo "
                          <div class='alert alert-danger' role='alert'>
                              Your first name must be between 2 and 25 characters
                          </div> 
                      "; 
                  }
                  if(in_array("Your last name must be between 2 and 25 characters<br>", $error_array)){
                      echo "
                          <div class='alert alert-danger' role='alert'>
                          Your last name must be between 2 and 25 characters
                          </div>
                      "; 
                  } 

                  if(in_array("Email already in use<br>", $error_array)){
                      echo "
                          <div class='alert alert-danger' role='alert'>
                              Email already in use
                          </div>
                      ";  
                  }

                  if(in_array("Your passwords do not match<br>", $error_array)){ 
                      echo "
                      <div class='alert alert-danger' role='alert'>
                          Your passwords do not match
                      </div>
                  ";  

                  }else if(in_array("Your password must be betwen 5 and 30 characters<br>", $error_array)){
                      echo "
                      <div class='alert alert-danger' role='alert'>
                          Your password must be betwen 5 and 30 characters
                      </div>
                  ";  
                  }

                  if(in_array("<span style='color: #14C800;'>You're all set! Go ahead and login!</span><br>", $error_array)){ 
                      echo " 
                          <div class='alert alert-success' role='alert'>
                              <span>You're all set! Go ahead and<a href='login.php'> Log in!</a></span>

                          </div>
                  ";
                  }
            ?>
            <div class="form-row mb-4">
                <div class="col">
                    <!-- First name -->
                    <input type="text" name="first_name" id="" class="form-control" placeholder="First name" value="<?php 
                    if(isset($_SESSION['reg_fname'])) {
                        echo $_SESSION['reg_fname'];
                    } 
                    ?>" required>
                </div>
                <div class="col">
                    <!-- Last name -->
                    <input type="text" name="last_name" id="" class="form-control" placeholder="Last name" value="<?php 
                    if(isset($_SESSION['reg_lname'])) {
                        echo $_SESSION['reg_lname'];
                    } 
                    ?>" required>
                </div>
            </div>

            <!-- User name 
            <input type="text" name="username" id="" class="form-control mb-4" placeholder="Usernname" required>
            -->
            <!-- E-mail -->
            <input type="email" name="email" id="" class="form-control mb-4" placeholder="E-mail" value="<?php 
                    if(isset($_SESSION['reg_email'])) {
                        echo $_SESSION['reg_email'];
                    } 
                    ?>" required>


            <!-- Phone number -->
            <input type="text" id="" name="mobile" class="form-control mb-4" placeholder="Phone number" value="<?php 
                    if(isset($_SESSION['reg_mobile'])) {
                        echo $_SESSION['reg_mobile'];
                    } 
                    ?>" required>
            <div class="form-group">
              <label for="">Select Buyer Or Designer </label>
              <select name="user_roles" id=""  class="form-control" required>
                <option disabled>Select Buyer Or Designer</option> 
                <option value="buyer">I want to Buy a Logo</option>
                <option value="designer">I'm a Designer</option>
              </select>
            </div>

            <!-- Password -->
            <input type="password" name="password" id="" class="form-control mb-4" placeholder="Password" required>
            <input type="password" name="password2" id="" class="form-control" placeholder="Confirm Password" required>
            <small id="" class="form-text text-muted mb-4">
                At least 8 characters and 1 digit
            </small>

            <!--  -->
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="terms" required>
                <label class="custom-control-label" for="terms">I accept the Terms of Use & Privacy Policy</label>
            </div>
            <!-- Sign up button -->
            <button class="btn btn-primary my-4 btn-block" type="submit" name="sign_up">Sign Up</button>

            <!-- Social register -->
            <p>or sign up with:</p>

            <a href="#" class="mx-2" role="button"><i class="fab fa-facebook-f light-blue-text"></i></a>
            <a href="#" class="mx-2" role="button"><i class="fab fa-twitter light-blue-text"></i></a>
            <a href="#" class="mx-2" role="button"><i class="fab fa-linkedin-in light-blue-text"></i></a>
            <a href="#" class="mx-2" role="button"><i class="fab fa-github light-blue-text"></i></a>
            <hr>
          </form>
       <!-- Register form End-->
      </div>
    </div>
  </div>
</div>

<!-- Main Section -->
<div class="container-fluid main-section">
    <div class="row">
        <div class="col-md-12 col-sm-12 text-center main-text">
            <h1>Welcome to BrandStore</h1>
            <p>Make a logo design online or browse thousands of premium logos for sale. Start for FREE.</p>
            <br>
            <button class="main-btn">Get Started</button>
        </div>
    </div>
</div>
<!-- Main Section End-->

    

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>