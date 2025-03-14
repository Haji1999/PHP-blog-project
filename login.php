<?php include 'header.php'; ?>
<?php include 'config.php'; ?>

<?php

if($_SERVER['REQUEST_METHOD'] == "POST"){

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $query = "SELECT * FROM users WHERE email = $1";
    $result =  pg_query_params($conn, $query, array($email));
    $user = pg_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        header("Location: dashboard.php");
        exit();
    } else {
        echo "<div class='alert alert-danger'>Invalid email or password</div>";
    }
}
?>

<div class="container mt-4">
    <h1>Login</h1>
    <form action="" method="post">
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
    <p>Don't have an account? <a href="register.php">Sign up here</a></p>
</div>

<?php include 'footer.php'; ?>
