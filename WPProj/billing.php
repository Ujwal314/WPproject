<!DOCTYPE html>
<html>
    <head>
        <title>Billing</title>
        <link rel="stylesheet" href="style.css">
        <style>
            table{
                border-collapse: collapse;
                width: 70%;
            }
            td,th{
                text-align: center;
                border:black 1px solid;
            }
        </style>
    </head>
    <body>
        <div class="blurback">
            <h2>Restaurant Name</h2>
            <div class="boxform">
                <form onsubmit="return val()" action="http://localhost/WPProj/home.html">
                        <?php
                            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                                $arr=array(
                                    "Burger"=>100,
                                    "Pizza"=>200,
                                    "FriedChicken"=>200,
                                    "HotDog"=>200,
                                    "Tacos"=>200,
                                    "FrenchFries"=>200,
                                    "ChickenNuggets"=>200,
                                    "Sandwiches"=>200,
                                    "Donuts"=>200,
                                    "IceCream"=>200
                                );
                                $cnt=0;
                                $output="<table id='tab'>
                                <tr>
                                    <th>Cart Items</th>
                                    <th>Cost</th>
                                    <th>Quantity</th>
                                </tr>";
                                foreach ($_POST as $key=>$val){
                                    if($val==0){
                                        $cnt=$cnt+1;
                                        continue;
                                    }
                                    $v=$arr[$key];
                                    $output.="<tr><td>$key</td><td>$v</td><td><input type='number' min=0 value=$val></td></tr>";
                                }
                                $output.="</table>";
                                echo $output;
                            } else {
                                echo "Invalid request method ". $_SERVER['REQUEST_METHOD'];
                            }
                        ?>
                    <div class="btn">
                        <button type="button" onclick="cal()">Calculate</button><a href="menu.html"><button type="button">Go Back</button></a><br>
                        <p style="border:1px solid black" id="cost"></p>
                        <a href="home.html"><button type="submit">Order</button></a>                   
                    </div>
                </form>
            </div>
        </div>
    </body>
    <script>
        function cal(){
            var cost=document.getElementById('cost');
            var tab=document.getElementById('tab');
            var totalSum=0;
            for (var i = 1, row; row = tab.rows[i]; i++) {
                let cst=parseFloat(row.cells[1].textContent);
                let qty=parseFloat(row.cells[2].querySelector('input').value);
                totalSum+=cst*qty;
            }
            cost.innerHTML=totalSum;
        }
        function val(){
            alert('Thank you! You will recieve Your order shortly...');
        }
    </script>
</html>