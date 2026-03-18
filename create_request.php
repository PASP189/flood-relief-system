<?php
session_start();
include "../db.php";

if(!isset($_SESSION['user_id'])){
    header("Location: ../index.php");
    exit();
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $uid = $_SESSION['user_id'];

    $sql = "INSERT INTO requests 
    (user_id, relief_type, district, divisional_secretariat, gn_division,
     contact_name, contact_number, address, family_members, severity, description)
    VALUES (
    '$uid',
    '{$_POST['relief_type']}',
    '{$_POST['district']}',
    '{$_POST['ds']}',
    '{$_POST['gn']}',
    '{$_POST['contact_name']}',
    '{$_POST['contact_number']}',
    '{$_POST['address']}',
    '{$_POST['family_members']}',
    '{$_POST['severity']}',
    '{$_POST['description']}'
    )";

    if($conn->query($sql)){
        echo "<script>alert('Your relief request has been created successfully');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Request</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<div class="container">
<h2>Create Flood Relief Request</h2>

<form method="POST">
    <label>Type of Relief</label>
    <select name="relief_type" required>
        <option>Food</option>
        <option>Water</option>
        <option>Medicine</option>
        <option>Shelter</option>
    </select>

    <input type="text" name="district" placeholder="District" required>
    <input type="text" name="ds" placeholder="Divisional Secretariat" required>
    <input type="text" name="gn" placeholder="GN Division" required>

    <input type="text" name="contact_name" placeholder="Contact Person Name" required>
    <input type="text" name="contact_number" placeholder="Contact Number" required>
    <textarea name="address" placeholder="Address" required></textarea>

    <input type="number" name="family_members" placeholder="Number of Family Members" required>

    <label>Flood Severity</label>
    <select name="severity" required>
        <option>Low</option>
        <option>Medium</option>
        <option>High</option>
    </select>

    <textarea name="description" placeholder="Special Requirements"></textarea>

    <button type="submit">Submit Request</button>
</form>

<button class="back-btn" onclick="window.location.href='dashboard.php'">
     Back to Dashboard
</button>

</div>
<script src="../script.js"></script>
</body>
</html>
