<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        .header {
            background-color: maroon;
            color: white;
        }

        .article-text {
            color: white;
        }

        /* Custom style for the "Read More" button */
        .btn-maroon {
            background-color: maroon;
            color: white;
            border-color: maroon;
        }

        .btn-maroon:hover {
            background-color: darkred;
            border-color: darkred;
        }

        /* Custom style for the footer */
        .footer {
            background-color: maroon;
            color: white;
        }
    </style>
</head>
<body>
    <header class="p-4 header text-center"> 
        <h1><a href="index.php" class="text-decoration-none"><span class="article-text">Articles</span></a></h1>
    </header>
    <div class="post-list mt-5">
        <div class="container">
            <?php
                include("connect.php");

                // Prepare the SQL statement
                $sqlSelect = "SELECT * FROM posts";
                $stmt = $conn->prepare($sqlSelect);
                $stmt->execute();

                // Fetch all rows from the result
                $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($posts as $post) {
                ?>
                    <div class="row mb-4 p-5 bg-light">
                        <div class="col-sm-2">
                            <?php echo htmlspecialchars($post["date"]); ?>
                        </div>
                        <div class="col-sm-3">
                           <h2><?php echo htmlspecialchars($post["title"]); ?></h2>
                           <p>by <?php echo htmlspecialchars($post["author"]); ?></p>
                        </div>
                        <div class="col-sm-5">
                            <?php echo htmlspecialchars($post["content"]); ?>
                        </div>
                        <div class="col-sm-2">
                            <a href="view.php?id=<?php echo htmlspecialchars($post['id']); ?>" class="btn btn-maroon">READ MORE</a>
                        </div>
                    </div>
                <?php
                }
            ?>
         </div>
    </div>
    <div class="footer bg-maroon p-4 mt-4">
        <a href="users/index.php" class="text-light">Go Back</a>
    </div>
</body>
</html>
