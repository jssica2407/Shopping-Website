<!DOCTYPE html>
<html>
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

        $sql = "SELECT * FROM `MyProducts` WHERE `cloth_name` LIKE ? OR `cloth_store` LIKE ?";

        $stmt = $conn->prepare($sql);
        $stmt->execute(["%" . $_POST['search'] . "%", "%" . $_POST['search'] . "%"]);
        $results = $stmt->get_result();

        while($row = $results->fetch_assoc()) {
            echo "<div style=\"text-align: center;\">";
            echo "<img src=\"img/clothes/{$row['cloth_image']}\" style=\"width: 10%;\"/><br/>";
            echo "Name: " . $row['cloth_name'] . "<br/>";
            echo "Store: " . $row['cloth_store'] . "<br/>";
            echo "<a href =\"tryproduct.php?product_image={$row['cloth_image']}\">點我看商品</a><hr/>";
        }

        mysqli_close($conn);
    ?>
</html>