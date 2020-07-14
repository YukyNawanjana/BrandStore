<?php


if(isset($_GET['delete'])){
    $id = $_GET['delete'];

    $query = mysqli_query($con, "DELETE FROM logo_details WHERE id=$id");

    $_SESSION['massage'] = "Recode has been deleted !";
    $_SESSION['msg_type'] = "danger";
    header("location: ../dashboard.php?logoDeleted");
}



?>