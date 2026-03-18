<?php
session_start();
include "../db.php";

if($_SESSION['role'] != 'admin'){
    header("Location: ../index.php");
    exit();
}

// Filters
$district = $_GET['district'] ?? '';
$type = $_GET['type'] ?? '';

// Conditions
$where = "1";
if($district != ''){
    $where .= " AND district='$district'";
}
if($type != ''){
    $where .= " AND relief_type='$type'";
}

// Queries
$totalUsers = $conn->query("SELECT COUNT(*) AS total FROM users")->fetch_assoc()['total'];
$highSeverity = $conn->query("SELECT COUNT(*) AS total FROM requests WHERE severity='High'")->fetch_assoc()['total'];

$food = $conn->query("SELECT COUNT(*) AS total FROM requests WHERE relief_type='Food'")->fetch_assoc()['total'];
$water = $conn->query("SELECT COUNT(*) AS total FROM requests WHERE relief_type='Water'")->fetch_assoc()['total'];
$medicine = $conn->query("SELECT COUNT(*) AS total FROM requests WHERE relief_type='Medicine'")->fetch_assoc()['total'];
$shelter = $conn->query("SELECT COUNT(*) AS total FROM requests WHERE relief_type='Shelter'")->fetch_assoc()['total'];

// Filtered data
$filtered = $conn->query("SELECT * FROM requests WHERE $where");
?>

<!DOCTYPE html>
<html>
<head>
    <title>System Reports</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<div class="container">
<h2>System Summary Report</h2>

<ul>
    
    <li>Total Registered Users: <b><?php echo $totalUsers; ?></b></li>
    <li>High Severity Households: <b><?php echo $highSeverity; ?></b></li>
    <li>Food Requests: <b><?php echo $food; ?></b></li>
    <li>Water Requests: <b><?php echo $water; ?></b></li>
    <li>Medicine Requests: <b><?php echo $medicine; ?></b></li>
    <li>Shelter Requests: <b><?php echo $shelter; ?></b></li>
</ul>

<hr>

<h3>Filter Requests</h3>
<div class="filter">
<form method="GET">
    <input type="text" name="district" placeholder="District">
    <select name="type">
        <option value="">All Types</option>
        <option>Food</option>
        <option>Water</option>
        <option>Medicine</option>
        <option>Shelter</option>
    </select>
    <button type="submit">Apply Filter</button>
</form>
</div>

<table>
<tr>
    <th>Relief</th>
    <th>District</th>
    <th>Severity</th>
    <th>Contact</th>
    <th>Family Members</th>
    <th>Description</th>
</tr>

<?php while($row = $filtered->fetch_assoc()){ ?>
<tr>
    <td><?php echo $row['relief_type']; ?></td>
    <td><?php echo $row['district']; ?></td>
    <td><?php echo $row['severity']; ?></td>
    <td><?php echo $row['contact_number']; ?></td>
    <td><?php echo $row['family_members']; ?></td>
    <td><?php echo $row['description']; ?></td>
</tr>
<?php } ?>

</table>
<br><br>

<button class="back-btn" onclick="window.location.href='dashboard.php'">
    Back to Dashboard
</button>


</div>
<script src="../script.js"></script>
</body>
</html>
