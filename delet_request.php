<?php
session_start();
include "../db.php";

// Check if user logged in
if(!isset($_SESSION['user_id'])){
    header("Location: ../index.php");
    exit();
}

// Check if ID is provided
if(isset($_GET['id'])){

    $id = intval($_GET['id']); // make sure id is number
    $user_id = $_SESSION['user_id'];

    // Delete only the user's request
    $sql = "DELETE FROM requests WHERE id='$id' ";

    if(mysqli_query($conn, $sql)){
        echo "<script>
                alert('Relief request deleted successfully');
                window.location='view_request.php';
              </script>";
    }else{
        echo "<script>
                alert('Delete failed');
                window.location='view_request.php';
              </script>";
    }

}else{
    header("Location: view_request.php");
}
?>