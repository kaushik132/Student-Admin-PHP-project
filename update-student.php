<?php
require_once "auth.php";
adminOnly();
include "db.php";

// Check required values
if (!isset($_POST['id']) || !isset($_POST['name']) || !isset($_POST['email']) || !isset($_POST['course'])) {
    die("Missing form data.");
}

$id     = $_POST['id'];
$name   = mysqli_real_escape_string($conn, $_POST['name']);
$email  = mysqli_real_escape_string($conn, $_POST['email']);
$course = mysqli_real_escape_string($conn, $_POST['course']);

// Update query
$sql = "UPDATE users 
        SET name='$name', email='$email', course='$course'
        WHERE id=$id";

if (mysqli_query($conn, $sql)) {
    // Redirect back to manage page
    header("Location: manage-students.php?updated=1");
    exit;
} else {
    echo "Error updating student: " . mysqli_error($conn);
}
