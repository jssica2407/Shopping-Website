<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>EasyWear Database</title>
    </head>

    <body>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "5253";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password);
        
        // Check connection
        if(!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        echo "Connected successfully<br/>";

        // Create database
        $sql = "CREATE DATABASE IF NOT EXISTS EasyWear";

        if (mysqli_query($conn, $sql)) {
            echo "Database created successfully<br/>";
        } else {
            echo "Error creating database: " . mysqli_error($conn) . "<br/>";
        }

        // Create connection
        $dbname = "EasyWear";
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        echo "Connected successfully<br/>";

        // Create table
        $sql = "CREATE TABLE IF NOT EXISTS MyProducts (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                cloth_name VARCHAR(30) NOT NULL,
                cloth_price INT NOT NULL,
                cloth_store VARCHAR(30) NOT NULL,
                cloth_image VARCHAR(100), /* Change BLOB to VARCHAR for image path */
                cloth_description VARCHAR(800) NOT NULL,
                cloth_quantity INT NOT NULL,
                cloth_size VARCHAR(4) NOT NULL,
                reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                )";

        if (mysqli_query($conn, $sql)) {
            echo "Table MyProducts created successfully<br/>";
        } else {
            echo "Error creating table:" . mysqli_error($conn);
        }

        // Insert multiple data
        $sql = "INSERT INTO MyProducts (cloth_name, cloth_price, cloth_store, cloth_image, cloth_description, cloth_quantity, cloth_size) VALUES 
                /*product 1-10*/
                ('立體蕾絲波紋層次造型細肩洋裝', 695, 'Queen Shop', 'product1.jpg', '特殊暈染印花造型細肩洋裝，選用親膚柔軟的舒適布料，立體蕾絲波紋造型增添整體層次感。可調式肩帶可依個人習慣去調整。抽鬚式裙擺營造春日輕柔飄逸美。簡單單穿，穿出質感日系LOOK！', 100, 'F'),
                ('後綁帶打褶排釦背心洋裝', 607, 'Queen Shop', 'product2.jpg', '背心洋裝後綁帶設計，打褶排釦，展現優雅女性的優美線條', 210, 'F'),
                ('雙層設計細肩綁帶蛋糕網紗長洋裝', 607, 'Queen Shop', 'product3.jpg', '雙層設計細肩綁帶，搭配蛋糕網紗長洋裝，簡約時尚。', 170, 'F'),
                ('後綁帶斜剪接裙襬洋裝', 345, 'Queen Shop', 'product4.jpg', '後綁帶斜剪接裙襬洋裝，優雅大氣，讓你充滿自信。', 180, 'F'),
                ('簍空編織寬版長袖罩衫', 519, 'Queen Shop', 'product5.jpg', '簍空編織寬版長袖罩衫，時尚又實用，是日常穿搭的不二選擇。', 100, 'F'),
                ('透肌感細坑條針織衫', 531, 'The Ladywore', 'product6.jpg', '透肌感細坑條針織衫，柔軟舒適，質感出眾。', 100, 'F'),
                ('立體格紋針織衣', 590, 'The Ladywore', 'product7.jpg', '立體格紋針織衣，時尚個性，展現你的獨特品味。', 130, 'F'),
                ('俐落感滑料襯衫', 490, 'The Ladywore', 'product8.jpg', '俐落感滑料襯衫，剪裁合身，讓你穿出自信與魅力。', 90, 'F'),
                ('麻花紋圓領背心', 590, 'The Ladywore', 'product9.jpg', '麻花紋圓領背心，清新自然，展現優雅氣質。', 140, 'F'),
                ('造型感大翻領針織上衣', 690, 'The Ladywore', 'product10.jpg', '造型感大翻領針織上衣，設計新穎，時尚百搭。', 100, 'F'),
                /*product 11-20*/
                ('素色多口袋設計寬版上衣', 510, 'Queen Shop', 'product11.jpg', '這款寬版上衣採用素色設計，適合各種場合穿著，擁有多口袋設計，方便攜帶小物品。', 200, 'F'),
                ('無領造型寬版水洗牛仔襯衫', 598, 'Queen Shop', 'product12.jpg', '這款牛仔襯衫採用水洗工藝，質感柔軟舒適，寬版設計更顯休閒時尚。', 150, 'F'),
                ('半開襟排釦設計鬆餅格連帽上衣', 390, 'Queen Shop', 'product13.jpg', '這款連帽上衣採用半開襟排釦設計，搭配鬆餅格紋，增添時尚感，適合日常穿搭。', 180, 'F'),
                ('單口袋異材質拼接設計上衣', 598, 'Queen Shop', 'product14.jpg', '這款上衣採用異材質拼接設計，獨特而時尚，單口袋設計增添了實用性。', 220, 'F'),
                ('半門襟撞色拼接設計上衣', 340, 'Queen Shop', 'product15.jpg', '這款上衣採用半門襟撞色拼接設計，簡潔而個性，適合多種場合穿著。', 180, 'F'),
                ('奶灰色雙口袋飛行外套', 711, 'The Ladywore', 'product16.jpg', '這款飛行外套以奶灰色為主調，雙口袋設計增添了實用性，時尚又實用。', 120, 'F'),
                ('刷布背心', 531, 'The Ladywore', 'product17.jpg', '這款刷布背心設計簡潔大方，質感柔軟舒適，是夏季必備單品。', 160, 'F'),
                ('俏皮工裝口袋短褲', 531, 'The Ladywore', 'product18.jpg', '這款工裝口袋短褲採用俏皮設計，實用又時尚，適合各種休閒場合穿著。', 180, 'F'),
                ('防潑水機能衝鋒外套', 790, 'The Ladywore', 'product19.jpg', '這款衝鋒外套具有防潑水功能，適合戶外活動穿著，實用又時尚。', 100, 'F'),
                ('工裝背心外套', 590, 'The Ladywore', 'product20.jpg', '這款工裝背心外套設計簡約大方，適合日常穿搭，實用又百搭。', 200, 'F'),
                /*product 21-30*/
                ('法式翻領交叉短版襯衫', 690, 'Air Space', 'product21.jpg', '這款襯衫具有法式翻領交叉設計，簡潔而時尚，適合各種正式或休閒場合穿著。', 150, 'S'),
                ('法式直紋側鏤空短洋裝', 990, 'Air Space', 'product22.jpg', '這款短洋裝採用法式直紋設計，側鏤空設計增添了時尚感，適合各種場合穿著。', 150, 'L'),
                ('慵懶法式袖針織上衣', 590, 'Air Space', 'product23.jpg', '這款上衣擁有慵懶法式袖設計，針織材質柔軟舒適，搭配休閒褲或裙子都很適合。', 200, 'M'),
                ('法式翻領直紋撞色襯衫', 1080, 'Air Space', 'product24.jpg', '這款襯衫具有法式翻領設計，撞色直紋增添了時尚感，適合正式或休閒穿搭。', 180, 'F'),
                ('側拉鍊法蘭絨短裙', 690, 'Air Space', 'product25.jpg', '這款短裙採用側拉鍊設計，法蘭絨材質柔軟舒適，搭配各種上衣都很時尚。', 220, 'L'),
                ('法式翻領毛呢短洋裝(附墊肩)', 1380, 'Air Space', 'product26.jpg', '這款毛呢短洋裝具有法式翻領設計，附墊肩設計增添了層次感，適合秋冬季節穿著。', 180, 'M'),
                ('法式方領格紋短洋裝', 790, 'Air Space', 'product27.jpg', '這款短洋裝具有法式方領設計，格紋圖案增添了復古氣息，適合搭配各種外套。', 160, 'S'),
                ('氣質法式泡泡袖上衣', 590, 'The Ladywore', 'product28.jpg', '這款上衣擁有氣質法式泡泡袖設計，簡約大方，適合多種場合穿著。', 200, 'F'),
                ('法式慵懶風麻花針織衫', 790, 'The Ladywore', 'product29.jpg', '這款針織衫擁有法式慵懶風設計，麻花紋飾增添了時尚感，適合搭配牛仔褲或裙子。', 150, 'F'),
                ('法式挺料小洋裝', 790, 'The Ladywore', 'product30.jpg', '這款小洋裝採用挺料設計，簡約大方，適合各種場合穿著，搭配外套更加時尚。', 180, 'F'),
                /*product 31-40*/
                ('海洋系海星貝殼上衣', 490, 'Air Space', 'product31.jpg', '這款上衣具有海洋系海星貝殼圖案，清新可愛，適合夏季穿搭。', 200, 'S'),
                ('配色條紋短版針織背心', 490, 'Air Space', 'product32.jpg', '這款針織背心採用配色條紋設計，簡約大方，搭配褲裙都很時尚。', 180, 'F'),
                ('甜美澎袖方領百褶上衣', 790, 'Air Space', 'product33.jpg', '這款上衣擁有甜美澎袖和方領設計，百褶裙部分增添了俏皮感，適合各種場合穿著。', 220, 'M'),
                ('鏤空愛心圓領上衣', 390, 'Air Space', 'product34.jpg', '這款上衣具有鏤空愛心設計，簡約而個性，適合日常搭配。', 180, 'L'),
                ('平口層次荷葉邊上衣(附胸墊)', 690, 'Air Space', 'product35.jpg', '這款上衣採用平口層次荷葉邊設計，附胸墊增添了豐滿感，適合搭配各種下身單品。', 220, 'S'),
                ('ESTHER BUNNY聯名針織背心', 490, 'The Ladywore', 'product36.jpg', '這款針織背心是ESTHER BUNNY聯名款，獨特而時尚，搭配牛仔褲或裙子都很適合。', 160, 'F'),
                ('無袖方領牛仔背心', 550, 'The Ladywore', 'product37.jpg', '這款牛仔背心具有無袖方領設計，簡約大方，適合夏季穿搭。', 180, 'F'),
                ('小紅帽咻咻熊短版上衣', 431, 'Queen Shop', 'product38.jpg', '這款上衣具有小紅帽咻咻熊圖案，可愛俏皮，適合年輕女生穿搭。', 200, 'F'),
                ('三角緹花透膚細肩背心', 431, 'Queen Shop', 'product39.jpg', '這款背心採用三角緹花設計，透膚細肩設計增添了性感感，適合夏季穿搭。', 180, 'F'),
                ('澎澎雙層紗造型細肩透膚外搭上衣', 519, 'Queen Shop', 'product40.jpg', '這款上衣採用澎澎雙層紗造型設計，透膚外搭設計增添了性感感，適合搭配各種單品。', 180, 'F'),
                /*product 41-50*/
                ('簡約挖肩荷葉邊羅紋上衣', 490, 'Air Space', 'product41.jpg', '這款上衣採用簡約挖肩設計，搭配荷葉邊羅紋，展現優雅氣質，適合日常穿搭。', 180, 'L'),
                ('V領棉質法式袖上衣', 690, 'Air Space', 'product42.jpg', '這款上衣採用V領設計，搭配法式袖，簡約時尚，適合各種場合穿著。', 220, 'S'),
                ('透膚拼接鏤空長版襯衫', 990, 'Air Space', 'product43.jpg', '這款襯衫採用透膚拼接和鏤空設計，獨特時尚，搭配牛仔褲或裙子都很適合。', 200, 'M'),
                ('溫柔雪紡澎袖上衣', 348, 'Air Space', 'product44.jpg', '這款上衣採用溫柔雪紡材質，搭配澎袖設計，清新優雅，適合夏季穿搭。', 180, 'S'),
                ('溫柔方格毛呢套裝', 499, 'Air Space', 'product45.jpg', '這套裝採用溫柔方格毛呢材質，簡約大方，適合辦公室或日常穿搭。', 220, 'L'),
                ('燈籠袖開釦棉上衣', 590, 'The Ladywore', 'product46.jpg', '這款上衣具有燈籠袖和開釦設計，個性時尚，適合休閒或派對穿搭。', 180, 'F'),
                ('鮮奶茶格紋翻領針織T', 590, 'The Ladywore', 'product47.jpg', '這款針織T恤具有鮮奶茶格紋和翻領設計，甜美可愛，適合日常休閒穿搭。', 200, 'F'),
                ('蕾絲雪紡短袖上衣', 590, 'The Ladywore', 'product48.jpg', '這款上衣採用蕾絲雪紡材質，短袖設計，優雅時尚，適合搭配牛仔褲或裙子。', 180, 'F'),
                ('小清新雙綁帶外搭上衣', 490, 'The Ladywore', 'product49.jpg', '這款上衣具有小清新風格，雙綁帶設計，可愛俏皮，適合夏季穿搭。', 220, 'F'),
                ('甜美泡泡格紋方領上衣', 490, 'The Ladywore', 'product50.jpg', '這款上衣具有甜美泡泡格紋和方領設計，清新可愛，適合夏季穿搭。', 200, 'F'),
                /*product 51-60*/
                ('休閒彈性側開岔背心洋裝', 431, 'Queen Shop', 'product51.jpg', '這款洋裝採用彈性布料，側開岔設計，休閒時尚，適合日常穿搭。', 180, 'F'),
                ('休閒連帽短版衛衣外套', 607, 'Queen Shop', 'product52.jpg', '這款衛衣外套具有連帽和短版設計，休閒時尚，適合運動或日常穿搭。', 200, 'F'),
                ('休閒太空棉澎袖設計短版上衣', 431, 'Queen Shop', 'product53.jpg', '這款上衣採用太空棉材質，澎袖設計，休閒時尚，適合日常穿搭。', 180, 'F'),
                ('休閒素面連袖側開衩洋裝', 607, 'Queen Shop', 'product54.jpg', '這款洋裝採用素面連袖和側開衩設計，休閒舒適，適合各種場合穿搭。', 220, 'F'),
                ('休閒圓領前剪接設計素面洋裝', 607, 'Queen Shop', 'product55.jpg', '這款洋裝具有圓領和前剪接設計，簡約大方，適合日常穿搭或辦公室穿搭。', 220, 'F'),
                ('半拉鍊休閒針織上衣', 1080, 'Air Space', 'product56.jpg', '這款針織上衣具有半拉鍊設計，休閒時尚，適合搭配牛仔褲或長裙。', 180, 'F'),
                ('休閒字母印花上衣', 890, 'Air Space', 'product57.jpg', '這款上衣具有字母印花設計，休閒時尚，適合日常休閒穿搭。', 200, 'M'),
                ('休閒網眼洞洞針織衫', 790, 'Air Space', 'product58.jpg', '這款針織衫具有網眼洞洞設計，休閒時尚，適合夏季搭配。', 180, 'F'),
                ('毛巾布寬肩背心(附胸墊)', 490, 'Air Space', 'product59.jpg', '這款寬肩背心採用毛巾布材質，附胸墊，舒適時尚，適合運動或休閒穿搭。', 220, 'S'),
                ('韓系休閒短棒球外套', 890, 'The Ladywore', 'product60.jpg', '這款外套具有韓系風格，短版設計，休閒時尚，適合日常穿搭。', 200, 'F'),
                /*product 61-70*/
                ('不對稱短版背心(附胸墊)', 490, 'Air Space', 'product61.jpg', '這款背心採用不對稱設計，附胸墊，簡約時尚，適合夏季穿搭。', 180, 'S'),
                ('休閒V領滾邊上衣(附胸墊)', 590, 'Air Space', 'product62.jpg', '這款上衣採用V領和滾邊設計，附胸墊，休閒時尚，適合日常穿搭。', 200, 'M'),
                ('簡約線條針織背心長洋裝', 790, 'Air Space', 'product63.jpg', '這款背心長洋裝採用簡約線條針織，舒適時尚，適合日常穿搭。', 180, 'S'),
                ('不對稱滾邊羅紋上衣', 390, 'Air Space', 'product64.jpg', '這款上衣具有不對稱滾邊設計，時尚個性，適合搭配牛仔褲或長裙。', 220, 'M'),
                ('性感V領針織背心', 390, 'Air Space', 'product65.jpg', '這款針織背心具有性感V領設計，展現迷人曲線，適合夏季搭配。', 200, 'L'),
                ('簡約百搭繞頸Bra Top', 351, 'The Ladywore', 'product66.jpg', '這款Bra Top採用簡約百搭繞頸設計，舒適時尚，適合運動或日常穿搭。', 220, 'F'),
                ('美式小辣風翻領上衣', 390, 'The Ladywore', 'product67.jpg', '這款上衣具有美式小辣風翻領設計，展現個性時尚，適合日常休閒穿搭。', 200, 'F'),
                ('合身大方領短袖上衣', 390, 'The Ladywore', 'product68.jpg', '這款上衣具有合身大方領和短袖設計，簡約時尚，適合日常穿搭。', 180, 'F'),
                ('高領五分短T', 390, 'The Ladywore', 'product69.jpg', '這款短T恤具有高領設計，舒適時尚，適合搭配牛仔褲或短裙。', 200, 'F'),
                ('仿襯衫黑條短袖短T', 490, 'The Ladywore', 'product70.jpg', '這款短T恤仿襯衫黑條設計，時尚休閒，適合日常穿搭。', 160, 'F'),
                /*product 71-80*/
                ('復古翻領收腰短袖襯衫', 590, 'Air Space', 'product71.jpg', '這款襯衫具有復古翻領和收腰設計，展現復古風情，適合搭配牛仔褲或短裙。', 180, 'S'),
                ('復古刷色寬鬆襯衫', 990, 'Air Space', 'product72.jpg', '這款襯衫具有復古刷色設計，寬鬆版型，時尚百搭，適合各種場合穿搭。', 220, 'F'),
                ('復古麻花針織上衣', 990, 'Air Space', 'product73.jpg', '這款針織上衣具有復古麻花設計，舒適保暖，適合秋冬季節穿搭。', 200, 'M'),
                ('復古方領皺皺墊肩上衣', 590, 'Air Space', 'product74.jpg', '這款上衣具有復古方領和皺皺設計，簡約時尚，適合日常休閒穿搭。', 180, 'L'),
                ('法式復古領修身短洋裝', 308, 'Air Space', 'product75.jpg', '這款洋裝具有法式復古領設計，修身版型，優雅時尚，適合各種場合穿搭。', 240, 'S'),
                ('復古直紋雙拉鍊針織上衣', 790, 'Air Space', 'product76.jpg', '這款針織上衣具有復古直紋和雙拉鍊設計，個性時尚，適合搭配牛仔褲或長裙。', 200, 'S'),
                ('復古抽鬚牛仔外套(附墊肩)', 890, 'Air Space', 'product77.jpg', '這款牛仔外套具有復古抽鬚設計，附墊肩，個性時尚，適合春秋季節穿搭。', 220, 'L'),
                ('復古直紋雙拉鍊針織上衣', 790, 'Air Space', 'product78.jpg', '這款針織上衣具有復古直紋和雙拉鍊設計，個性時尚，適合搭配牛仔褲或長裙。', 200, 'M'),
                ('復古QQ毛金釦針織外套', 690, 'The Ladywore', 'product79.jpg', '這款針織外套具有復古QQ毛金釦設計，保暖時尚，適合秋冬季節穿搭。', 220, 'F'),
                ('復古菱格紋針織外套', 490, 'The Ladywore', 'product80.jpg', '這款針織外套具有復古菱格紋設計，舒適時尚，適合春秋季節穿搭。', 200, 'F'),
                /*product 81-90*/
                ('知性小香織紋方領上衣', 790, 'Air Space', 'product81.jpg', '這款上衣具有知性小香織紋和方領設計，優雅時尚，適合辦公室或約會穿搭。', 220, 'S'),
                ('經典小香圓領上衣(附墊肩)', 990, 'Air Space', 'product82.jpg', '這款上衣具有經典小香圓領設計，附墊肩，優雅時尚，適合各種場合穿搭。', 240, 'M'),
                ('小香金鍊千鳥格細肩背心', 690, 'Air Space', 'product83.jpg', '這款背心具有小香金鍊和千鳥格設計，優雅時尚，適合搭配寬褲或長裙。', 200, 'L'),
                ('小香排釦兩件式襯衫短洋裝', 1180, 'Air Space', 'product84.jpg', '這款短洋裝具有小香排釦和兩件式襯衫設計，優雅時尚，適合正式場合穿搭。', 260, 'M'),
                ('小香珠釦滾邊短版外套', 890, 'Air Space', 'product85.jpg', '這款外套具有小香珠釦和滾邊設計，時尚大方，適合搭配裙子或褲子。', 220, 'L'),
                ('小香條紋針織開襟衫', 890, 'Air Space', 'product86.jpg', '這款開襟衫具有小香條紋針織設計，時尚大方，適合搭配褲子或裙子。', 220, 'M'),
                ('小香織紋珠釦背心短洋裝', 1080, 'Air Space', 'product87.jpg', '這款短洋裝具有小香織紋和珠釦設計，優雅時尚，適合各種場合穿搭。', 240, 'L'),
                ('小香珠釦短洋裝(附胸墊)', 990, 'Air Space', 'product88.jpg', '這款短洋裝具有小香珠釦設計，附胸墊，優雅時尚，適合正式場合穿搭。', 240, 'S'),
                ('小香風粗花呢排釦上衣', 590, 'Air Space', 'product89.jpg', '這款上衣具有小香風和粗花呢排釦設計，簡約時尚，適合日常休閒穿搭。', 180, 'F'),
                ('小香復古針織開襟衫', 1080, 'Air Space', 'product90.jpg', '這款開襟衫具有小香復古針織設計，保暖時尚，適合秋冬季節穿搭。', 240, 'M'),
                /*product 91-100*/
                ('側挖空合身長袖上衣', 590, 'Air Space', 'product91.jpg', '這款上衣具有側挖空設計，合身版型，展現優美曲線，適合搭配各種下身。', 180, 'S'),
                ('木耳捲羅紋配色上衣', 390, 'Air Space', 'product92.jpg', '這款上衣具有木耳捲和羅紋配色設計，時尚個性，適合日常休閒穿搭。', 160, 'L'),
                ('單肩針織上衣(附胸墊)', 590, 'Air Space', 'product93.jpg', '這款上衣具有單肩針織設計，附胸墊，個性時尚，適合搭配各種下身。', 180, 'M'),
                ('不對稱性感鏤空柔滑上衣', 590, 'Air Space', 'product94.jpg', '這款上衣具有不對稱性感和鏤空柔滑設計，展現優美線條，適合派對或約會穿搭。', 200, 'L'),
                ('撞色性感排釦上衣', 490, 'Air Space', 'product95.jpg', '這款上衣具有撞色性感和排釦設計，時尚個性，適合搭配牛仔褲或短裙。', 180, 'M'),
                ('AiR零著感羅紋拉鍊細肩BRA TOP', 590, 'Air Space', 'product96.jpg', '這款BRA TOP具有AiR零著感羅紋和拉鍊設計，舒適時尚，適合運動或休閒穿搭。', 200, 'S'),
                ('爆乳輕絨排釦短版發熱BRA TOP', 590, 'Air Space', 'product97.jpg', '這款BRA TOP具有爆乳輕絨和排釦設計，發熱保暖，適合秋冬季節穿搭。', 200, 'M'),
                ('爆乳V領輕絨發熱BRA TOP', 590, 'Air Space', 'product98.jpg', '這款BRA TOP具有爆乳V領和輕絨設計，發熱保暖，時尚舒適。', 200, 'L'),
                ('零著感舒適爆乳金鍊BRA TOP', 590, 'Air Space', 'product99.jpg', '這款BRA TOP具有零著感舒適和爆乳金鍊設計，時尚個性，適合搭配牛仔褲或裙子。', 220, 'M'),
                ('爆乳輕絨V領挖肩短版發熱BRA TOP', 690, 'Air Space', 'product100.jpg', '這款BRA TOP具有爆乳輕絨和V領挖肩設計，發熱保暖，展現時尚魅力。', 220, 'L')";

        if (mysqli_query($conn, $sql)) {
            echo "New records created successfully<br/>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        // Create table
        $sql = "CREATE TABLE IF NOT EXISTS PurchaseRecord(
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                goods_name VARCHAR(30) NOT NULL,
                goods_quantity INT NOT NULL,
                goods_total_cost INT NOT NULL,
                reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                )";

        if (mysqli_query($conn, $sql)) {
            echo "Table PurchaseRecord created successfully<br/>";
        } else {
            echo "Error creating table:" . mysqli_error($conn);
        }

        mysqli_close($conn);
        ?>
    </body>
</html>