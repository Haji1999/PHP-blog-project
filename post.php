<?php include 'header.php'; ?>
<?php include 'config.php'; ?>

<?php
if(!isset($_GET['id'])) {

    echo "<h3 class='text-center text-danger'>Invalid Post</h3>";
    include 'footer.php';
    exit;
}

$post_id = (int) $_GET['id'];

$query = "SELECT posts.title, posts.content, users.name AS author, posts.created_at FROM posts
            JOIN users ON posts.user_id = users.id
            WHERE posts.id = $post_id";

$result = pg_query($conn,$query);
$post = pg_fetch_assoc($result);

if (!$post) {
    echo "<h3 class='text-center text-danger'>Post Not Found</h3>";
    include '../includes/footer.php';
    exit;
}

?>


<div class="container mt-4">
    <h1><?php echo htmlspecialchars($post['title']); ?></h1>

    <p class="text-muted">By <?php echo htmlspecialchars($post['author']); ?> on <?php echo date('F j, Y', strtotime($post['created_at'])); ?></p>
    <p><?php echo nl2br(htmlspecialchars($post['content'])); ?></p>

    <a href="index.php" class="btn btn-secondary">Back to Home</a>
</div>

<?php include 'footer.php'; ?>
