<?php
// Connect to your database
$servername = "localhost";
$username = "root";
$password = "5253";
$dbname = "EasyWear";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) 
{
  die("Connection failed: " . mysqli_connect_error());
}

// Define the SQL query to fetch products from the database
$sql = "SELECT `goods_name`, `goods_quantity`, `goods_total_cost` FROM `PurchaseRecord`";
$result = mysqli_query($conn, $sql);

// Initialize variables for cart totals
$subtotal = 0;
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>購物車 | EasyWear</title>
        <link rel="icon" href="img/logo/FEF8D6.png">
        <link rel="stylesheet" href="shoppingCart.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>
        <div class="card">
            <div class="row">
                <div class="col-md-8 cart">
                    <div class="title">
                        <div class="row">
                            <div class="col"><h4><b>SHOPPING CART 購物車</b></h4></div>
                        </div>
                    </div>

                    <table>
                        <thead>
                        <tr>
                            <th>Product 產品</th>
                            <th>Price 價格 </th>
                            <th>Quantity 數量 </th>
                            <th>Total 總金額 </th>
                        </tr>
                        </thead>

                        <tbody>
                            <?php
                            // Loop through the query results and display products in the cart
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $product_name = $row["goods_name"];
                                    $price = $row["goods_total_cost"]/$row["goods_quantity"];
                                    $quantity = $row["goods_quantity"];
                                    $total = $row["goods_total_cost"];
                                    $subtotal += $total;
                                    
                                    // output data of each row
                                    echo "<tr><td>" . $product_name . "</td>";
                                    echo "<td>" . $price . "</td>";
                                    echo "<td>" . $quantity . "</td>";
                                    echo "<td>" . $total . "</td>";

                                    // another way to output data of each row //
                                    /*echo "<tr><td>" . $row["goods_name"] . "</td>";
                                    echo "<td>" . $row["goods_total_cost"]/$row["goods_quantity"] . "</td>";
                                    echo "<td>" . $row["goods_quantity"] . "</td>";
                                    echo "<td>" . $row["goods_total_cost"] . "</td>";
                                    $subtotal += $row["goods_total_cost"];
                                    */
                                }
                            } else {
                                echo "<tr>";
                                echo "<td colspan='4'>Your cart is empty.</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>

                    <!--back to last page-->
                    <div class="back-to-shop"><a href="Shop.php">&leftarrow;</a><span class="text-muted">回上一頁</span></div>
                </div>
                
                <!--try to create the "shop.php" file [IT WORKS!]-->
                <div class="col-md-4 summary">
                    <!-- adjust price from the delivery method option-->
                    <form action ="ShoppingCart.php" method="POST"> <p>SHIPPING FEE 運費</p>
                    <select name="shipping">
                        <option class="text-muted" value="" disabled selected>請選擇出貨方式</option>
                        <option class="text-muted" value=50>宅配 &dollar; 50.00</option>
                        <option class="text-muted" value=39>全家好賣+ &dollar; 39.00</option>
                        <option class="text-muted" value=39>7-11賣貨便 &dollar; 39.00</option>
                    </select>
                    <button type="calculate" name="calculate">計算運費</button>

                    <div class="col-md-6 order-summary">
                        <h2><b>Order Summary 訂單摘要</b></h2><hr>
                        
                        <p><b>Subtotal 小計: $ </b><?php echo $subtotal; ?></p>
                        
                        <p><b>Shipping 運費: $</b>
                        
                        <?php
                        if(isset($_POST['calculate'])) {
                            if(!empty($_POST['shipping'])) {
                                $shipping = $_POST['shipping'];
                                echo $shipping;        
                            }
                        } else {
                            echo '-';
                        }
                        ?>
                        </p>

                        <p><b>Total 總計: $</b>
            
                        <?php
                        if(isset($_POST['calculate'])) {
                            if(!empty($_POST['shipping'])) {
                                echo $subtotal + $shipping;
                            }
                        } else {
                            echo '-';
                        }
                        ?></p>
                    </div><br>

                    <?php
                    if(isset($_POST['calculate'])) {
                        if(!empty($_POST['shipping'])) {
                    ?>
                            <a href="CheckoutPage.php" class="btn btn-primary">Checkout</a> <!-- Create a checkout page-->
                    <?php
                        }
                    }
                    ?>        
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>