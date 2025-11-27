<?php
require_once "auth.php";
adminOnly();
include "db.php"; // DB connection

// Check if ID exists
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Invalid request.");
}

$id = intval($_GET['id']); // secure integer

// Delete student
$sql = "DELETE FROM users WHERE id = ? AND status = 1"; // Delete only students (status=1)
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "<script>alert('Student deleted successfully!'); window.location='manage-students.php';</script>";
} else {
    echo "<script>alert('Error deleting student!'); window.location='manage-students.php';</script>";
}

$stmt->close();
$conn->close();
?>
