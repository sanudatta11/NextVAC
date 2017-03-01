<?php
if(!empty($_FILES)) {
    if (is_uploaded_file($_FILES['upload_selector']['tmp_name'])) {
        $sourcePath = $_FILES['upload_selector']['tmp_name'];
        $targetPath = "files/" . $_FILES['upload_selector']['name'];
        if (move_uploaded_file($sourcePath, $targetPath)) {
            echo "<script>console.log('Done');</script>";
        } else {
            echo "<script>console.log('Not Done');</script>";
        }
    }
    else{
        echo "<script>console.log('In Note');</script>";
    }
}else{
    echo "<script>console.log('Fuck me');</script>";
}

?>