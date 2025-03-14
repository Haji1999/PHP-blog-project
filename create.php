<?php include 'header.php'; 

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] == "POST"){

    $title = $_POST['title'];
    $content = $_POST['content'];

    $query = "INSERT INTO posts (title, content, user_id) VALUES ($1, $2, $3)";
    $result = pg_query_params($conn, $query, array($title, $content, $user_id));

    if ($result) {
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Error: Unable to create post.";
    }
}

?>

<div class="container mt-5">
        <h2>Create a New Post</h2>
        <form action="create.php" method="POST">
            <div class="mb-3">
                <label class="form-label">Title:</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Content:</label>
                <textarea name="content" class="form-control" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-success">Publish</button>
            <a href="dashboard.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

    <?php include 'footer.php'; ?>