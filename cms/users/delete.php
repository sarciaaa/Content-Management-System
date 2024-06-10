<?php
$id = $_GET["id"];
if ($id) {
    try {
        include("../connect.php");
        $sqlDelete = "DELETE FROM posts WHERE id = :id";
        $stmt = $conn->prepare($sqlDelete);
        $stmt->bindParam(':id', $id);
        if ($stmt->execute()) {
            session_start();
            $_SESSION["delete"] = "Post deleted successfully";
            header("Location:index.php");
            exit();
        } else {
            die("Something is not right. Data is not deleted");
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Post not found";
}
?>
