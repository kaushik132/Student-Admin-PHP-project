<?php
require_once "auth.php";
adminOnly();

// DB Connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web_application_development_cheryala_hrishikesh";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {

    $id = intval($_GET['id']);

    $sql = "DELETE FROM internship WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>
                alert('Internship deleted successfully!');
                window.location.href = 'admin-internships.php';
              </script>";
    } else {
        echo "<script>
                alert('Error deleting internship!');
                window.location.href = 'admin-internships.php';
              </script>";
    }

    $stmt->close();
}

$conn->close();
?>
