<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>商店 | EasyWear</title>
        <link rel="stylesheet" href="shopstyles.css">
        <style>
            h3 {
                text-align: center;
                background-color: rgb(226, 219, 202);
                padding: 25px;
            }

            .product img {
                object-fit: cover;
                object-position: top;
                width: 240px;
                height: 245px;
            }

            .product button {
                background-color: transparent;
                color: black;
                border: 1px solid black;
                border-radius: 25px;
                padding: 5px 10px;
                cursor: pointer;
            }
        
            .product button:hover {
                background-color: rgb(226, 219, 202); /* 游標指向時的顏色 */
            }

            #scroll-to-top {
                position: fixed;
                bottom: 20px;
                right: 20px;
                width: 50px;
                height: 50px;
                background-color: transparent;
                border: 2px solid black;
                border-radius: 50%;
                cursor: pointer;
                outline: none;
            }

            /* CSS for the arrow icon inside the button */
            #scroll-to-top::before {
                content: "";
                position: absolute;
                top: 30%;
                left: 50%;
                transform: translate(-50%, -50%) rotate(-45deg);
                width: 10px;
                height: 10px;
                border-top: 1px solid black;
                border-right: 1px solid black;
            }

            .center1 {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 10vh;
            }

            #size-filter {
                padding: 8px 8px;
                font-size: 14px;
                border: 2px solid #ccc;
                border-radius: 5px;
                background-color: #f8f8f8;
                color: #333;
                /* appearance: none; */
                background-image: url('down-arrow.png');
                background-repeat: no-repeat;
                background-position: right center;
                padding-right: 30px;
                transition: border-color 0.3s ease;
            }

            #size-filter:hover {
                border-color: #666;
            }
        </style>
    </head>

    <body>
        <?php
            include 'customMenu.php';
        ?>

        <div class="center1">
            <label for="size-filter">嗨女孩！今天的妳想當個...</label>
            <select id="size-filter" onchange="filterProductsBySize()">
                <option value="all">全部</option>
                <option value="S">窈窕女孩</option>
                <option value="M">勻稱女孩</option>
                <option value="L">飽滿女孩</option>
                <option value="F">百搭女孩</option>
            </select>
        </div>

        <nav>        
            <ul>
                <li><a href="#" onclick="scrollToSection('section1')">知性文青｜日式風格穿搭</a></li>
                <li><a href="#" onclick="scrollToSection('section2')">寬鬆舒適｜中性風格穿搭</a></li>
                <li><a href="#" onclick="scrollToSection('section3')">氣質典雅｜法式風格穿搭</a></li>
                <li><a href="#" onclick="scrollToSection('section4')">俏皮活潑｜可愛風格穿搭</a></li>
                <li><a href="#" onclick="scrollToSection('section5')">輕盈溫柔｜清新風格穿搭</a></li>
                <li><a href="#" onclick="scrollToSection('section6')">輕鬆自在｜休閒風格穿搭</a></li>
                <li><a href="#" onclick="scrollToSection('section7')">乾淨簡約｜極簡風格穿搭</a></li>
                <li><a href="#" onclick="scrollToSection('section8')">懷舊潮流｜復古風格穿搭</a></li>
                <li><a href="#" onclick="scrollToSection('section9')">精緻高貴｜小香風格穿搭</a></li>
                <li><a href="#" onclick="scrollToSection('section10')">個性十足｜歐美風格穿搭</a></li>
            </ul>
        </nav>

        <main>
            <!-- Product sections -->
            <div id="section1">
                <h3>知性文青｜日式風格穿搭</h3>
                <div class="product-list"></div>
            </div>
            <div id="section2">
                <h3>寬鬆舒適｜中性風格穿搭</h3>
                <div class="product-list"></div>
            </div>
            <div id="section3">
                <h3>氣質典雅｜法式風格穿搭</h3>
                <div class="product-list"></div>
            </div>
            <div id="section4">
                <h3>俏皮活潑｜可愛風格穿搭</h3>
                <div class="product-list"></div>
            </div>
            <div id="section5">
                <h3>輕盈溫柔｜清新風格穿搭</h3>
                <div class="product-list"></div>
            </div>
            <div id="section6">
                <h3>輕鬆自在｜休閒風格穿搭</h3>
                <div class="product-list"></div>
            </div>
            <div id="section7">
                <h3>乾淨簡約｜極簡風格穿搭</h3>
                <div class="product-list"></div>
            </div>
            <div id="section8">
                <h3>懷舊潮流｜復古風格穿搭</h3>
                <div class="product-list"></div>
            </div>
            <div id="section9">
                <h3>精緻高貴｜小香風格穿搭</h3>
                <div class="product-list"></div>
            </div>
            <div id="section10">
                <h3>個性十足｜歐美風格穿搭</h3>
                <div class="product-list"></div>
            </div>
            <!-- Add more sections here -->
        </main>

        <footer>
            <p>&copy; 2024 Easy Wear. All rights reserved.</p>
        </footer>

        <button id="scroll-to-top" onclick="scrollToTop()">Top</button>

        <script>
            // Product data
            var products = [
                //product 1-10
                { name: "立體蕾絲波紋層次造型細肩洋裝", price: "Queen Shop / $695", image: "product1.jpg" , size: "F", style_area : "1"},
                { name: "後綁帶打褶排釦背心洋裝", price: "Queen Shop / $607", image: "product2.jpg" , size: "F", style_area : "1"},
                { name: "雙層設計細肩綁帶蛋糕網紗長洋裝", price: "Queen Shop / $607", image: "product3.jpg" , size: "F", style_area : "1"},
                { name: "後綁帶斜剪接裙襬洋裝", price: "Queen Shop / $345", image: "product4.jpg" , size: "F", style_area : "1"},
                { name: "簍空編織寬版長袖罩衫", price: "Queen Shop / $519", image: "product5.jpg" , size: "F", style_area : "1"},
                { name: "透肌感細坑條針織衫", price: "The Ladywore / $531", image: "product6.jpg", size: "F" , style_area : "1"},
                { name: "立體格紋針織衣", price: "The Ladywore / $590", image: "product7.jpg", size: "F" , style_area : "1"},
                { name: "俐落感滑料襯衫", price: "The Ladywore / $490", image: "product8.jpg", size: "F" , style_area : "1"},
                { name: "麻花紋圓領背心", price: "The Ladywore / $590", image: "product9.jpg" , size: "F", style_area : "1"},
                { name: "造型感大翻領針織上衣", price: "The Ladywore / $690", image: "product10.jpg" , size: "F", style_area : "1"},
                //product 11-20
                { name: "素色多口袋設計寬版上衣", price: "Queen Shop / $510", image: "product11.jpg", size: "F" , style_area : "2"},
                { name: "無領造型寬版水洗牛仔襯衫", price: "Queen Shop / $598", image: "product12.jpg", size: "F" , style_area : "2"},
                { name: "半開襟排釦設計鬆餅格連帽上衣", price: "Queen Shop / $390", image: "product13.jpg" , size: "F", style_area : "2"},
                { name: "單口袋異材質拼接設計上衣", price: "Queen Shop / $598", image: "product14.jpg" , size: "F", style_area : "2"},
                { name: "半門襟撞色拼接設計上衣", price: "Queen Shop / $340", image: "product15.jpg", size: "F" , style_area : "2"},
                { name: "奶灰色雙口袋飛行外套", price: "The Ladywore / $711", image: "product16.jpg", size: "F" , style_area : "2"},
                { name: "刷布背心", price: "The Ladywore / $531", image: "product17.jpg", size: "F" , style_area : "2"},
                { name: "俏皮工裝口袋短褲", price: "The Ladywore / $531", image: "product18.jpg", size: "F" , style_area : "2"},
                { name: "防潑水機能衝鋒外套", price: "The Ladywore / $790", image: "product19.jpg" , size: "F", style_area : "2"},
                { name: "工裝背心外套", price: "The Ladywore / $590", image: "product20.jpg", size: "F" , style_area : "2"},
                //product 21-30
                { name: "法式翻領交叉短版襯衫", price: "Air Space / $690", image: "product21.jpg" , size: "S", style_area : "3"},
                { name: "法式直紋側鏤空短洋裝", price: "Air Space / $990", image: "product22.jpg", size: "L" , style_area : "3"},
                { name: "慵懶法式袖針織上衣", price: "Air Space / $590", image: "product23.jpg", size: "M", style_area : "3" },
                { name: "法式翻領直紋撞色襯衫", price: "Air Space / $1080", image: "product24.jpg" , size: "F", style_area : "3"},
                { name: "側拉鍊法蘭絨短裙", price: "Air Space / $690", image: "product25.jpg" , size: "L", style_area : "3"},
                { name: "法式翻領毛呢短洋裝(附墊肩)", price: "Air Space / $1380", image: "product26.jpg" , size: "M", style_area : "3"},
                { name: "法式方領格紋短洋裝", price: "Air Space / $790", image: "product27.jpg", size: "S" , style_area : "3"},
                { name: "氣質法式泡泡袖上衣", price: "The Ladywore / $590", image: "product28.jpg" , size: "F", style_area : "3"},
                { name: "法式慵懶風麻花針織衫", price: "The Ladywore / $790", image: "product29.jpg" , size: "F", style_area : "3"},
                { name: "法式挺料小洋裝", price: "The Ladywore / $790", image: "product30.jpg", size: "F" , style_area : "3"},
                //product 31-40
                { name: "海洋系海星貝殼上衣", price: "Air Space / $490", image: "product31.jpg", size: "S" , style_area : "4"},
                { name: "配色條紋短版針織背心", price: "Air Space / $490", image: "product32.jpg" , size: "F", style_area : "4"},
                { name: "甜美澎袖方領百褶上衣", price: "Air Space / $790", image: "product33.jpg" , size: "M", style_area : "4"},
                { name: "鏤空愛心圓領上衣", price: "Air Space / $390", image: "product34.jpg" , size: "L", style_area : "4"},
                { name: "平口層次荷葉邊上衣(附胸墊)", price: "Air Space / $690", image: "product35.jpg", size: "S" , style_area : "4"},
                { name: "ESTHER BUNNY聯名針織背心", price: "The Ladywore / $490", image: "product36.jpg" , size: "F", style_area : "4"},
                { name: "無袖方領牛仔背心", price: "The Ladywore / $550", image: "product37.jpg" , size: "F", style_area : "4"},
                { name: "小紅帽咻咻熊短版上衣", price: "Queen Shop / $431", image: "product38.jpg" , size: "F", style_area : "4"},
                { name: "三角緹花透膚細肩背心", price: "Queen Shop / $431", image: "product39.jpg" , size: "F", style_area : "4"},
                { name: "澎澎雙層紗造型細肩透膚外搭上衣", price: "Queen Shop / $519", image: "product40.jpg" , size: "F", style_area : "4"},
                //product 41-50
                { name: "簡約挖肩荷葉邊羅紋上衣", price: "Air Space / $490", image: "product41.jpg", size: "L" , style_area : "5"},
                { name: "V領棉質法式袖上衣", price: "Air Space / $690", image: "product42.jpg" , size: "S", style_area : "5"},
                { name: "透膚拼接鏤空長版襯衫", price: "Air Space / $990", image: "product43.jpg" , size: "M", style_area : "5"},
                { name: "溫柔雪紡澎袖上衣", price: "Air Space / $348", image: "product44.jpg" , size: "S", style_area : "5"},
                { name: "溫柔方格毛呢套裝", price: "Air Space / $499", image: "product45.jpg" , size: "L", style_area : "5"},
                { name: "燈籠袖開釦棉上衣", price: "The Ladywore / $590", image: "product46.jpg" , size: "F", style_area : "5"},
                { name: "鮮奶茶格紋翻領針織T", price: "The Ladywore / $590", image: "product47.jpg" , size: "F", style_area : "5"},
                { name: "蕾絲雪紡短袖上衣", price: "The Ladywore / $590", image: "product48.jpg" , size: "F", style_area : "5"},
                { name: "小清新雙綁帶外搭上衣", price: "The Ladywore / $490", image: "product49.jpg" , size: "F", style_area : "5"},
                { name: "甜美泡泡格紋方領上衣", price: "The Ladywore / $490", image: "product50.jpg" , size: "F", style_area : "5"},
                //product 51-60
                { name: "休閒彈性側開岔背心洋裝", price: "Queen Shop / $431", image: "product51.jpg" , size: "F", style_area : "6"},
                { name: "休閒連帽短版衛衣外套", price: "Queen Shop / $607", image: "product52.jpg" , size: "F", style_area : "6"},
                { name: "休閒太空棉澎袖設計短版上衣", price: "Queen Shop / $431", image: "product53.jpg" , size: "F", style_area : "6"},
                { name: "休閒素面連袖側開衩洋裝", price: "Queen Shop / $607", image: "product54.jpg" , size: "F", style_area : "6"},
                { name: "休閒圓領前剪接設計素面洋裝", price: "Queen Shop / $607", image: "product55.jpg" , size: "F", style_area : "6"},
                { name: "半拉鍊休閒針織上衣", price: "Air Space / $1080", image: "product56.jpg" , size: "F", style_area : "6"},
                { name: "休閒字母印花上衣", price: "Air Space / $890", image: "product57.jpg" , size: "M", style_area : "6"},
                { name: "休閒網眼洞洞針織衫", price: "Air Space / $790", image: "product58.jpg" , size: "F", style_area : "6"},
                { name: "毛巾布寬肩背心(附胸墊)", price: "Air Space / $490", image: "product59.jpg" , size: "S", style_area : "6"},
                { name: "韓系休閒短棒球外套", price: "The Ladywore / $890", image: "product60.jpg", size: "F" , style_area : "6"},
                //product 61-70
                { name: "不對稱短版背心(附胸墊)", price: "Air Space / $490", image: "product61.jpg" , size: "S", style_area : "7"},
                { name: "休閒V領滾邊上衣(附胸墊)", price: "Air Space / $590", image: "product62.jpg" , size: "M", style_area : "7"},
                { name: "簡約線條針織背心長洋裝", price: "Air Space / $790", image: "product63.jpg", size: "S" , style_area : "7"},
                { name: "不對稱滾邊羅紋上衣", price: "Air Space / $390", image: "product64.jpg" , size: "M", style_area : "7"},
                { name: "性感V領針織背心", price: "Air Space / $390", image: "product65.jpg" , size: "L", style_area : "7"},
                { name: "簡約百搭繞頸Bra Top", price: "The Ladywore / $351", image: "product66.jpg", size: "F" , style_area : "7"},
                { name: "美式小辣風翻領上衣", price: "The Ladywore / $390", image: "product67.jpg" , size: "F", style_area : "7"},
                { name: "合身大方領短袖上衣", price: "The Ladywore / $390", image: "product68.jpg" , size: "F", style_area : "7"},
                { name: "高領五分短T", price: "The Ladywore / $390", image: "product69.jpg" , size: "F", style_area : "7"},
                { name: "仿襯衫黑條短袖短T", price: "The Ladywore / $490", image: "product70.jpg", size: "F" , style_area : "7"},
                //product 71-80
                { name: "復古翻領收腰短袖襯衫", price: "Air Space / $590", image: "product71.jpg" , size: "S", style_area : "8"},
                { name: "復古刷色寬鬆襯衫", price: "Air Space / $990", image: "product72.jpg" , size: "F", style_area : "8"},
                { name: "復古麻花針織上衣", price: "Air Space / $990", image: "product73.jpg" , size: "M", style_area : "8"},
                { name: "復古方領皺皺墊肩上衣", price: "Air Space / $590", image: "product74.jpg" , size: "L", style_area : "8"},
                { name: "法式復古領修身短洋裝", price: "Air Space / $308", image: "product75.jpg" , size: "S", style_area : "8"},
                { name: "復古直紋雙拉鍊針織上衣", price: "Air Space / $790", image: "product76.jpg" , size: "S", style_area : "8"},
                { name: "復古抽鬚牛仔外套(附墊肩)", price: "Air Space / $890", image: "product77.jpg" , size: "L", style_area : "8"},
                { name: "復古直紋雙拉鍊針織上衣", price: "Air Space / $790", image: "product78.jpg", size: "M" , style_area : "8"},
                { name: "復古QQ毛金釦針織外套", price: "The Ladywore / $690", image: "product79.jpg" , size: "F", style_area : "8"},
                { name: "復古菱格紋針織外套", price: "The Ladywore / $490", image: "product80.jpg", size: "F" , style_area : "8"},
                //product 81-90
                { name: "知性小香織紋方領上衣", price: "Air Space / $790", image: "product81.jpg" , size: "S", style_area : "9"},
                { name: "經典小香圓領上衣(附墊肩)", price: "Air Space / $990", image: "product82.jpg" , size: "M", style_area : "9"},
                { name: "小香金鍊千鳥格細肩背心", price: "Air Space / $690", image: "product83.jpg", size: "L", style_area : "9" },
                { name: "小香排釦兩件式襯衫短洋裝", price: "Air Space / $1180", image: "product84.jpg" , size: "M", style_area : "9"},
                { name: "小香珠釦滾邊短版外套", price: "Air Space / $890", image: "product85.jpg" , size: "L", style_area : "9"},
                { name: "小香條紋針織開襟衫", price: "Air Space / $890", image: "product86.jpg", size: "M" , style_area : "9"},
                { name: "小香織紋珠釦背心短洋裝", price: "Air Space / $1080", image: "product87.jpg" , size: "L", style_area : "9"},
                { name: "小香珠釦短洋裝(附胸墊)", price: "Air Space / $990", image: "product88.jpg" , size: "S", style_area : "9"},
                { name: "小香風粗花呢排釦上衣", price: "Air Space / $590", image: "product89.jpg", size: "F" , style_area : "9"},
                { name: "小香復古針織開襟衫", price: "Air Space / $1080", image: "product90.jpg" , size: "M", style_area : "9"},
                //product 91-100
                { name: "側挖空合身長袖上衣", price: "Air Space / $590", image: "product91.jpg" , size: "S", style_area : "10"},
                { name: "木耳捲羅紋配色上衣", price: "Air Space / $390", image: "product92.jpg", size: "L", style_area : "10" },
                { name: "單肩針織上衣(附胸墊)", price: "Air Space / $590", image: "product93.jpg" , size: "M", style_area : "10"},
                { name: "不對稱性感鏤空柔滑上衣", price: "Air Space / $590", image: "product94.jpg", size: "L" , style_area : "10"},
                { name: "撞色性感排釦上衣", price: "Air Space / $490", image: "product95.jpg" , size: "M", style_area : "10"},
                { name: "AiR零著感羅紋拉鍊細肩BRA TOP", price: "Air Space / $590", image: "product96.jpg", size: "S" , style_area : "10"},
                { name: "爆乳輕絨排釦短版發熱BRA TOP", price: "Air Space / $590", image: "product97.jpg" , size: "M", style_area : "10"},
                { name: "爆乳V領輕絨發熱BRA TOP", price: "Air Space / $590", image: "product98.jpg" , size: "L", style_area : "10"},
                { name: "零著感舒適爆乳金鍊BRA TOP", price: "Air Space / $590", image: "product99.jpg" , size: "M", style_area : "10"},
                { name: "爆乳輕絨V領挖肩短版發熱BRA TOP", price: "Air Space / $690", image: "product100.jpg" , size: "L", style_area : "10"}
                ];

            // Function to generate product HTML
            function generateProductHTML(product) {
                return `

                    <div class="product">
                        <img src="img/clothes/${product.image}" alt="${product.name}">
                        <h4>${product.name}</h4>
                        <p>${product.price}</p>
                        <form action="tryproduct.php" method="get">
                            <input type="hidden" name="product_image" value="${product.image}">
                            <button type="submit" class="view-details">View Details</button>
                        </form>
                    </div>
                `;
            }

            // Function to add products to a section
            function addProductsToSection(sectionId, products) {
                var section = document.getElementById(sectionId);
                var productList = section.querySelector(".product-list");
                products.forEach(function(product) {
                    productList.innerHTML += generateProductHTML(product);
                });
            }

            // Divide products into sections (each section contains 10 products)
            var sectionCount = Math.ceil(products.length / 10);
            for (var i = 0; i < products.length; i++) {
                var product = products[i];
                var styleArea = product.style_area; // 假設產品物件有一個style_area屬性

                // 確定該產品應該添加到哪個部分
                var sectionId = "section" + styleArea;
                var sectionIndex = parseInt(styleArea) - 1;

                // 檢查部分索引是否超出範圍
                if (sectionIndex >= 0 && sectionIndex < sectionCount) {
                    var sectionProducts = [product]; // 單獨一個產品陣列
                    addProductsToSection(sectionId, sectionProducts);
                }
            }

            // Function to scroll to the top when the button is clicked
            function scrollToTop() {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            }

            // Function to scroll to a section
            function scrollToSection(sectionId) {
                var section = document.getElementById(sectionId);
                section.scrollIntoView({ behavior: 'smooth' });
            }

            function filterProductsBySize() {
                var sizeFilter = document.getElementById("size-filter");
                var selectedSize = sizeFilter.value;
                var productsToShow = [];

                if (selectedSize === "all") {
                    // 如果選擇了 "全部"，則顯示所有商品
                    productsToShow = products;
                } else {
                    // 否則，僅顯示選擇尺寸的商品
                    productsToShow = products.filter(function(product) {
                        return product.size === selectedSize;
                    });
                }

                // 清空所有部分中的商品列表
                var allProductLists = document.querySelectorAll(".product-list");
                allProductLists.forEach(function(productList) {
                    productList.innerHTML = "";
                });

                // 將篩選後的商品添加到相應的部分中
                for (var i = 0; i < productsToShow.length; i++) {
                    var product = productsToShow[i];
                    var styleArea = product.style_area; // 從 product 物件中提取 style_area 屬性

                    // 確定該產品應該添加到哪個部分
                    var sectionId = "section" + styleArea;
                    var sectionIndex = parseInt(styleArea) - 1;

                    // 檢查部分索引是否超出範圍
                    if (sectionIndex >= 0 && sectionIndex < sectionCount) {
                        var sectionProducts = [product]; // 單獨一個產品陣列
                        addProductsToSection(sectionId, sectionProducts);
                    }
                }
            }
        </script>
    </body>
</html>