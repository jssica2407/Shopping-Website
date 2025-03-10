<?php
$servername = "localhost";
$username = "root";
$password = "5253";
$dbname = "EasyWear";

// 输出接收到的 POST 数据，用于调试
echo "1. Received POST data: <br>";
print_r($_POST);

// 建立连接
$conn = mysqli_connect($servername, $username, $password, $dbname);

// 检查连接
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "<br>2. Database connection successful <br>";
}

// 创建表
$sql = "CREATE TABLE IF NOT EXISTS PurchaseRecord(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    goods_name VARCHAR(30) NOT NULL,
    goods_quantity INT NOT NULL,
    goods_total_cost INT NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (mysqli_query($conn, $sql)) {
    echo "3. Table PurchaseRecord created successfully <br>";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

// 从 POST 请求中获取数据
$productName = $_POST['productName'];
$quantity = $_POST['quantity'];
$totalPrice = $_POST['totalPrice'];

// 将数据插入到数据库中
$sql = "INSERT INTO PurchaseRecord (goods_name, goods_quantity, goods_total_cost) VALUES ('$productName', '$quantity', '$totalPrice')";

if (mysqli_query($conn, $sql)) {
    echo "4. New record created successfully<br>";
    //等待幾秒跳回主頁
    header("refresh:0;url=Shop.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>