<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email']; 

    try {
        // Database connection
        $servername = "localhost";
        $username_db = "root";
        $password_db = "";
        $database = "cms";

        $conn = new PDO("mysql:host=$servername;dbname=$database", $username_db, $password_db);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Check if username or email already exists
        $stmt = $conn->prepare("SELECT * FROM users WHERE username=:username OR email=:email");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $error = "Username or email already taken.";
        } else {
            // Hash the password before storing it
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $conn->prepare("INSERT INTO users (username, password, email) VALUES (:username, :password, :email)");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $hashed_password);
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            $_SESSION['message'] = "Registration successful. Please log in.";
            header("Location: login.php");
            exit();
        }
    } catch(PDOException $e) {
        $error = "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
        }

        .register-form {
            background-color: pink;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        .form-field {
            margin-bottom: 20px;
        }

        .signup-button {
            display: flex;
            justify-content: center;
        }
        
        .logo {
            max-width: 150px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="register-form">
            <img src="logo.jpg" alt="Logo" class="logo">
            <h2 class="text-center mb-4">Sign up</h2>
            <?php if(isset($error)) { ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php } ?>
            <form action="register.php" method="post">
                <div class="form-field">
                    <input class="form-control" type="text" name="username" placeholder="Username" required>
                </div>
                <div class="form-field">
                    <input class="form-control" type="email" name="email" placeholder="Email" required>
                </div>
                <div class="form-field">
                    <input class="form-control" type="password" name="password" placeholder="Password" required>
                </div>
              
                <div class="form-field signup-button">
                    <input class="btn btn-primary" type="submit" value="Sign up">
                </div>
            </form>
            <p class="text-center">Already have an account? <a href="login.php">Log in here</a>.</p>
        </div>
    </div>
</body>
</html>
