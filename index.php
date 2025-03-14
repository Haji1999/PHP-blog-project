<?php 
include 'header.php'; 
include 'config.php';

$query = "SELECT posts.id, posts.title, posts.content, users.name AS author, posts.created_at FROM posts
            JOIN users ON posts.user_id = users.id
            ORDER BY posts.created_at DESC";

$result = pg_query($conn, $query);

?>

<div class="container mt-4">
    <h1>Welcome to the Simple Blog</h1>
    <hr>

    <!-- Example blog post -->
    <div class="post-preview">
        <?php while ($post = pg_fetch_assoc($result)) : ?>

        <h2><a href="post.php?id=1"> <?php echo htmlspecialchars($post['title']); ?> </a></h2>

        <p> <?php echo substr(htmlspecialchars($post['content']), 0, 150) . '......'; ?>  </p>

        <p class="text-muted">By <?php echo htmlspecialchars($post['author']); ?> on <?php echo date('F j, Y', strtotime($post['created_at'])); ?></p>
        
        <a href="post.php?id=<?php echo $post['id']; ?>" class="btn btn-primary">Read More</a>
        
        <?php endwhile; ?>
    </div>
    
    <!-- Repeat for other blog posts -->
</div>

<?php include 'footer.php'; ?>
