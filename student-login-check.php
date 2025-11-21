<?php
session_start();
include __DIR__ . "/db.php";

$email = $_POST['email'];
$password = $_POST['password'];

// Step 1: Fetch only student accounts (status = 1)
$sql = "SELECT * FROM users WHERE email='$email' AND status=1 LIMIT 1";
$res = mysqli_query($conn, $sql);

if (mysqli_num_rows($res) == 1) {

    $row = mysqli_fetch_assoc($res);

    // Step 2: Verify hashed password
    if (password_verify($password, $row['password'])) {

        // Step 3: Set sessions
        $_SESSION['login'] = true;
        $_SESSION['userid'] = $row['id'];
        $_SESSION['role'] = "student";
        $_SESSION['status'] = 1;

        header("Location: student-dashboard.php");
        exit();
    }
    else {
        echo "<script>alert('Incorrect password'); window.location='student-login.php';</script>";
        exit();
    }

} else {
    echo "<script>alert('Student account not found'); window.location='student-login.php';</script>";
    exit();
}
?>
