<?php
include 'db_conn.php';
include 'flag.php';

if (isset($_GET['source'])) {
    highlight_file(__FILE__);
    exit;
}

$isLoggedIn = false;
$isPost = $_SERVER['REQUEST_METHOD'] === 'POST';

if ($isPost) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $data = $db->query($query);

    if ($data->rowCount() > 0) {
        $isLoggedIn = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>H4CKT4LK - Login</title>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            width: 300px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <form method="post" action=".">
            <h3 class="mb-4">H4CKT4LK - Login</h3>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Enter your username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Enter your password" required>
            </div>
            <button type="submit" class="btn btn-primary btn-sm mb-4">Login</button>
            <a href="?source=true" class="btn btn-success btn-sm mb-4">View Source</a>
            <?php
            if ($isPost){
                if ($isLoggedIn) {
                    echo "<div class=\"alert alert-success\" role=\"alert\">Login successful!<br>Flag: <b><i>$FLAG</i></b></div>";
                } else {
                    echo '<div class="alert alert-danger" role="alert">Invalid username or password</div>';
                }
            }
            ?>
        </form>
    </div>
</body>
</html>
