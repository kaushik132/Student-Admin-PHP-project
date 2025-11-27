<?php
require_once "auth.php";
adminOnly();

// ---------- DATABASE CONNECTION ----------
include "db.php";

// ---------- FORM SUBMIT ----------
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $company_name   = $_POST['company_name'];
    $position_title = $_POST['position_title'];
    $location       = $_POST['location'];
    $duration       = $_POST['duration'];
    $stipend        = $_POST['stipend'];
    $description    = $_POST['description'];
    $category       = $_POST['category'];
    $requirements   = $_POST['requirements'];
    $apply_by       = $_POST['apply_by'];

    $sql = "INSERT INTO internship 
            (company_name, position_title, location, duration, stipend, description, category, requirements, apply_by)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "sssssssss",
        $company_name,
        $position_title,
        $location,
        $duration,
        $stipend,
        $description,
        $category,
        $requirements,
        $apply_by
    );

    if ($stmt->execute()) {
        echo "<script>
                alert('Internship added successfully!');
                window.location.href = 'admin-add-internship.php';
              </script>";
    } else {
        echo "<script>
                alert('Error: Unable to add internship');
                window.location.href = 'admin-add-internship.php';
              </script>";
    }

    $stmt->close();
}

$conn->close();
?>
