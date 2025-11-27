<?php
require_once "auth.php";
adminOnly();
include "db.php";

// --- GET STUDENT ID ---
$id = $_GET['id'];

// --- Fetch student ---
$sql = "SELECT * FROM users WHERE id=$id LIMIT 1";
$result = mysqli_query($conn, $sql);
$student = mysqli_fetch_assoc($result);
?>

<?php include 'header.php'; ?>

<section id="manageStudents" class="container py-5">

  <div class="card shadow-sm p-4 mb-5 mx-auto" style="max-width: 600px;">
    <h2 class="mb-4 text-center">Update Student</h2>

    <form action="update-student.php" method="POST">
      <input type="hidden" name="id" value="<?= $student['id']; ?>">

      <!-- Name -->
      <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" name="name" class="form-control"
               value="<?= $student['name']; ?>" required>
      </div>

      <!-- Email -->
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control"
               value="<?= $student['email']; ?>" required>
      </div>

      <!-- Course -->
      <div class="mb-3">
        <label class="form-label">Course</label>
        <input type="text" name="course" class="form-control"
               value="<?= $student['course']; ?>" required>
      </div>

      <button type="submit" class="btn btn-primary w-100">Update Student</button>
    </form>
  </div>

</section>

<?php include 'footer.php'; ?>
