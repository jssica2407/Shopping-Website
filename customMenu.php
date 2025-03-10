<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>EasyWear Custom Menu</title>
        <link rel="icon" href="img/logo/FEF8D6.png">
        <link rel="stylesheet" href="mainstyle.css">
        <link rel="stylesheet" href="topMenu.css">
        <link rel="stylesheet" href="searchBar.css">
        <script src="https://kit.fontawesome.com/279f3a9ede.js" crossorigin="anonymous"></script>
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

        $sql = "SELECT COUNT(*) AS num FROM `PurchaseRecord`";
        $result = mysqli_query($conn, $sql);
        $items_in_cart = mysqli_fetch_array($result);

        mysqli_close($conn);
        ?>
    </head>

    <body>
        <!-- BRAND LOGO -->
        <a href="HomePage.php">
            <img src="img/logo/black-nobg.png" alt="商標" class="center">
        </a>

        <?php
        function isActivePage($pageName) {
            return (basename($_SERVER['PHP_SELF'], '.php') == $pageName);
        }
        ?>

        <!-- NAVIGATION MENU -->
        <div class="navbar">
            <a <?php echo isActivePage('AboutUs') ? 'class="active"' : ''; ?> href="AboutUs.php">關於我們</a>
            <a <?php echo isActivePage('Shop') ? 'class="active"' : ''; ?> href="Shop.php">商店</a>
            <a <?php echo isActivePage('SizeGuide') ? 'class="active"' : ''; ?> href="SizeGuide.php">服裝尺碼換算指南</a>
            <a <?php echo isActivePage('HelpCenter') ? 'class="active"' : ''; ?> href="HelpCenter.php">幫助中心</a>
            <a <?php echo isActivePage('Comment') ? 'class="active"' : ''; ?> href="Comment.php">
                <i class="fa-solid fa-comments" <?php echo isActivePage('Comment') ? 'style="background-color:rgb(226, 219, 202)"' : ''; ?>></i>
            </a>
            
            <a class="right" href="ShoppingCart.php">
                <i class="fa-solid fa-bag-shopping<?php if($items_in_cart['num']>0) echo ' fa-bounce' ?>"></i>
            </a>

            <!-- SEARCH BAR -->
            <div class="search-container">
                <form action="searchResults.php" method="POST">
                    <input type="text" placeholder="搜尋..." name="search">
                    <button type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </form>
            </div>
        </div>
    </body>
</html>