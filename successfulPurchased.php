<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>購買成功 | EasyWear</title>
        <link rel="icon" href="img/logo/FEF8D6.png">
        <link rel="stylesheet" type="text/css" href="successfulPurchased.css" />
    </head>

    <body>
        <?php
        // Connect to your database
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
        $sql = "CREATE TABLE IF NOT EXISTS CustomerData (
                cardName VARCHAR(40) NOT NULL,
                cardNumber INT(30) PRIMARY KEY,
                expmonth DATE NOT NULL, 
                cvv INT(3) NOT NULL, 
                shipadr VARCHAR(50) NOT NULL,
                purchase_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                )";

        if (!mysqli_query($conn, $sql)) {
            echo "Error creating table:" . mysqli_error($conn);
        }

        // Get form data
        $cardName = $_POST['cardName'];
        $cardNumber = $_POST['cardNumber'];
        $expmonth = $_POST['expmonth'];
        $cvv = $_POST['cvv'];
        $shipadr = $_POST['shipadr'];

        // Insert data into database
        $stmt = $conn->prepare("INSERT INTO CustomerData (cardName, cardNumber, expmonth, cvv, shipadr)
                                VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sisis", $cardName, $cardNumber, $expmonth, $cvv, $shipadr);

        if ($stmt->execute() !== TRUE) {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();

        // Create table
        $sql = "DELETE FROM PurchaseRecord";

        if (!mysqli_query($conn, $sql)) {
            echo "Error deleting records: " . mysqli_error($conn);
        }

        mysqli_close($conn);
        ?>

        <header>
            <h1>Thanks for Your Purchase!</h1>
        </header>

        <main>
            <section class="shipping-info">
                <h2>Shipping Information</h2>
                <p>Your order will be shipped within 1-2 business days. You will receive a confirmation email with tracking information once your order has shipped.</p>
            </section>
        </main>

        <footer>
            <p>&copy; 2024 Easywear</p>
        </footer>
    </body>
</html>