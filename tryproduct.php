<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>產品詳情 | EasyWear</title>
        <link rel="stylesheet" href="tryproductstyle1.css">
    
        <style>
            .product-details img {
                object-fit: cover;
                object-position: top;
                display: flex;
                justify-content: center;
                align-items: center;
                width: 600px;
                height: 620px;
                padding: 20px;
                text-align: center;
            }

            #quantity {
                padding: 6px 12px; /* 设置内边距 */
                border: 1px solid #ccc; /* 设置边框样式 */
                border-radius: 4px; /* 设置边框圆角 */
                font-size: 16px; /* 设置字体大小 */
                width: 70px; /* 设置输入框宽度 */
                box-sizing: border-box; /* 盒子模型设为边框盒 */
                outline: none; /* 去除默认的外边框 */
            }

            #quantity:focus {
                border-color: #007bff; /* 设置获得焦点时的边框颜色 */
            }
        </style>

        <script>
            function redirectToShop(sectionId) {
                // 在这里指定要跳转到的 Shop.php 页面，并滚动到指定的 sectionId
                window.location.href = 'Shop.php#' + sectionId;
            }

            function confirmPurchase() {
                var quantity = document.getElementById("quantity").value;
                var price = parseFloat(document.querySelector("button[data-product-price]").getAttribute("data-product-price"));
                var productName = document.querySelector("button[data-product-name]").getAttribute("data-product-name");
                var totalPrice = parseFloat(quantity) * price;
                alert("您確認購買「" + productName + "」，總共是 「" + quantity + "」 件，價格為 「" + totalPrice + "」 元。謝謝惠顧!");

                // 创建一个表单
                var form = document.createElement('form');
                form.setAttribute('method', 'post');
                form.setAttribute('action', 'update_quantity.php'); // 修改这里为 update_quantity.php

                // 创建隐藏字段
                var productNameField = document.createElement('input');
                productNameField.setAttribute('type', 'hidden');
                productNameField.setAttribute('name', 'productName');
                productNameField.setAttribute('value', productName);
                form.appendChild(productNameField);

                var priceField = document.createElement('input');
                priceField.setAttribute('type', 'hidden');
                priceField.setAttribute('name', 'price');
                priceField.setAttribute('value', price);
                form.appendChild(priceField);

                var quantityField = document.createElement('input');
                quantityField.setAttribute('type', 'hidden');
                quantityField.setAttribute('name', 'quantity');
                quantityField.setAttribute('value', quantity);
                form.appendChild(quantityField);

                var totalPriceField = document.createElement('input');
                totalPriceField.setAttribute('type', 'hidden');
                totalPriceField.setAttribute('name', 'totalPrice');
                totalPriceField.setAttribute('value', totalPrice.toFixed(2));
                form.appendChild(totalPriceField);

                // 将表单添加到页面并提交
                document.body.appendChild(form);
                form.submit();
            }

        </script>
    </head>

    <body>
        <?php
        include 'customMenu.php';

        // 数据库连接信息
        $servername = "localhost";
        $username = "root";
        $password = "5253";
        $dbname = "EasyWear";

        // 创建连接
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        // 检查连接是否成功
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // 查询商品信息
        $imageName = $_GET['product_image']; // 获取图片名称
        // 从字符串中提取数字部分
        $productID = substr($imageName, 7, -4);//如果照片名稱更動這裡就會錯，因為每個商品沒有編號，所以我是從照片名稱抓的
        $sql = "SELECT * FROM `MyProducts` WHERE id = $productID";
        $result = $conn->query($sql);

        // 检查是否有结果
        if ($result->num_rows>0) {
            // 输出数据
            while($row = $result->fetch_assoc()) {
                $productName = $row["cloth_name"];
                $price = $row["cloth_price"];
                $soldCount = $row["cloth_quantity"];
                $soldSize = $row["cloth_size"];
                $soldStore = $row["cloth_store"];
                $soldDescription = $row["cloth_description"];
            }
        } else {
            echo "0 结果";
        }
        ?>

        <div class="container">
        <div class="style-selection">
            <h3>風格選擇</h3>
            <hr class="horizontal-line">

            <button onclick="redirectToShop('section1')">知性文青｜日式風格穿搭</button><br>
            <button onclick="redirectToShop('section2')">寬鬆舒適｜中性風格穿搭</button><br>
            <button onclick="redirectToShop('section3')">氣質典雅｜法式風格穿搭</button><br>
            <button onclick="redirectToShop('section4')">俏皮活潑｜可愛風格穿搭</button><br>
            <button onclick="redirectToShop('section5')">輕盈溫柔｜清新風格穿搭</button><br>
            <button onclick="redirectToShop('section6')">輕鬆自在｜休閒風格穿搭</button><br>
            <button onclick="redirectToShop('section7')">乾淨簡約｜極簡風格穿搭</button><br>
            <button onclick="redirectToShop('section8')">懷舊潮流｜復古風格穿搭</button><br>
            <button onclick="redirectToShop('section9')">精緻高貴｜小香風格穿搭</button><br>
            <button onclick="redirectToShop('section10')">個性十足｜歐美風格穿搭</button><br>

        </div>
        <div class="product-details">
            <img src="<?php echo "img/clothes/". $_GET['product_image']; ?>" alt="Product Image">
            <div class="info">
                <h2><?php echo $productName; ?></h2>
                <h3>
                    $<?php echo $price; ?>      

                </h3>
                <p class="sold">已售出<?php echo $soldCount; ?>件</p>
                <p>尺寸大小：<?php echo $soldSize; ?></p>
                <p>商品來源：<?php echo $soldStore; ?></p>
                <p><span style="font-size: smaller;"><?php echo $soldDescription; ?></span></p>

                <h3>
                    <input type="number" id="quantity" value="1" min="1" >
                    <button onclick="confirmPurchase()" 
                        data-product-name="<?php echo $productName; ?>"
                        data-product-price="<?php echo $price; ?>">確認購買
                    </button>
                </h3>
            </div>
        </div>
    </body>
</html>