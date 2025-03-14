<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM posts WHERE id = $1";
    $result = pg_query_params($conn, $query, array($id));

    if ($result) {
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Error deleting post.";
    }
}
?>
