<?php
require_once 'db_connect.php';
require_once 'file_upload.php';

if ($_POST) {    
    $title = $_POST['title'];
    $content = $_POST['content'];
    $id = $_POST['id'];
    //variable for upload pictures errors is initialized
    $uploadError = '';

    $picture = file_upload($_FILES['picture']);//file_upload() called  
    if($picture->error===0){
        ($_POST["picture"]=="placeholder.png")?: unlink("../pictures/$_POST[picture]");           
        $sql = "UPDATE article SET title = '$title', content = '$content', picture = '$picture->fileName' WHERE id = {$id}";
    }else{
        $sql = "UPDATE article SET title = '$title', content = '$content' WHERE id = {$id}";
    }    
    if ($connect->query($sql) === TRUE) {
        $class = "success";
        $message = "The record was successfully updated";
        $uploadError = ($picture->error !=0)? $picture->ErrorMessage :'';
    } else {
        $class = "danger";
        $message = "Error while updating record : <br>" . $connect->error;
        $uploadError = ($picture->error !=0)? $picture->ErrorMessage :'';
    }
    $connect->close();    
} else {
    header("location: ../error.php");
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Update</title>
        <?php require_once '../components/boot.php'?> 
    </head>
    <body>
        <div class="container">
            <div class="mt-3 mb-3">
                <h1>Update request response</h1>
            </div>
            <div class="alert alert-<?php echo $class;?>" role="alert">
                <p><?php echo ($message) ?? ''; ?></p>
                <p><?php echo ($uploadError) ?? ''; ?></p>
                <a href='../update.php?id=<?=$id;?>'><button class="btn btn-warning" type='button'>Back</button></a>
                <a href='../index.php'><button class="btn btn-success" type='button'>Home</button></a>
            </div>
        </div>
    </body>
</html>