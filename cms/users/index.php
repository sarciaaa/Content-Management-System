<?php 
include("templates/header.php");
?>

<div class="posts-list w-100 p-5">
    <?php
    if (isset($_SESSION["create"])) {
        ?>
        <div class="alert alert-success">
            <?php echo $_SESSION["create"]; ?>
        </div>
        <?php
        unset($_SESSION["create"]);
    }
    ?>
    <?php
    if (isset($_SESSION["update"])) {
        ?>
        <div class="alert alert-success">
            <?php echo $_SESSION["update"]; ?>
        </div>
        <?php
        unset($_SESSION["update"]);
    }
    ?>
    <?php
    if (isset($_SESSION["delete"])) {
        ?>
        <div class="alert alert-success">
            <?php echo $_SESSION["delete"]; ?>
        </div>
        <?php
        unset($_SESSION["delete"]);
    }
    ?>
    <table class="table table-bordered">
        <style>
            .btn-pink {
                background-color: pink;
                border-color: pink;
                color: black;
            }

            .btn-pink:hover {
                background-color: #ff80ab;
                border-color: #ff80ab;
            }

            .btn-red {
                background-color: red;
                border-color: red;
                color: white;
            }

            .btn-red:hover {
                background-color: #ff4d4d;
                border-color: #ff4d4d;
            }

            .btn-maroon {
                background-color: maroon;
                border-color: maroon;
                color: white;
            }

            .btn-maroon:hover {
                background-color: #800000;
                border-color: #800000;
            }
        </style>
        <thead>
        <tr>
            <th style="width:10%;">Publication Date</th>
            <th style="width:10%;">Author</th>
            <th style="width:10%;">Title</th>
            <th style="width:45%;">Article</th>
            <th style="width:25%;">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        try {
            include('../connect.php');
            $sqlSelect = "SELECT * FROM posts";
            $stmt = $conn->query($sqlSelect);
            while($data = $stmt->fetch(PDO::FETCH_ASSOC)){
                ?>
                <tr>
                    <td><?php echo $data["date"]?></td>
                    <td><?php echo $data["author"]?></td>
                    <td><?php echo $data["title"]?></td>
                    <td><?php echo $data["summary"]?></td>
                    <td>
                        <a class="btn btn-pink" href="view.php?id=<?php echo $data["id"]?>">View</a>
                        <a class="btn btn-red" href="edit.php?id=<?php echo $data["id"]?>">Edit</a>
                        <a class="btn btn-maroon" href="delete.php?id=<?php echo $data["id"]?>">Delete</a>
                    </td>
                </tr>
                <?php
            }
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        ?>
        </tbody>
    </table>
</div>

<?php 
include("templates/footer.php");
?>
