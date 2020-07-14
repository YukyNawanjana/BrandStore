<?php

$error_array = array();

    if(isset($_POST['sign_in'])){ 

        $email = strip_tags($_POST['user_email']); //Remove html tags
        $email = str_replace(' ', '', $email); //remove spaces
        $email = ucfirst(strtolower($email)); //Uppercase first letter
        $_SESSION['reg_email'] = $email; //Stores email into session variable

        $password = strip_tags($_POST['user_password']); //Remove html tags
        $password = sha1($password);

        $check_database_query = mysqli_query($con,"SELECT * FROM users WHERE email='$email' AND password='$password'");
        $check_login_query = mysqli_num_rows($check_database_query);

        if($check_login_query == 1){
            $row = mysqli_fetch_array($check_database_query);
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            $user_role = $row['user_roles'];
           
            if($user_role == 'designer'){
                $_SESSION['user_name'] = $first_name." ". $last_name;
                $_SESSION['designer_email'] =  $row['email'];
                header('location: dashboard.php');
            }else{
                header('location: buyer.php');
            }
            exit();
        }else{
            array_push($error_array, "Email or password was incorrect");
        }

    }

?>