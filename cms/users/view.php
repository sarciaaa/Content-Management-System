<?php
include("templates/header.php");
?>

<div class="post w-100 bg-light p-5">
    <?php
    $id = $_GET["id"];
    if ($id) {
        try {
            include("../connect.php");
            $sqlSelectPost = "SELECT * FROM posts WHERE id = :id";
            $stmt = $conn->prepare($sqlSelectPost);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($data) {
                ?>
                <h1><?php echo $data['title']; ?></h1>
                <p>By <?php echo $data['author']; ?></p>
                <p><?php echo $data['date']; ?></p>
                <p><?php echo $data['content']; ?></p>
                <?php
            } else {
                echo "Post Not Found";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "Post Not Found";
    }
    ?>
</div>

<?php
include("templates/footer.php");
?>
