<?php

//Declaring variables to prevent errors
$fname = ""; //First name
$lname = ""; //Last name
$email = ""; //email
$mobile = ""; //Phone Number
$password = ""; //password
$password2 = ""; //password 2
$error_array = array(); //Holds error messages


    if(isset($_POST['sign_up'])){
        
    $fname = strip_tags($_POST['first_name']); //Remover Html tags
    $fname = str_replace(' ','', $fname); //remove spaces
    $fname =ucfirst(strtolower($fname)); //Uppercase first letter
    $_SESSION['reg_fname'] = $fname; //Stores first name into session variable
    
    $lname = strip_tags($_POST['last_name']); //Remover Html tags
    $lname = str_replace(' ','', $lname); //remove spaces
    $lname =ucfirst(strtolower($lname)); //Uppercase first letter
    $_SESSION['reg_lname'] = $lname; //Stores first name into session variable

	$email = strip_tags($_POST['email']); //Remove html tags
	$email = str_replace(' ', '', $email); //remove spaces
	$email = ucfirst(strtolower($email)); //Uppercase first letter
	$_SESSION['reg_email'] = $email; //Stores email into session variable

    $mobile = strip_tags($_POST['mobile']);
    $mobile = str_replace(' ','', $mobile);
    $_SESSION['reg_mobile'] = $mobile;

    $user_roles = $_POST['user_roles'];

    //Password
	$password = strip_tags($_POST['password']); //Remove html tags
	$password2 = strip_tags($_POST['password2']); //Remove html tags

    //Check if email already exists 
    $email_check = mysqli_query($con, "SELECT * FROM users WHERE email='$email'");
    $num_rows = mysqli_num_rows($email_check);
    if($num_rows > 0){
        array_push($error_array, "Email already in use<br>");
    }

    if(strlen($fname) > 25 || strlen($fname) < 2){
        array_push($error_array, "Your first name must be between 2 and 25 characters<br>");
    }
    
    if(strlen($lname) > 25 || strlen($lname) < 2){
        array_push($error_array, "Your last name must be between 2 and 25 characters<br>");
    }
    
    if($password != $password2 ){
        array_push($error_array, "Your passwords do not match<br>");
    }

    if(strlen($password) > 30 || strlen($password) <= 8){
        array_push($error_array, "Your password must be betwen 5 and 30 characters<br>");
    }

    if(empty($error_array)){
        $password = sha1 ($password); //Encrypt password 

        //Profile Picture assignment
        $rand = rand(1,5); //Random number Genarator

        if($rand == 1){ 
            $profile_pic = "assets/images/profile_pic/1.png";

        }else if($rand == 2){
            $profile_pic = "assets/images/profile_pic/2.png";

        }else if($rand == 3){
            $profile_pic = "assets/images/profile_pic/3.png";

        }else if($rand == 4){
            $profile_pic = "assets/images/profile_pic/4.png";
        }else{
            $profile_pic = "assets/images/profile_pic/5.png";
        }

        $query = mysqli_query($con, "INSERT INTO users VALUES ('','$fname','$lname','$email', '$mobile', '$user_roles','$password', '$profile_pic')");

        array_push($error_array, "<span style='color: #14C800;'>You're all set! Go ahead and login!</span><br>");
        if($user_roles == 'designer'){
            header('location: designer_from.php');
            $_SESSION['designer_email'] = $email;
            $_SESSION['designer_name'] = $fname;
        }else{
            header('location: buyer.php');
        }

        //Clear session variables 
		$_SESSION['reg_fname'] = "";
		$_SESSION['reg_lname'] = "";
		$_SESSION['reg_email'] = "";
		$_SESSION['reg_email2'] = "";
        
    }

    }


?>