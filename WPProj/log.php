<!DOCTYPE html>
<link rel="stylesheet" href="style.css">
<div class="hellform">
    <?php
        $output="<div class='boxform'>";
        $con=mysqli_connect("localhost","root","","wpproj");
        if(mysqli_connect_errno()){
            $output.="<p>Connection failed.Try again!</p><div class='btn'><a href='login.html'><button>Go Back</button></div>";
        }else{
            $usrnm=$_POST['usrnm'];
            $pwd=sha1($_POST['pwd']);
            $q="SELECT password FROM credentials WHERE username='$usrnm'";
            $res=mysqli_query($con,$q);
            if(mysqli_error($con)){
                $output.="<p>Unexpected Error!</p><div class='btn'><a href='login.html'><button>Go Back</button></div>";
            }else{
                if($row=mysqli_fetch_assoc($res)){
                    if($pwd!=$row['password']){
                        $output.="<p>Incorrect Password!</p><div class='btn'><a href='login.html'><button>Go Back</button></div>";
                    }else{
                        $output.="<p>Login Successful!</p><div class='btn'><a href='home.html'><button>Proceed</button></div>";
                    }
                }else{
                    $output.="<p>No Such User!</p><div class='btn'><a href='login.html'><button>Go Back</button></div>";
                }
            }
        }
        $output.="</div>";
        echo $output;
    ?>
</div>
</html>