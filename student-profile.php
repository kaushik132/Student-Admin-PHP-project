<!-- header  -->
<?php include 'student-header.php'  ?>


<section id="myProfile" class="py-5" style="background-color: #f0f8ff1a;">
  <div class="container">
    <div class="card shadow-sm p-4 mx-auto" style="max-width: 900px;">
      <h2 class="mb-4 text-center">My Profile</h2>

      <form>
        <!-- Profile Picture -->
        <div class="mb-3 text-center">
          <label class="form-label d-block">Profile Picture</label>
          <input type="file" class="form-control-file">
        </div>

        <div class="row g-3">
          <!-- First Name -->
          <div class="col-md-6">
            <label class="form-label">First Name</label>
            <input type="text" class="form-control" placeholder="Enter first name">
          </div>
          <!-- Last Name -->
          <div class="col-md-6">
            <label class="form-label">Last Name</label>
            <input type="text" class="form-control" placeholder="Enter last name">
          </div>
        </div>

        <!-- Email -->
        <div class="mb-3 mt-3">
          <label class="form-label">Email</label>
          <input type="email" class="form-control" placeholder="Enter email">
        </div>

        <!-- Mobile Number -->
        <div class="mb-3">
          <label class="form-label">Mobile Number</label>
          <input type="text" class="form-control" placeholder="Enter mobile number">
        </div>

        <!-- Admin ID -->
        <div class="mb-3">
          <label class="form-label">Admin ID</label>
          <input type="text" class="form-control" placeholder="Enter Admin ID">
        </div>

        <!-- Post Code -->
        <div class="mb-3">
          <label class="form-label">Post Code</label>
          <input type="text" class="form-control" placeholder="Enter post code">
        </div>

        <!-- Address -->
        <div class="mb-3">
          <label class="form-label">Address</label>
          <textarea class="form-control" rows="2" placeholder="Enter address"></textarea>
        </div>

        <!-- Rank -->
        <div class="mb-3">
          <label class="form-label">Rank</label>
          <input type="text" class="form-control" placeholder="Enter rank">
        </div>

        <!-- Add CV -->
        <div class="mb-3">
          <label class="form-label d-block">Add CV</label>
          <input type="file" class="form-control-file">
        </div>

        <!-- Add Cover Letter -->
        <div class="mb-3">
          <label class="form-label d-block">Add Cover Letter</label>
          <input type="file" class="form-control-file">
        </div>

        <button type="submit" class="btn btn-primary w-100 mt-3">Update Profile</button>
      </form>
    </div>
  </div>
</section>





<!-- footer  -->
<?php include 'footer.php'  ?>