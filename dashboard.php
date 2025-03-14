<?php include 'header.php'; ?>

<div class="container mt-4">
    <h1>Dashboard</h1>
    <hr>

    <h3>Your Posts</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Blog Post 1</td>
                <td>2025-03-13</td>
                <td>
                    <a href="edit.php?id=1" class="btn btn-warning">Edit</a>
                    <a href="delete.php?id=1" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        </tbody>
    </table>

    <a href="create.php" class="btn btn-primary">Create New Post</a>
</div>

<?php include 'footer.php'; ?>
