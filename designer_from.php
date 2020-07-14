<?php 
    require 'includes/config.php';
    require 'includes/designer_handler.php';
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col-ms-12 col-sm-12">
            <h2 class="text-center">Hello <?php echo $_SESSION['designer_name'];?> ! Complete Your Designer Profile.</h2>
            <hr>
                <form class="form" action="designer_from.php" method="POST" id="registrationForm">
                    <!-- From Error Dislay -->
                    <?php 

                        if(in_array("username already in use", $error_array)){
                            echo "
                                <div class='alert alert-danger' role='alert'>
                                    username already in use
                                </div> 
                            "; 
                        }
                        if(in_array("Your about must be between 30 and 100 characters", $error_array)){
                            echo "
                                <div class='alert alert-danger' role='alert'>
                                    Your about must be between 30 and 100 characters
                                </div>
                            "; 
                        } 
                        if(in_array("<span style='color: #14C800;'>You're all set! Go ahead and login!</span>", $error_array)){ 
                            echo " 
                                <div class='alert alert-success' role='alert'>
                                    <span>You're all set! Go ahead and<a href='login.php'> Log in!</a></span>
                                </div>
                        ";
                        }
                    ?>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="email"><h4>Email</h4></label>
                                <input type="text" class="form-control" name="email" id="email" value="<?php echo $_SESSION['designer_email']; ?>" disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="user_name"><h4>User Name</h4></label>
                                <input type="text" class="form-control" name="user_name" id="user_name" placeholder="User Name" value="<?php 
                                if(isset($_SESSION['designer_username'])) {
                                    echo $_SESSION['designer_username'];
                                } 
                                ?>" required >
                            </div>
                        </div>
                    </div>

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
                    
                    <div class="form-group">    
                        <div class="col-xs-12">
                            <label for="about"><h4>Tell us About You!</h4></label>
                            <textarea name="about" id="about" rows="5" class="form-control" placeholder="Write somthing here......." required ><?php 
                                if(isset($_SESSION['designer_about'])) {
                                    echo $_SESSION['designer_about'];
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
                            <div class="col-md-6">
                                <label for="address"><h4>Address</h4></label>
                                <input type="text" class="form-control" name="address" id="address" placeholder="Address" value="<?php 
                                if(isset($_SESSION['designer_address'])) {
                                    echo $_SESSION['designer_address'];
                                } 
                                ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label for="address_line_2"><h4>Address line 2</h4></label>
                                <input type="text" class="form-control" name="address2" id="address_line_2" placeholder="Address Line 2" value="<?php 
                                if(isset($_SESSION['designer_address2'])) {
                                    echo $_SESSION['designer_address2'];
                                } 
                                ?>" required>
                            </div>
                        </div>
                    </div>

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

                    <div class="form-group">
                        <div class="col-xs-12">
                            <br>
                            <button class="btn btn-primary form-control" type="submit" name="submit"><i class="glyphicon glyphicon-ok-sign"></i>Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br><br>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>