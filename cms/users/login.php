<?php
session_start();

if (isset($_POST['login'])) {
    $usernameOrEmail = $_POST['username_or_email'];
    $password = $_POST['password'];

    // Database connection
    $servername = "localhost";
    $username_db = "root";
    $password_db = "";
    $database = "cms";

    try {
        // Connect to the database
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username_db, $password_db);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username OR email = :email");

        $stmt->bindParam(':username', $usernameOrEmail);
        $stmt->bindParam(':email', $usernameOrEmail);
    
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
       
            if (password_verify($password, $row['password'])) {
                $_SESSION["user"] = $row['username'];
                header("Location: index.php");
                exit();
            } else {
                $error = "Invalid username or password.";
            }
        } else {
            $error = "Invalid username or password.";
        }
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-form {
            background-color: pink;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        .form-field {
            margin-bottom: 20px;
        }

        .login-button {
            display: flex;
            justify-content: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-form">
            <h2 class="text-center mb-4">Log in</h2>
            <?php if(isset($_SESSION['message'])) { ?>
                <div class="alert alert-success"><?php echo $_SESSION['message']; ?></div>
                <?php unset($_SESSION['message']); ?>
            <?php } ?>
            <?php if(isset($error)) { ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php } ?>
            <form action="login.php" method="post">
                <div class="form-field mb-4">
                    <input class="form-control" type="text" name="username_or_email" placeholder="Username or Email" required>
                </div>
                <div class="form-field mb-4">
                    <input class="form-control" type="password" name="password" placeholder="Password" required>
                </div>
                <div class="form-field login-button">
                    <input class="btn btn-primary btn-block" type="submit" value="Login" name="login">
                </div>
            </form>
            <p class="text-center">Don't have an account? <a href="register.php">Sign up here</a>.</p>
        </div>
    </div>
</body>
</html>
