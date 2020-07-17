<?php
require 'includes/config.php';
$userLoggedIn = $_SESSION['designer_email'];



if(isset($_GET['logo_id'])){
  $logo_id = $_GET['logo_id'];

  $logo_details = mysqli_query($con, "SELECT * FROM logo_details WHERE id=$logo_id");
  $result = mysqli_num_rows($logo_details);
  if($result > 0){
        $row = mysqli_fetch_array($logo_details);

        $logo_
  }
}else{
    header('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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

<div class="container">
    <br>
    <div class="row">
        <br>
        <div class="col-md-6 col-sm-6">
            <img src="./assets/images/logos/logo1.png" alt="..." class="img-thumbnail">
        </div>
        <div class="col-md-6 col-sm-6 text-center">
            <br>
            <h1>Logo Name</h1>
            <br>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae explicabo adipisci, aperiam molestiae distinctio, aliquam praesentium iure, quos vitae eveniet omnis neque magni ipsum blanditiis. Nemo, excepturi aspernatur. Officia, temporibus!</p>
            <h4 class="mb-3">$ price</h4>
            <button class="btn btn-primary btn-block mt-3">Buy Now</button>
          
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>