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

// Fetch all internships
$sql = "SELECT * FROM internship ORDER BY id DESC";
$result = $conn->query($sql);
?>

<?php include 'header.php'; ?>

<section id="internshipListings" class="py-5">
  <div class="container">
    <h2 class="mb-4 text-center">Internship Listings</h2>
    <div class="row g-4 justify-content-center">

      <?php if ($result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>

          <div class="col-md-6 col-lg-3">
            <div class="card shadow-sm p-3 h-100">
              
              <h5 class="card-title"><?php echo htmlspecialchars($row['position_title']); ?></h5>

              <p class="mb-1"><strong>Company:</strong> 
                <?php echo htmlspecialchars($row['company_name']); ?>
              </p>

              <p class="mb-1"><strong>Category:</strong> 
                <?php echo htmlspecialchars($row['category']); ?>
              </p>

              <p class="mb-1"><strong>Location:</strong> 
                <?php echo htmlspecialchars($row['location']); ?>
              </p>

              <p class="mb-1"><strong>Duration:</strong> 
                <?php echo htmlspecialchars($row['duration']); ?>
              </p>

              <p class="mb-1"><strong>Stipend:</strong> 
                <?php echo htmlspecialchars($row['stipend']); ?>
              </p>

              <p class="mb-1"><strong>Description:</strong><br>
                <?php echo nl2br(htmlspecialchars($row['description'])); ?>
              </p>

              <p class="mb-1"><strong>Requirements:</strong><br>
                <?php echo nl2br(htmlspecialchars($row['requirements'])); ?>
              </p>

              <p class="mb-1"><strong>Apply by:</strong> 
                <?php echo htmlspecialchars($row['apply_by']); ?>
              </p>

                   <!-- DELETE BUTTON -->
              <a 
                href="delete-internship.php?id=<?php echo $row['id']; ?>" 
                class="btn btn-danger btn-sm mt-2 w-100"
                onclick="return confirm('Are you sure you want to delete this internship?');"
              >
                Delete Internship
              </a>

            </div>
          </div>

        <?php endwhile; ?>
      <?php else: ?>

        <p class="text-center">No internships available.</p>

      <?php endif; ?>

    </div>
  </div>
</section>

<?php include 'footer.php'; ?>

<?php $conn->close(); ?>
