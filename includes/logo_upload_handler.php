<?php
if(isset( $_SESSION['designer_username'])){
$username =  $_SESSION['designer_username'];
}

$logo_name = "";
$logo_price = "";
$logo_description = "";
$logo_img = "";
$error_array = array(); //Holds error messages

if(isset($_POST['logo_upload'])){
    $username = $_POST['username'];

    $logo_name = strip_tags($_POST['logoname']); //Remover Html tags
    $logo_name = str_replace(' ','', $logo_name); //remove spaces
    $logo_name =ucfirst(strtolower($logo_name)); //Uppercase first letter
    $_SESSION['upload_logo_name'] = $logo_name; //Stores first name into session variable

    $logo_price = $_POST['logo_price'];
    $_SESSION['upload_logo_price'] =$logo_price;

    $logo_description = strip_tags($_POST['logoabout']); //Remove html tag
	$logo_description = ucfirst(strtolower($logo_description)); //Uppercase first letter
	$_SESSION['logo_about'] = $logo_description; //Stores email into session variable
    
    $logo_img = $_POST['logo_img'];

    if(strlen($logo_description) > 100 || strlen($logo_description) < 30){
        array_push($error_array, "Your about must be between 30 and 100 characters");

    }

    if(empty($error_array)){
        
     
        $query = mysqli_query($con, "INSERT INTO logo_details VALUES ('', '$username','$logo_name','$logo_description','$logo_price','$logo_img')");
        if($query === TRUE){
            array_push($error_array, "logo upladed");
            $_SESSION['upload_logo_name'] = "";
		    $_SESSION['upload_logo_price'] = "";
		    $_SESSION['logo_about'] = "";
        }else{
            array_push($error_array, "logo_upladed_Faild");
        }
        
       // array_push($error_array, "<span style='color: #14C800;'>You're all set! Go ahead and login!</><br>");


          //Clear session variables 
		
    }else{
        array_push($error_array, "logo_upladed_Faild");
    }


}


?>