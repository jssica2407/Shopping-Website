<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>意見發送成功 | EasyWear</title>
    </head>

    <body>
        <?php
        include 'customMenu.php';
        echo "<p style=\"font-size:25px;text-align: center;\"><b>感謝您的意見回饋! 您的意見使我們不斷地改善~</b></p>";

        $servername = "localhost";
        $username = "root";
        $password = "5253";
        $dbname = "EasyWear";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        // Check connection
        if(!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Create table
        $sql_create_table = 'CREATE TABLE IF NOT EXISTS Feedback (
            id INT(10) AUTO_INCREMENT PRIMARY KEY,
            topic INT(5) NOT NULL,
            content VARCHAR(900) NOT NULL
            )';
            
        if($conn->query($sql_create_table)!==TRUE) {
            echo "創建失敗" ,$conn->error;
        }
    
        $topic = $_POST["topic"];
        $content = $_POST["content"];
    
        // 使用预备语句来防止 SQL 注入攻击
        $stmt = $conn->prepare("INSERT INTO Feedback (`topic`,`content`) VALUES ( ? , ?)");
        $stmt->bind_param("ss", $topic, $content);

        // 执行 SQL 插入    
        if ($stmt->execute() !== TRUE) {
            echo "Error: " . $stmt->error;
        }

        // 关闭连接
        $stmt->close();
        $conn->close();
        ?>
    </body>
</html>