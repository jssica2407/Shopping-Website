<!DOCTYPE html>
<html>
    <body>
        <?php
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

        $names = $_POST["names"];
        $rating = $_POST["rating"];
        $comment = $_POST["comment"];
        $created_at = date("Y-m-d H:i:s");

    
        // 使用预备语句来防止 SQL 注入攻击
        $stmt = $conn->prepare("INSERT INTO Comments (`names`,`rating`,`comment`,`created_at`)VALUES( ? , ? , ? , ?)");
        $stmt->bind_param("siss",$names,$rating,$comment,$created_at);

        // 执行 SQL 插入    
        if ($stmt->execute() !== TRUE) {
            echo "Error: " . $stmt->error;
        }
        header("location: comment.php");
        
        // 关闭连接
        $stmt->close();
        $conn->close();
        ?>
    </body>
</html>