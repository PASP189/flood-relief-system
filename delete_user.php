<?php
session_start();
include "../db.php";

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
    header("Location: ../index.php");
    exit();
}

if(isset($_GET['id'])){
    $id = $_GET['id'];

    // delete related data first
    $conn->query("DELETE FROM requests WHERE user_id='$id'");

    // delete user
    $stmt = $conn->prepare("DELETE FROM users WHERE id=?");
    $stmt->bind_param("i", $id);

    if($stmt->execute()){
        echo "<script>
        alert('User deleted successfully');
        window.location='view_users.php';
        </script>";
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "Invalid request";
}
?>
