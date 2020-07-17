<?php


$logo_name ="";
$logo_price ="";
$logo_description ="";
$display_alert = array();

if(isset($_POST['logo_upload'])){

    $username= $_POST['username'];
    $logo_name = strip_tags($_POST['logoname']); //Remover Html tags
    $logo_name = str_replace(' ','', $logo_name); //remove spaces
    $logo_name =ucfirst(strtolower($logo_name)); //Uppercase first letter
    $_SESSION['upload_logo_name'] = $logo_name; //Stores first name into session variable


    $logo_price = $_POST['logo_price'];
    $_SESSION['upload_logo_price'] = $logo_name;

    $logo_description = strip_tags($_POST['logoabout']); //Remove html tag
	$logo_description = ucfirst(strtolower($logo_description)); //Uppercase first letter
    $_SESSION['logo_about'] = $logo_description; //Stores email into session variable
    
    $logo_image = $_POST['logo_img'];

    if(strlen($logo_description) > 150 || strlen($logo_description) < 30){
        array_push($display_alert, "Your about must be between 30 and 100 characters");

    }

    if(empty($display_alert)){

        $query = mysqli_query($con,"INSERT INTO logo_details VALUES('','$username','$logo_name','$logo_description','$logo_price', '$logo_image')");
        if($query === TRUE){
            array_push($display_alert, "Email Uploaded");
            $_SESSION['upload_logo_name'] = "";
		    $_SESSION['upload_logo_price'] = "";
		    $_SESSION['logo_about'] = "";
           
        }else{
            echo "Error";
        }
    }else{
        array_push($display_alert, "Upload-Form-Error");
    }


}



//Update Logo
/*
if(isset($_POST['logo_update'])){

    $id = (int)($_POST['logo_id']);
    $logo_name = strip_tags($_POST['logoname']); //Remover Html tags
    $logo_name = str_replace(' ','', $logo_name); //remove spaces
    $logo_name =ucfirst(strtolower($logo_name)); //Uppercase first letter
    //$_SESSION['upload_logo_name'] = $logo_name; //Stores first name into session variable


    $logo_price = (int)($_POST['logo_price']);
    echo gettype($id);
    //$_SESSION['upload_logo_price'] = $logo_name;

    $logo_description = strip_tags($_POST['logoabout']); //Remove html tag
	$logo_description = ucfirst(strtolower($logo_description)); //Uppercase first letter
    $_SESSION['logo_about'] = $logo_description; //Stores email into session variable
    
    //$logo_image = $_POST['logo_img'];

    if(strlen($logo_description) > 150 || strlen($logo_description) < 30){
        array_push($display_alert, "Your about must be between 30 and 100 characters");

    }
   

    if(empty($display_alert)){

        $query = mysqli_query($con,"UPDATE logo_details SET logo_name='$logo_name', description='$logo_description' price='$logo_price' WHERE id=$id");
        if($query === TRUE){
            array_push($display_alert, "Update Your Logo");
           
        }else{
            echo "Error: " . $query . "<br>" . mysqli_error($con);
        }
    }else{
        array_push($display_alert, "Update Faild");
       
    }
}
*/
?>