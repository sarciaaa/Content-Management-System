<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        /* Custom styles for header, footer, and post section */
        .header {
            background-color: maroon;
            color: white;
        }

        .post-list {
            margin-top: 5rem;
        }

        .post {
            background-color: #f8f9fa;
            padding: 1.5rem;
            border-radius: 0.5rem;
            box-shadow: 0 0.2rem 0.5rem rgba(0, 0, 0, 0.1);
        }

        .footer {
            background-color: maroon;
            color: white;
        }
    </style>
</head>
<body>
    <header class="p-4 header text-center"> 
        <h1><a href="index.php" class="text-light text-decoration-none">Articles</a></h1>
    </header>
    <div class="post-list">
        <div class="container">
            <?php
                $id = $_GET['id'];
                if ($id) {
                    include("connect.php");
                    // Create a PDO connection
                    $pdo = new PDO("mysql:host=localhost;dbname=cms", "root", "");
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    // Prepare the SQL statement
                    $sqlSelect = "SELECT * FROM posts WHERE id = :id";
                    $stmt = $pdo->prepare($sqlSelect);
                    $stmt->bindParam(':id', $id);
                    $stmt->execute();

                    // Fetch the post
                    $post = $stmt->fetch(PDO::FETCH_ASSOC);

                    if ($post) {
            ?>
                <div class="post bg-light p-4 mt-5">
                    <h1><?php echo htmlspecialchars($post['title']); ?></h1>
                    <p>By: <?php echo htmlspecialchars($post['author']); ?></p>
                    <p><?php echo htmlspecialchars($post['date']); ?></p>
                    <p><?php echo htmlspecialchars($post['content']); ?></p>
                </div>
            <?php
                    } else {
                        echo "No post found";
                    }
                } else {
                    echo "No post ID provided";
                }
            ?>
        </div>
    </div>
    <div class="footer p-4 mt-4">
        <a href="index.php" class="text-light">Go back</a>
    </div>
</body>
</html>
