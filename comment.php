<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>評論 | EasyWear</title>
        <link rel="stylesheet" href="comment.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>
        <?php
        include 'customMenu.php';

        // 資料庫連線細節（請使用您的實際認證）
        $servername = "localhost";
        $username = "root";
        $password = "5253";
        $dbname = "EasyWear";

        // 建立連線
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        // 檢查連線
        if($conn->connect_error) {
            die("連線失敗：" . $conn->connect_error);
        }

        $sql_create_table = 'CREATE TABLE IF NOT EXISTS Comments (
        id INT(10) AUTO_INCREMENT PRIMARY KEY,
        names VARCHAR(50) NOT NULL,
        comment VARCHAR(255) ,    
        rating INT(11) NOT NULL,
        created_at DATETIME NOT NULL
        )';

        if($conn->query($sql_create_table)!==TRUE) {
            echo "創建失敗" ,$conn->error;
        }

        // 獲取星級和評論數量數據
        $sql = "SELECT rating, COUNT(*) as count FROM Comments GROUP BY rating ORDER BY rating DESC";
        $result = $conn->query($sql);

        $reviews = array();
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $reviews[] = array(
                'stars' => $row["rating"],
                'count' => $row["count"],
                );
            }
        }

        // 根據檢索到的數據計算平均評分
        $totalReviews = 0;
        $totalRating = 0;
        foreach ($reviews as $review) {
            $totalReviews += $review['count'];
            $totalRating += $review['stars'] * $review['count'];
        }
        $averageRating = $totalReviews > 0 ? round($totalRating / $totalReviews, 1) : 0;

        $conn->close();
        ?>

        <div class="main">
            <div class="heading">使用者評分</div>
                <?php for ($i = 1; $i <= 5; $i++): ?>
                    <span class="fa fa-star <?php echo ($i <= $averageRating) ? 'checked' : ''; ?>"></span>
                <?php endfor; ?>

                <p><?php echo $averageRating; ?> 平均分，基於 <?php echo $totalReviews; ?> 則評論。</p>
                <hr style="border:3px solid #fffceb">

                <div class="row">
                    <?php foreach ($reviews as $review): ?>
                        <div class="side">
                            <div><?php echo $review['stars']."星"; ?></div>
                        </div>
                        
                        <div class="middle">
                            <div class="bar-container">
                                <div class="bar-<?php echo $review['stars']; ?>" style="width: <?php echo ($review['count'] / $totalReviews) * 100; ?>%"></div>
                            </div>
                        </div>
                        
                        <div class="sideright">
                            <div><?php echo $review['count']; ?></div>
                        </div>
                    <?php endforeach;?>
                </div>

                <div class="comment-section">
                    <form class="name-form" action="submit_comment.php" method="POST">
                        <h2>留言</h2>
                        <p>留下你的評分 讓我們能夠不斷改進</p>
                        <div class="rating">
                            <input type="radio" value="5" id="star-5" name="rating">
                            <label for="star-5" title="Amazing">★</label>
                            <input type="radio" value="4" id="star-4" name="rating" >
                            <label for="star-4" title="Very Good">★</label>
                            <input type="radio" value="3" id="star-3" name="rating">
                            <label for="star-3" title="Good">★</label>
                            <input type="radio" value="2" id="star-2" name="rating" >
                            <label for="star-2" title="Okay">★</label>
                            <input type="radio" value="1" id="star-1" name="rating" >
                            <label for="star-1" title="Poor">★</label>
                        </div>
                        <textarea name="names" id="names" placeholder="請輸入您的名字" cols="20" required></textarea>
                        <br>
                        <textarea id="comment" name="comment" placeholder="請輸入您的評論" cols="100" required></textarea>
                        <button type="submit">提交</button>
                    </form>

                    <h3>評論</h3>
                    <ul class="comment-list">
                        <?php
                        // 顯示現有評論
                        $conn = new mysqli($servername, $username, $password, $dbname);
                        $sql = "SELECT names, comment, created_at FROM Comments ORDER BY created_at DESC";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo '<li class="comment-item">';
                                echo '<div class="user-info">';
                                echo '<div class="name-date">';
                                echo '<p class="name">' . htmlspecialchars($row["names"]) . '</p>';
                                echo '<p class="date">' . htmlspecialchars($row["created_at"]) . '</p>';
                                echo '</div>';
                                echo '</div>';
                                echo '<p class="comment">' . htmlspecialchars($row["comment"]) . '</p>';
                                echo '</li>';
                            }
                        } else {
                            echo "尚無評論";
                        }

                        $conn->close();
                        ?>
                    </ul>
                </div>
            </div>                
        </div>
    </body>
</html>