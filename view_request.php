<?php
session_start();
include "../db.php";

if(!isset($_SESSION['user_id'])){
    header("Location: ../index.php");
    exit();
}

$uid = $_SESSION['user_id'];
$result = $conn->query("SELECT * FROM requests WHERE user_id='$uid'");
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Requests</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<div class="container">
<h2>My Relief Requests</h2>



<table>
<tr>
    <th>Relief</th>
    <th>District</th>
    <th>Severity</th> 
    
    <th>Family Members</th>
    <th>Description</th>
    <th>Actions</th>
   
</tr>

<?php while($row = $result->fetch_assoc()){ ?>
<tr>
    <td><?php echo $row['relief_type']; ?></td>
    <td><?php echo $row['district']; ?></td>
    <td><?php echo $row['severity']; ?></td>
    <td><?php echo $row['family_members']; ?></td>
    <td><?php echo $row['description']; ?></td>
    <td>

    <div class="dashboard-cards-ed"><br>
     

    <button class="card" onclick="window.location.href='edit_request.php?id=<?php echo $row['id']; ?>'">Edit</button>
    <button class="card" onclick="window.location.href='delet_request.php?id=<?php echo $row['id']; ?>'">Delete</button>

          
</div>
    </td>
</tr>
<?php } ?>

</table>
<br>
<br>

<button class="back-btn" onclick="window.location.href='dashboard.php'">
    Back to Dashboard
</button>

</div>
<script src="../script.js"></script>
</body>
</html>
