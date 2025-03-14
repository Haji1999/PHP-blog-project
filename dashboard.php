<?php include 'header.php';
    
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$id = $_SESSION['user_id'];
$user = $_SESSION['user_name'];
$query = "SELECT * FROM posts WHERE user_id = $id ORDER BY created_at DESC";
$result = pg_query($conn,$query);


?>

<div class="container mt-5">
        <h2 class="mb-4">Manage Blog Posts <?php echo $user ?></h2>
        
        <a href="create.php" class="btn btn-primary mb-3">Add New Post</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($post = pg_fetch_assoc($result)): ?>
                    <tr>
                        <td><?= htmlspecialchars($post['id']); ?></td>
                        <td><?= htmlspecialchars($post['title']); ?></td>
                        <td><?= nl2br(htmlspecialchars(substr($post['content'], 0, 100))) . '...'; ?></td>
                        <td>
                            <a href="edit.php?id=<?= $post['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="delete.php?id=<?= $post['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?');">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

<?php include 'footer.php'; ?>
