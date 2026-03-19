<?php
session_start();
include "../db.php";

if(!isset($_SESSION['user_id'])){
    header("Location: ../index.php");
    exit();
}

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM requests WHERE id='$id'");
$row = $result->fetch_assoc();

if(isset($_POST['update'])){
    $relief = $_POST['relief_type'];
    $district = $_POST['district'];
    $severity = $_POST['severity'];
    $family = $_POST['family_members'];
    $desc = $_POST['description'];

    $conn->query("UPDATE requests SET 
        relief_type='$relief',
        district='$district',
        severity='$severity',
        family_members='$family',
        description='$desc'
        WHERE id='$id'");

    header("Location: view_request.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Request</title>
<link rel="stylesheet" href="../style.css">
</head>

<body>

<div class="container">

<h2>Edit Relief Request</h2>

<form method="POST">

<label>Relief Type</label>
<input type="text" name="relief_type" value="<?php echo $row['relief_type']; ?>">

<label>District</label>
<input type="text" name="district" value="<?php echo $row['district']; ?>">

<label>Severity</label>
<select name="severity">
<option <?php if($row['severity']=="Low") echo "selected"; ?>>Low</option>
<option <?php if($row['severity']=="Medium") echo "selected"; ?>>Medium</option>
<option <?php if($row['severity']=="High") echo "selected"; ?>>High</option>
</select>

<label>Family Members</label>
<input type="number" name="family_members" value="<?php echo $row['family_members']; ?>">

<label>Description</label>
<textarea name="description"><?php echo $row['description']; ?></textarea>

<br>

<button type="submit" name="update">Update Request</button>

</form>

<br>
<button class="back-btn" onclick="window.location.href='view_request.php'"> Back</button>


</div>
<script src="../script.js"></script>
</body>
</html>