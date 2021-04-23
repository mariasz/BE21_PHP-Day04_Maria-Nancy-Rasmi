<?php
require_once 'actions/db_connect.php';

if ($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM article WHERE id = {$id}";
    $result = $connect->query($sql);
    if ($result->num_rows == 1) {
        $data = $result->fetch_assoc();
        $title = $data['title'];
        $content = $data['content'];
        $picture = $data['picture'];
    } else {
        header("location: error.php");
    }
    $connect->close();
} else {
    header("location: error.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Edit Article</title>
        <?php require_once 'components/boot.php'?>
        <style type="text/css">
            fieldset {
                margin: auto;
                margin-top: 100px;
                width: 60% ;
            }  
            .img-thumbnail{
                width: 70px !important;
                height: 70px !important;
            }     
        </style>
    </head>
    <body>
        <fieldset>
            <legend class='h2'>Update request <img class='img-thumbnail rounded-circle' src='pictures/<?php echo $picture ?>' alt="<?php echo $title ?>"></legend>
            <form action="actions/a_update.php" method="post" enctype="multipart/form-data">
                <table class="table">
                    <tr>
                        <th>Title</th>
                        <td><input class="form-control" type="text" name="title" placeholder="Article content" value="<?php echo $title ?>" /></td>
                    </tr>
                    <tr>
                        <th>Content</th>
                        <td><textarea class="form-control" name="content" rows="3"><?php echo $content ?></textarea></td> -->
                    </tr>
                    <tr>
                        <th>Picture</th>
                        <td><input class="form-control" type="file" name="picture" /></td>
                    </tr>
                    <tr>
                        <input type="hidden" name="id" value="<?php echo $data['id'] ?>" />
                        <input type="hidden" name="picture" value="<?php echo $data['picture'] ?>" />
                        <td><button class="btn btn-success" type="submit">Save Changes</button></td>
                        <td><a href="index.php"><button class="btn btn-warning" type="button">Back</button></a></td>
                    </tr>
                </table>
            </form>
        </fieldset>
    </body>
</html>