<?php
session_start();
include __DIR__ . "/db.php";

$email = $_POST['email'];
$password = $_POST['password'];

// Step 1: Fetch admin by email only
$sql = "SELECT * FROM users WHERE email='$email' AND status=0 LIMIT 1";
$res = mysqli_query($conn, $sql);

if (mysqli_num_rows($res) == 1) {
    
    $row = mysqli_fetch_assoc($res);

    // Step 2: Verify hashed password
    if (password_verify($password, $row['password'])) {

        // Step 3: Set session
        $_SESSION['login'] = true;
        $_SESSION['userid'] = $row['id'];
        $_SESSION['role'] = "admin";
        $_SESSION['status'] = 0;

        header("Location: admin-dashboard.php");
        exit();
    }
    else {
        echo "<script>alert('Incorrect password'); window.location='admin-login.php';</script>";
        exit();
    }

} else {
    echo "<script>alert('Admin account not found'); window.location='admin-login.php';</script>";
    exit();
}
