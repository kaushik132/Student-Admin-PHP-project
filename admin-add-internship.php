<?php
require_once "auth.php";
adminOnly();
?>
<?php include 'header.php'; ?>

<section id="addInternship" class="container py-5">
  <div class="card shadow-sm p-4 mx-auto" style="max-width: 700px;">
    <h2 class="mb-4 text-center">Add New Internship</h2>

    <form action="add-internship.php" method="POST">
      
      <!-- Company Name -->
      <div class="mb-3">
        <label class="form-label">Company Name</label>
        <input type="text" name="company_name" class="form-control" required>
      </div>

      <!-- Position Title -->
      <div class="mb-3">
        <label class="form-label">Position Title</label>
        <input type="text" name="position_title" class="form-control" required>
      </div>

      <!-- Location -->
      <div class="mb-3">
        <label class="form-label">Location</label>
        <input type="text" name="location" class="form-control" required>
      </div>

      <!-- Duration -->
      <div class="mb-3">
        <label class="form-label">Duration</label>
        <input type="text" name="duration" class="form-control" placeholder="e.g., 3 months" required>
      </div>

      <!-- Stipend -->
      <div class="mb-3">
        <label class="form-label">Stipend</label>
        <input type="text" name="stipend" class="form-control" placeholder="e.g., $500/month">
      </div>

      <!-- Description -->
      <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control" rows="4" required></textarea>
      </div>

      <!-- Category -->
      <div class="mb-3">
        <label class="form-label">Category</label>
        <input type="text" name="category" class="form-control" placeholder="e.g., Marketing, IT, Design" required>
      </div>

      <!-- Requirements -->
      <div class="mb-3">
        <label class="form-label">Requirements</label>
        <textarea name="requirements" class="form-control" rows="3" placeholder="Skills or qualifications required"></textarea>
      </div>

      <!-- Apply By -->
      <div class="mb-3">
        <label class="form-label">Apply By</label>
        <input type="date" name="apply_by" class="form-control" required>
      </div>

      <button type="submit" class="btn btn-primary w-100">Add Internship</button>
    </form>

  </div>
</section>

<?php include 'footer.php'; ?>
