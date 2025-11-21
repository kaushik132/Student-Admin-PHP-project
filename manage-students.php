<!-- header  -->
<?php include 'header.php'  ?>
<section id="manageStudents" class="container py-5">

  <!-- Add New Student Form -->
  <div class="card shadow-sm p-4 mb-5 mx-auto" style="max-width: 600px;">
    <h2 class="mb-4 text-center">Add New Student</h2>
    <form>
      <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" class="form-control" placeholder="Enter student name">
      </div>
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" placeholder="Enter student email">
      </div>
      <div class="mb-3">
        <label class="form-label">Course</label>
        <input type="text" class="form-control" placeholder="Enter course name">
      </div>
      <button type="submit" class="btn btn-primary w-100">Add Student</button>
    </form>
  </div>

  <!-- Student List Table -->
  <div class="card shadow-sm p-4">
    <h2 class="mb-4">Student List</h2>
    <div class="table-responsive">
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
          @foreach($allstudent as $all)
  
          <tr>
            
            <td>Alice Johnson</td>
            <td>alice@example.com</td>
            <td>Computer Science</td>
            <td>
              <button class="btn btn-sm btn-warning">Edit</button>
              <button class="btn btn-sm btn-danger">Remove</button>
            </td>
          </tr>
          @endforeach
          <tr>
            <td>Bob Smith</td>
            <td>bob@example.com</td>
            <td>Marketing</td>
            <td>
              <button class="btn btn-sm btn-warning">Edit</button>
              <button class="btn btn-sm btn-danger">Remove</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

</section>




<!-- footer  -->
<?php include 'footer.php'  ?>