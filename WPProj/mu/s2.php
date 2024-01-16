<!DOCTYPE html>
<?php
    if(!empty($_FILES['upload'])){
        $path="uploads/";
        $path=$path.basename($_FILES['upload']['name']);
        if(move_uploaded_file($_FILES['upload']['tmp_name'],$path)){
            echo "The file is uploaded";
        }else{
            echo "There was error uploading the file";
        }
    }
?>