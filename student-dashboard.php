<?php
require_once "auth.php";
studentOnly();
include "db.php";

// Logged in student ID
$userid = $_SESSION['userid'];

// Fetch student info
$userQuery = "SELECT * FROM users WHERE id = $userid LIMIT 1";
$userResult = mysqli_query($conn, $userQuery);
$user = mysqli_fetch_assoc($userResult);

// STUDENT COURSE
$student_course = $user['course'];

// ====================== My Applications =======================

$appQuery = "
    SELECT a.*, i.company_name, i.position_title, i.location, i.category, i.apply_by
    FROM application a
    JOIN internship i ON a.internship_id = i.id
    WHERE a.user_id = $userid
    ORDER BY a.id DESC
";
$appResult = mysqli_query($conn, $appQuery);


// ====================== Recommended Internships =======================
// Only those internships where category == student course

$recQuery = "
    SELECT * FROM internship 
    WHERE category = '$student_course'
    ORDER BY id DESC
";
$recResult = mysqli_query($conn, $recQuery);

?>

<?php include 'student-header.php'; ?>

<section id="studentDashboard" class="py-5" style="background-color: #f0f8ff1a;">
  <div class="container">

    <!-- ================= My Applications ================= -->
    <h2 class="mb-4">My Applications</h2>
    <div class="row g-4">

      <?php if (mysqli_num_rows($appResult) > 0): ?>
          <?php while ($app = mysqli_fetch_assoc($appResult)): ?>
            <div class="col-md-6 col-lg-4">
              <div class="card shadow-sm p-3 h-100 application-card">

                <h5><?php echo $app['position_title']; ?></h5>
                <p><strong>Company:</strong> <?php echo $app['company_name']; ?></p>
                <p><strong>Location:</strong> <?php echo $app['location']; ?></p>
                <p><strong>Category:</strong> <?php echo $app['category']; ?></p>

                <p>Status: <strong><?php echo $app['status']; ?></strong></p>
                <p>Applied on: <?php echo date("Y-m-d", strtotime($app['created_at'])); ?></p>

              </div>
            </div>
          <?php endwhile; ?>
      <?php else: ?>
          <p>No applications found.</p>
      <?php endif; ?>

    </div>



    <!-- ================= Recommended Internships ================= -->
    <h2 class="mt-5 mb-4">Recommended Internships</h2>
    <div class="row g-4">

    <?php if (mysqli_num_rows($recResult) > 0): ?>
        <?php while ($rec = mysqli_fetch_assoc($recResult)): ?>

        <div class="col-md-6 col-lg-4">
          <div class="card shadow-sm p-3 h-100 recommended-card">

            <h5><?php echo $rec['position_title']; ?></h5>
            <p><strong>Company:</strong> <?php echo $rec['company_name']; ?></p>
            <p><strong>Location:</strong> <?php echo $rec['location']; ?></p>
            <p><strong>Category:</strong> <?php echo $rec['category']; ?></p>
            <p><strong>Apply By:</strong> <?php echo $rec['apply_by']; ?></p>

            <a href="student-apply.php?id=<?php echo $rec['id']; ?>" 
               class="btn btn-primary w-100 mt-2">
               Apply Now
            </a>

          </div>
        </div>

        <?php endwhile; ?>
    <?php else: ?>
        <p>No recommended internships found.</p>
    <?php endif; ?>

    </div>

  </div>
</section>

<?php include 'footer.php'; ?>
