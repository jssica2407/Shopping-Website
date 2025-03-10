<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>搜尋結果 | EasyWear </title>
    </head>

    <body>     
        <?php include 'customMenu.php';

        if(isset($_POST['search'])) {
            require 'search.php';

            if(mysqli_num_rows($results)<=0) {
                echo "<h2 style=\"text-align:center\">抱歉, 查無商品!</h2>";
            }
        }
        ?>
    </body>
</html>