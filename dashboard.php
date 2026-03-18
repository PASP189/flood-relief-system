<?php

session_start();
if(!isset($_SESSION['user_id']) || $_SESSION['role'] != 'user'){
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="background">
        <img src="flood-relief-donation.jpg.jpeg" 
             alt="flood relief" 
             class="b_img">
             <div class="styling"></div> 
</div>

<div class="dashboard-container">
     <h1>Rebuild Hope. Restore Lives.</h1>
    <h2><p class="welcome">Welcome <?php echo $_SESSION['name']; ?></p></h2><br>

    <div class="dashboard-cards"><br>

    <button class="card" onclick="window.location.href='create_request.php'">Create Relief Request</button>

    <button class="card" onclick="window.location.href='view_request.php'"> View My Requests</button>

    <button class="card" onclick="window.location.href='../logout.php'">Logout </button>

    </div>
</div>
<script src="../script.js"></script>
</body>
</html>