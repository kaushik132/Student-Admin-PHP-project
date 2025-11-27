<?php
require_once "auth.php";
studentOnly();

include 'db.php';  // Database connection file
?>
<?php include 'student-header.php'; ?>

<section id="internshipListings" class="py-5">
  <div class="container">
    <h2 class="mb-4 text-center">Internship Listings</h2>
    <div class="row g-4 justify-content-center">

      <?php
      // Fetch all internships
      $sql = "SELECT * FROM internship ORDER BY id DESC";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
      ?>
          <div class="col-md-6 col-lg-3">
            <div class="card shadow-sm p-3 h-100">
              <h5 class="card-title"><?php echo $row['position_title']; ?></h5>

              <p class="mb-1"><strong>Company:</strong> <?php echo $row['company_name']; ?></p>
              <p class="mb-1"><strong>Category:</strong> <?php echo $row['category']; ?></p>
              <p class="mb-1"><strong>Location:</strong> <?php echo $row['location']; ?></p>
              <p class="mb-1"><strong>Duration:</strong> <?php echo $row['duration']; ?></p>
              <p class="mb-1"><strong>Stipend:</strong> <?php echo $row['stipend']; ?></p>

              <p class="mb-1"><?php echo $row['description']; ?></p>

              <p class="mb-1"><strong>Requirements:</strong> <?php echo $row['requirements']; ?></p>
              <p class="mb-1"><strong>Apply by:</strong> <?php echo $row['apply_by']; ?></p>

              <a href="student-apply.php?id=<?php echo $row['id']; ?>">
                <button class="btn btn-primary w-100 mt-2">Apply Now</button>
              </a>
            </div>
          </div>

      <?php
        }
      } else {
        echo "<p class='text-center'>No internships available right now.</p>";
      }
      ?>

    </div>
  </div>
</section>

<?php include 'footer.php'; ?>
