<?php include 'dashboard_nav.php'; ?>
<?php

?>


                <div class="nav flex-column nav-pills">
                    <a class="nav-link  " href="dashboard.php" ><i class="fas fa-home mr-3"></i></i>Home</a>
                    <a class="nav-link " href="dashboard_logo.php" ><i class="fas fa-pen-nib mr-3"></i>Your Logos</a>
                    <a class="nav-link active" href="dashboard_upload.php" ><i class="fas fa-cloud-upload-alt mr-3"></i>Upload Logo</a>
                    <a class="nav-link " href="dashboard_payments.php" ><i class="fas fa-money-check-alt mr-3"></i>Payments Methods</a>
                </div>
            </div>
            <!-- End sidebar -->

            <div class="col-sm-10 rightbar">
               
                
                <br>
                <?php 
                    
                    if(in_array("Email Uploaded", $display_alert)){
                        echo "
                            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                <strong>Congratulations ! </strong> Logo Uploaded.
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                                </button>
                            </div>
                        "; 
                    }

                    if(in_array("Upload-Form-Error", $display_alert)){
                        echo "
                            <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                <strong>Error ! </strong> Please Check Your Upload Form.
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                                </button>
                            </div>
                        "; 
                    }
                    
                    if(in_array("Your about must be between 30 and 100 characters", $display_alert)){
                        echo "
                            <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                <strong>Error ! </strong> Your about must be between 30 and 100 characters.
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                                </button>
                            </div>
                        "; 
                    }
                   
                    //Uppdate //
                    /*
                    if(in_array("Update Your Logo", $display_alert)){
                        echo "
                            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                <strong >Update Your Logo</strong>
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                                </button>
                            </div>
                        "; 
                    }

                    if(in_array("Update Faild", $display_alert)){
                        echo "
                            <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                <strong> Update Faild</strong>
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                                </button>
                            </div>
                        "; 
                    }
                    */

                ?>
                <div class="card">
                    <br> 
                    <h4 class="card-t text-center"><i class="fas fa-cloud-upload-alt mr-3"></i>Upload Logo </h4>
                        <!-- Upload from -->
                        <div class="container">
                            <div class="row">
                                <div class="col-ms-12 col-sm-12">
                                    <hr>
                                    <form class="form" action="dashboard_Upload.php" method="POST" >
                                              
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
                

                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <br>
                                                <button class="btn btn-primary form-control" type="submit" name="logo_upload"><i class="fas fa-cloud-upload-alt mr-3"></i>Upload Logo</button>
                                            </div>
                                        </div>
                                            
                                    </form> <!-- Form Ending -->
                                </div><!-- col-sm-12 end -->
                            </div>
                        </div>
                        <!-- Upload form End -->

                </div><!-- Card end -->
            </div><!-- end rightbar -->
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

