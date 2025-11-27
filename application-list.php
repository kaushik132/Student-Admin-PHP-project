<?php
require_once "auth.php";
adminOnly();
?>
<?php include 'header.php'  ?>


<section id="applications" class="py-4">
    <div class="container">
        <h2 class="mb-4">Applications</h2>
        <div class="table-responsive">
            <table class="table table-bordered align-middle application-table">
                <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Email</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Alice Johnson</td>
                        <td>Frontend Developer</td>
                        <td>alice@mail.com</td>
                        <td class="text-center">
                            <a href="application-edit.php">
                                <button class="btn btn-sm btn-warning me-2">Edit</button>
                            </a> <button class="btn btn-sm btn-danger">Remove</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Rahul Kumar</td>
                        <td>UI/UX Designer</td>
                        <td>rahul@mail.com</td>
                        <td class="text-center">
                            <a href="application-edit.php">
                                <button class="btn btn-sm btn-warning me-2">Edit</button>
                            </a> <button class="btn btn-sm btn-danger">Remove</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Maria Smith</td>
                        <td>Marketing Intern</td>
                        <td>maria@mail.com</td>
                        <td class="text-center">
                            <a href="application-edit.php">
                                <button class="btn btn-sm btn-warning me-2">Edit</button>
                            </a>
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