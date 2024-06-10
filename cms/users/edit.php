<?php 
include("templates/header.php");
?>

<?php
$id = $_GET['id'];
if($id){
    try {
        include("../connect.php");
        $sqlEdit = "SELECT * FROM posts WHERE id = :id";
        $stmt = $conn->prepare($sqlEdit);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "No post found";
}
?>
<style>
    .btn-maroon {
        background-color: maroon;
        border-color: maroon;
    }

    .btn-maroon:hover {
        background-color: #800000;
        border-color: #800000;
    }
</style>
<div class="create-form w-100 mx-auto p-4" style="max-width:700px;">
    <form action="process.php" method="post">
        <?php 
        if ($data) {
        ?>
        <div class="form-field mb-4">
            <input type="text" class="form-control" name="title" id="" placeholder="Enter Title:" value="<?php echo $data['title']; ?>">
        </div>
        <div class="form-field mb-4">
            <input type="text" class="form-control" name="author" id="" placeholder="Enter Author:" value="<?php echo $data['author']; ?>">
        </div>
        <div class="form-field mb-4">
            <textarea name="summary"  class="form-control" id="" cols="30" rows="10" placeholder="Enter Summary:"><?php echo $data['summary']; ?></textarea>
        </div>
        <div class="form-field mb-4">
            <textarea name="content" class="form-control" id="" cols="30" rows="10" placeholder="Enter Post:"><?php echo $data['content']; ?></textarea>
        </div>
        <input type="hidden" name="date" value="<?php echo date("Y/m/d"); ?>">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="form-field">
            <input type="submit" class="btn btn-primary btn-maroon" value="Submit" name="update">
        </div>
        <?php
        } else {
            echo "No data found";
        }
        ?>
    </form>
</div>
<?php 
include("templates/footer.php");
?>
