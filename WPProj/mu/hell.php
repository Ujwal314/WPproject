<!DOCTYPE html>
<html>
<?php
    $con=mysqli_connect("localhost","root","","uzwelllll");

    if(mysqli_connect_errno()){
        echo"no connection";
    }
    else{
        echo"connection done";
        $name=$_POST['name'];
        $gender=$_POST['gender'];
        $branch=$_POST['branch'];
        $q="INSERT INTO student VALUES('$name','$gender','$branch')";
        mysqli_query($con,$q);
        echo "done";
        
    }
?>
</html>