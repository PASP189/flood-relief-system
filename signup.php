<?php

include 'db.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO users (name,email,password) VALUES ('$name','$email','$password')";
    if($conn->query($sql)){
        echo "<script>alert('Registration successful!');window.location='index.php';</script>";
    } else {
        echo "<script>alert('Error: ".$conn->error."');</script>";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Sign Up</title>
</head>
<body>
<div class="login-container">
    <div class=>
    <h2>Sign Up</h2>
    <form method="POST">
        <input type="text" name="name" placeholder="Full Name" required><br><br>
        <input type="email" name="email" placeholder="Email" required><br><br>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <button type="submit">Register</button>
    </form>
 <p style="text-align:center; margin-top:15px;">
            Already have an account?
            <a href="index.php">Login</a>
        </p>

</div>
<script src="script.js"></script>
</body>
</html>
