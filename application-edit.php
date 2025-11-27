<?php
require_once "auth.php";
adminOnly();
?>
<?php include 'header.php'  ?>

<section id="edit-application" class="py-4">
  <div class="container">
    <div class="edit-card shadow-sm p-4">
      <h2 class="mb-3">Edit Application</h2>
      <form>
        <div class="mb-3">
          <label class="form-label">Full Name</label>
          <input type="text" class="form-control" value="Alice Johnson">
        </div>
        <div class="mb-3">
          <label class="form-label">Role</label>
          <input type="text" class="form-control" value="Frontend Developer">
        </div>
        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email" class="form-control" value="alice@mail.com">
        </div>
        <div class="mb-3">
          <label class="form-label">Status</label>
          <select class="form-control">
            <option selected>Under Review</option>
            <option>Shortlisted</option>
            <option>Interview Scheduled</option>
            <option>Rejected</option>
          </select>
        </div>
        <button class="btn btn-primary w-100 mt-2">Save Changes</button>
      </form>
    </div>
  </div>
</section>



<!-- footer  -->
<?php include 'footer.php'  ?>