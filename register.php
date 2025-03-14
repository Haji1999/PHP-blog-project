<?php include 'header.php'; ?>

<?php 

if($_SERVER['REQUEST_METHOD'] == "POST") {

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_pass = trim($_POST['confirm_password']);

    if($password !== $confirm_pass){
        echo "<div class='alert alert-danger'>Passwords do not match!</div>";
    }else{

        $hashed_pass = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO users (name, email, password) VALUES ($1, $2, $3)";
        $result = pg_query_params($conn, $query, array($name, $email, $hashed_pass));

        if ($result) {
            echo "<div class='alert alert-success'>Registration successful! <a href='login.php'>Login here</a></div>";
        } else {
            echo "<div class='alert alert-danger'>Error: " . pg_last_error($conn) . "</div>";
        }
    }
}

?>

<div class="container mt-4">
    <h1>Sign Up</h1>
    <form action="" method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Retype Password:</label>
            <input type="password" name="confirm_password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Sign Up</button>
    </form>
    <p>Already have an account? <a href="login.php">Login here</a></p>
</div>

<?php include 'footer.php'; ?>
