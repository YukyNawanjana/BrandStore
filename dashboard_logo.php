<?php include 'dashboard_nav.php'; ?>

                <div class="nav flex-column nav-pills">
                    <a class="nav-link " href="dashboard.php" ><i class="fas fa-home mr-3"></i></i>Home</a>
                    <a class="nav-link active" href="dashboard_logo.php" ><i class="fas fa-pen-nib mr-3"></i>Your Logos</a>
                    <a class="nav-link " href="dashboard_upload.php" ><i class="fas fa-cloud-upload-alt mr-3"></i>Upload Logo</a>
                    <a class="nav-link " href="dashboard_payments.php" ><i class="fas fa-money-check-alt mr-3"></i>Payments Methods</a>
                </div>
            </div>
            <!-- End sidebar -->

            <div class="col-sm-10 rightbar">
                <br>
                <div class="card">

                <div class="container">
                       <br>
                        <h4 class="card-t text-center"><i class="fas fa-pen-nib mr-3"></i>Your Logos</h4>
                        <hr>
                        <?php 
                            
                           // $result = mysqli_query($con, "SELECT * FROM logo_details");
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
                                       // while($row = $result->fetch_assoc()): ?>
                                        <tr>
                                            <td class=""><img src="<?php //echo $row['logo_img']; ?>" style="height: 50px;" alt=""></td>
                                            <td class="text-center"><?php //echo $row['logo_name']; ?></td>
                                            <td  class="text-center"> $ <?php// echo $row['price']; ?></td>
                                            <td  class="text-center">
                                                <a href="dashboard.php?edit=<?php //echo $row['id']; ?>" class="btn btn-success"  data-toggle="modal" data-target="#exampleModal">edit</a>
                                                <a href="dashboard.php?delete=<?php //echo $row['id']; ?>"  class="btn btn-danger">delete</a>
                                            </td>
                                        </tr>
                                    <?php //endwhile ?>
                                </table>
                            </div>
                       </div>
                   
                </div>
        
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