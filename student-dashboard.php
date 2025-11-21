<?php
require_once "auth.php";
studentOnly();
?>

<?php include 'student-header.php'  ?>

<section id="studentDashboard" class="py-5" style="background-color: #f0f8ff1a;">
  <div class="container">

    <!-- My Applications -->
    <h2 class="mb-4">My Applications</h2>
    <div class="row g-4">
      <div class="col-md-6 col-lg-4">
        <div class="card shadow-sm p-3 h-100 application-card">
          <h5>Frontend Web Developer</h5>
          <p>Status: <strong>Under Review</strong></p>
          <p>Applied on: 2025-10-25</p>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="card shadow-sm p-3 h-100 application-card">
          <h5>Marketing Intern</h5>
          <p>Status: <strong>Submitted</strong></p>
          <p>Applied on: 2025-11-02</p>
        </div>
      </div>
    </div>

    <!-- Recommended Internships -->
    <h2 class="mt-5 mb-4">Recommended Internships</h2>
    <div class="row g-4">
      <div class="col-md-6 col-lg-4">
        <div class="card shadow-sm p-3 h-100 recommended-card">
          <h5>React Developer Intern</h5>
          <p>Category: Software</p>
          <p>Deadline: 2025-11-20</p>
         <a href="student-apply.php" class="btn btn-primary w-100 mt-2">Apply Now</a>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="card shadow-sm p-3 h-100 recommended-card">
          <h5>Graphic Design Intern</h5>
          <p>Category: Design</p>
          <p>Deadline: 2025-12-01</p>
         <a href="student-apply.php" class="btn btn-primary w-100 mt-2">Apply Now</a>
        </div>
      </div>
    </div>

  </div>
</section>






<!-- footer  -->
<?php include 'footer.php'  ?>