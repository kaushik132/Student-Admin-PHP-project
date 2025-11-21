<!-- header  -->
<?php include 'header.php'  ?>

<section id="addInternship" class="container py-5">
  <div class="card shadow-sm p-4 mx-auto" style="max-width: 600px;">
    <h2 class="mb-4 text-center">Add New Internship</h2>
    <form>
      <div class="mb-3">
        <label class="form-label">Company Name</label>
        <input type="text" class="form-control" placeholder="Enter company name">
      </div>
      <div class="mb-3">
        <label class="form-label">Position Title</label>
        <input type="text" class="form-control" placeholder="Enter position title">
      </div>
      <div class="mb-3">
        <label class="form-label">Location</label>
        <input type="text" class="form-control" placeholder="Enter internship location">
      </div>
      <div class="mb-3">
        <label class="form-label">Duration</label>
        <input type="text" class="form-control" placeholder="e.g., 3 months">
      </div>
      <div class="mb-3">
        <label class="form-label">Stipend</label>
        <input type="text" class="form-control" placeholder="e.g., $500/month">
      </div>
      <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea class="form-control" rows="4" placeholder="Enter internship details..."></textarea>
      </div>
      <button type="submit" class="btn btn-primary w-100">Add Internship</button>
    </form>
  </div>
</section>







<!-- footer  -->
<?php include 'footer.php'  ?>