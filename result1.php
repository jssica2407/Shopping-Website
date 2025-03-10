<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>問題發送成功 | EasyWear</title>
    </head>

    <body>
        <?php
        include 'customMenu.php';
        echo "<p style=\"font-size:25px;text-align: center;\"><b>感謝您提出的問題! 我們會盡快為您提供服務和改善~</b></p>";

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
        $sql_create_table = 'CREATE TABLE IF NOT EXISTS CustomerReply (
            id INT(10) AUTO_INCREMENT PRIMARY KEY,
            customername VARCHAR(25) NOT NULL,
            email VARCHAR(30) NOT NULL,
            gender VARCHAR(2) NOT NULL,
            content VARCHAR(900) NOT NULL
            )';
            
        if($conn->query($sql_create_table)!==TRUE) {
            echo "創建失敗" ,$conn->error;
        }

        $customername = $_POST["customername"];
        $email = $_POST["email"];
        $gender = $_POST["gender"];
        $content = $_POST["content"];

        // 使用预备语句来防止 SQL 注入攻击
        $stmt = $conn->prepare("INSERT INTO CustomerReply (`customername`, `email`, `gender`, `content`) VALUES (?, ? , ? , ?)");
        $stmt->bind_param("ssss", $customername, $email, $gender, $content);

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