<?php

//Declaring variables to prevent errors
$username = ""; //user name
$company = ""; //company name
$birthday = ""; //Birthday
$about = ""; //about
$address = ""; //address
$address2 = ""; //address 2
$city = ""; //city
$country = "";
$zip = "";
$error_array = array(); //Holds error messages


if(isset($_POST['submit'])){
    $email = $_SESSION['designer_email'];

    $username = strip_tags($_POST['user_name']); //Remover Html tags
    $username = str_replace(' ','', $username); //remove spaces
    $username =ucfirst(strtolower($username)); //Uppercase first letter
    $_SESSION['designer_username'] = $username; //Stores first name into session variable
    
    $company = strip_tags($_POST['company']); //Remover Html tags
    $company =ucfirst(strtolower($company)); //Uppercase first letter
    $_SESSION['designer_company'] = $company; //Stores first name into session variable

    $birthday = $_POST['birthday'];
    $_SESSION['designer_birthday'] = $birthday;

	$about = strip_tags($_POST['about']); //Remove html tag
	$about = ucfirst(strtolower($about)); //Uppercase first letter
	$_SESSION['designer_about'] = $about; //Stores email into session variable

    $address = strip_tags($_POST['address']);
    $_SESSION['designer_address'] = $address;

    $address2 = strip_tags($_POST['address2']);
    $_SESSION['designer_address2'] = $address2;

    $city = strip_tags($_POST['city']); //Remover Html tags
    $city = str_replace(' ','', $city); //remove spaces
    $city =ucfirst(strtolower($city)); //Uppercase first letter
    $_SESSION['designer_city'] = $city; //Stores first name into session variable

    $country = strip_tags($_POST['country']); //Remover Html tags
    $country = str_replace(' ','', $country); //remove spaces
    $country =ucfirst(strtolower($country)); //Uppercase first letter
    $_SESSION['designer_country'] = $country; //Stores first name into session variable

    $zip = strip_tags($_POST['zipcode']); //Remover Html tags
    $zip = str_replace(' ','', $zip); //remove spaces
    $zip =ucfirst(strtolower($zip)); //Uppercase first letter
    $_SESSION['designer_zip'] = $zip; //Stores first name into session variable

    //Check if username already exists 
    $username_check = mysqli_query($con, "SELECT * FROM designer WHERE username='$username'");
    $num_rows = mysqli_num_rows($username_check);
    if($num_rows > 0){
        array_push($error_array, "username already in use");
       
    }

    if(strlen($about) > 150 || strlen($about) < 30){
        array_push($error_array, "Your about must be between 30 and 100 characters");

    }
    
    if(empty($error_array)){
        echo $username;
        echo $company;
        echo $birthday;
        echo $about;
        echo $address;
        echo $address2;
        echo $city;
        echo $country;
        echo $zip;

        $query = mysqli_query($con, "INSERT INTO designer VALUES('','$email', '$username', '$company','$birthday','$about','$address','$address2','$city','$country','$zip')");
        if($query === TRUE){
            header('location: dashboard.php?LoginSucess');
            $_SESSION['designer_email'];
        }else{
            echo "Error :". $query ." : " . mysqli_error($con); 
        }

    

          //Clear session variables 
		$_SESSION['designer_username'] = "";
		$_SESSION['designer_company'] = "";
		$_SESSION['designer_birthday'] = "";
        $_SESSION['designer_about'] = "";
		$_SESSION['designer_address'] = "";
		$_SESSION['designer_address2'] = "";
		$_SESSION['designer_city'] = "";
        $_SESSION['designer_country'] = "";
        $_SESSION['designer_zip'] = "";
    }
}


?>