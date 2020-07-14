<?php

session_start();

$con = mysqli_connect('localhost','root','','login_system');

if(mysqli_connect_errno($con)){
    echo "Failed to connect: " . mysqli_connect_errno();
}
?>