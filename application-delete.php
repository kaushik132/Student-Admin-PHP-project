<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include 'db.php';  // DB connection

// ---------------- CHECK REQUEST ----------------
if (!isset($_GET['id'])) {
    die("Invalid request. ID missing.");
}

$deleteId = $_GET['id'];

// ---------------- DELETE RECORD ----------------
$sql = "DELETE FROM application WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $deleteId);

if ($stmt->execute()) {
    $_SESSION['success'] = "Application deleted successfully!";
    header("Location: application-list.php");
    exit();
} else {
    echo "Error deleting record: " . $conn->error;
}
?>
