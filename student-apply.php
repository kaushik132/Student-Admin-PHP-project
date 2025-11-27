<?php
require_once "auth.php";
studentOnly();
include "db.php";

// Check internship id
if (!isset($_GET['id'])) {
    die("Invalid internship");
}
$internship_id = intval($_GET['id']);
$user_id = $_SESSION['userid']; // assuming auth.php sets this

$message = "";

// Handle Form Submit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['name'];
    $email = $_POST['email'];

    // File upload
    $cv_file = "";
    if (isset($_FILES['cv']) && $_FILES['cv']['error'] == 0) {

        $ext = pathinfo($_FILES['cv']['name'], PATHINFO_EXTENSION);
        $cv_file = "uploads/cv_" . time() . "." . $ext;

        move_uploaded_file($_FILES['cv']['tmp_name'], $cv_file);
    }

    $sql = "INSERT INTO application (internship_id, user_id, name, email, cv, status)
            VALUES (?, ?, ?, ?, ?, 'pending')";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iisss", $internship_id, $user_id, $name, $email, $cv_file);

    if ($stmt->execute()) {
        $message = "<div class='alert alert-success'>Application submitted successfully!</div>";
    } else {
        $message = "<div class='alert alert-danger'>Error submitting application.</div>";
    }
}

include 'student-header.php';
?>

<section id="student-apply" class="py-5">
  <div class="container">
      <div class="apply-box shadow-sm p-4 mx-auto" style="max-width:500px;">

          <h2 class="mb-4 text-center">Internship Application</h2>

          <?= $message ?>

          <form method="POST" enctype="multipart/form-data">
              <div class="mb-3">
                  <label class="form-label">Full Name</label>
                  <input type="text" name="name" class="form-control" required>
              </div>

              <div class="mb-3">
                  <label class="form-label">Email</label>
                  <input type="email" name="email" class="form-control" required>
              </div>

              <div class="mb-3">
                  <label class="form-label">Upload Resume (PDF/DOC)</label>
                  <input type="file" name="cv" class="form-control" required>
              </div>

              <button class="btn btn-primary w-100 mt-2">Submit Application</button>
          </form>

      </div>
  </div>
</section>

<?php include 'footer.php'; ?>
