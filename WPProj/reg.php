<!DOCTYPE html>
<link rel="stylesheet" href="style.css">
<?php
    $output="<div class='boxform'>";
    $con=mysqli_connect("localhost","root","","wpproj");
    if(mysqli_connect_errno()){
        $output.="<p>Connection failed,Try again!</p><div class='btn'><a href='register.html'><button>Go Back</button></div>";
    }else{
        $usrnm=$_POST["usrnm"];
        $q1="SELECT * FROM credentials WHERE username='$usrnm'";
        $res=mysqli_query($con,$q1);
        if(mysqli_num_rows($res)){
            $output.="<p>Username Already Exists!</p><div class='btn'><a href='register.html'><button>Go Back</button></div>";
        }else{
            $pwd=sha1($_POST['pwd']);
            $q="INSERT INTO credentials VALUES('$usrnm','$pwd')";
            mysqli_query($con,$q);
            if(mysqli_error($con)){
                $output.="<p>Unexpected Error!</p><div class='btn'><a href='register.html'><button>Go Back</button></div>";
            }else{
                $output.="<p>Registered Successfully!</p><div class='btn'><a href='home.html'><button>Proceed</button></div>";
            }
        }
    }
    $output.="</div>";
    echo $output;
?>