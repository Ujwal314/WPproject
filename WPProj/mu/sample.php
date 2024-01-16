<!DOCTYPE html>
<html>
    <head>
        <title>Hi</title>
        <style>
            table{
                border-collapse:collapse;
            }
            td,th{
                border:1px solid black;
                text-align:center;
            }
        </style>
    </head>
    <body>
        <?php
            $con=mysqli_connect("localhost","root","","wpproj");
            if(mysqli_connect_errno()){
                $output.="<p>Connection failed.Try again!</p><div class='btn'><a href='login.html'><button>Go Back</button></div>";
            }else{
                $q="SELECT * FROM Cookie_Sales WHERE Sale_Amount>18";
                $res=mysqli_query($con,$q);
                $rcnt=mysqli_num_rows($res);
                $output="<table><tr><th>Sale_ID</th><th>Salesman_Name</th><th>Sale_Amount</th><th>Sale_Date</th></tr>";
                while($row=mysqli_fetch_assoc($res)){
                    $output.="<tr><td>$row['sale_id']</td><td>$row['salesman_name']</td><td>$row['sale_amount']</td><td>$row['sale_date']</td></tr>";
                }
                $output.="</table>";
                echo $output;
                echo "Number of rows fetched $rcnt";
            }
        ?>
    </body>
</html>
