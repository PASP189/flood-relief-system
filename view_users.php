<?php
session_start();
include "../db.php";

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
    header("Location: ../index.php");
    exit();
}

$result = $conn->query("SELECT * FROM users");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registered Users</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<div class="container">
<h2>Registered Users</h2>

<table border="1">
<tr>
    <th>Name</th>
    <th>Email</th>
    <th>Role</th>
    <th>Action</th>
</tr>

<?php while($row = $result->fetch_assoc()){ ?>
<tr>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['email']; ?></td>
    <td><?php echo $row['role']; ?></td>
    <td>
         <div class="dashboard-cards-ed"><br>
        <?php if($row['role'] != 'admin'){ ?>

        
            <button class="card delete-btn" onclick="deleteUser(<?php echo $row['id']; ?>)">Delete</button>
        </div>
        <?php } ?>
    </td>
</tr>
<?php } ?>

</table>
<br><br>

<button onclick="window.location.href='dashboard.php'">
     Back to Dashboard
</button>

</div>

<script>
function deleteUser(id){
    if(confirm("Are you sure you want to delete this user?")){
        window.location.href = "delete_user.php?id=" + id;
    }
}
</script>
<script src="../script.js"></script>
</body>
</html>