<?php
if (isset($_POST["create"])) {
    include("../connect.php");
    $title = $_POST["title"];
    $author = $_POST["author"];
    $summary = $_POST["summary"];
    $content = $_POST["content"];
    $date = $_POST["date"];

    // Prepare the SQL statement
    $sqlInsert = "INSERT INTO posts(date, title, author, summary, content) VALUES (:date, :title, :author, :summary, :content)";

    // Prepare and execute the statement
    $stmt = $conn->prepare($sqlInsert);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':author', $author);
    $stmt->bindParam(':summary', $summary);
    $stmt->bindParam(':content', $content);

    if ($stmt->execute()) {
        session_start();
        $_SESSION["create"] = "Post added successfully";
        header("Location:index.php");
    } else {
        die("Data is not inserted!");
    }
}

if (isset($_POST["update"])) {
    include("../connect.php");
    $title = $_POST["title"];
    $author = $_POST["author"];
    $summary = $_POST["summary"];
    $content = $_POST["content"];
    $date = $_POST["date"];
    $id = $_POST["id"];

    // Prepare the SQL statement
    $sqlUpdate = "UPDATE posts SET title = :title, author = :author, summary = :summary, content = :content, date = :date WHERE id = :id";

    // Prepare and execute the statement
    $stmt = $conn->prepare($sqlUpdate);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':author', $author);
    $stmt->bindParam(':summary', $summary);
    $stmt->bindParam(':content', $content);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        session_start();
        $_SESSION["update"] = "Post updated successfully";
        header("Location:index.php");
    } else {
        die("Data is not updated!");
    }
}
?>
