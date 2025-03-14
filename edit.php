<?php include 'header.php'; 

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];

$query = "SELECT * FROM posts WHERE id = $1";
$result = pg_query_params($conn, $query, array($id));
$post = pg_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $updateQuery = "UPDATE posts SET title = $1, content = $2 WHERE id = $3";
    $updateResult = pg_query_params($conn, $updateQuery, array($title, $content, $id));

    if ($updateResult) {
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Error updating post.";
    }
}

?>

<div class="container mt-5">
        <h2>Edit Post</h2>
        <form action="edit.php?id=<?= $id; ?>" method="POST">
            <div class="mb-3">
                <label class="form-label">Title:</label>
                <input type="text" name="title" class="form-control" value="<?= htmlspecialchars($post['title']); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Content:</label>
                <textarea name="content" class="form-control" rows="5" required><?= htmlspecialchars($post['content']); ?></textarea>
            </div>
            <button type="submit" class="btn btn-warning">Update</button>
            <a href="dashboard.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

    <?php include 'footer.php'; ?>