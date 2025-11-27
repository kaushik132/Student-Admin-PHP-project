<?php
require_once "auth.php";
adminOnly();
include "db.php"; // database connection
?>
<?php include 'header.php'; ?>

<section id="manageStudents" class="container py-5">

  <!-- Student List Table -->
  <div class="card shadow-sm p-4">
    <h2 class="mb-4">Student List</h2>
    <div class="table-responsive">

      <?php
      // Fetch all students (status = 1)
      $sql = "SELECT id, name, email, course FROM users WHERE status = 1 ORDER BY id DESC";
      $result = mysqli_query($conn, $sql);
      ?>

      <table class="table table-hover align-middle">
        <thead class="table-light">
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Course</th>
            <th>Actions</th>
          </tr>
        </thead>

        <tbody>
          <?php
          if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
          ?>
          <tr>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td><?= htmlspecialchars($row['course']) ?></td>

            <td>
              <a href="edit-manage-students.php?id=<?= $row['id'] ?>">
                <button class="btn btn-sm btn-warning">Edit</button>
              </a>

              <a href="delete-student.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure?')">
                <button class="btn btn-sm btn-danger">Remove</button>
              </a>
            </td>
          </tr>
          <?php
              }
          } else {
              echo "<tr><td colspan='4' class='text-center'>No students found.</td></tr>";
          }
          ?>
        </tbody>
      </table>

    </div>
  </div>

</section>

<?php include 'footer.php'; ?>
