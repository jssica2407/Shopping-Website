<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>結帳 | EasyWear</title>
        <link rel="icon" href="img/FEF8D6.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            /* Basic Styles */
            body {
            font-family: Calibri, sans-serif; /* Set a default font for readability */
            margin: 0; /* Remove default margin for cleaner layout */
            }

            .card {
            width: 700px; /* Set a reasonable width for the checkout form */
            margin: 50px auto; /* Center the form horizontally */
            padding: 20px;
            border: 1px solid #ddd; /* Add a subtle border */
            border-radius: 5px; /* Add rounded corners for a softer look */
            background-color: #fff5bd; /* Lighten the background for better contrast */
            box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            }

            /* Title Section */
            .title {
            text-align: center; /* Center the checkout title */
            }

            h4 {
            margin-bottom: 0; /* Remove bottom margin for a cleaner look */
            }

            /* Billing and Shipping Details */
            .row {
            margin-bottom: 20px; /* Add space between sections */
            }

            .col-md-6 {
            float: left;
            width: 50%;
            padding: 0 10px; /* Add horizontal padding for better spacing */
            }

            h2 {
            margin-top: 0; /* Remove top margin for a cleaner look */
            }

            hr {
            border: 1px solid #ddd; /* Style the horizontal line */
            margin: 10px 0; /* Add space above and below the line */
            }

            label {
            display: block; /* Display labels on separate lines */
            margin-bottom: 5px; /* Add space below labels */
            }

            input[type="text"],
            input[type="number"],
            textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px; /* Add rounded corners for input fields */
            box-sizing: border-box; /* Ensure padding doesn't affect width */
            }

            .col-50 {
            width: 50%; /* Adjust width for CVV input */
            float: right; /* Position the CVV field to the right */
            margin-top: 10px; /* Add space above the CVV field */
            }

            /* Button */
            .btn {
            display: block; /* Display button on a new line */
            width: 100%;
            padding: 10px 20px;
            background-color: #333; /* Set button color */
            color: #ffffff; /* Set button text color */
            border: none; /* Remove border for a cleaner look */
            border-radius: 5px;
            cursor: pointer; /* Indicate that the button is clickable */
            }
        </style>
    </head>

    <body>
        <div class="card">
            <div class="row">
                <div class="col-md-6">
                    <h2>Payment 付款方式</h2>
                    <div class="icon-container">
                        <i class="fa fa-cc-visa" style="color:navy;font-size:24px;"></i>
                        <i class="fa fa-cc-amex" style="color:blue;font-size:24px;"></i>
                        <i class="fa fa-cc-mastercard" style="color:red;font-size:24px;"></i>
                        <i class="fa fa-cc-discover" style="color:orange;font-size:24px;"></i>
                    </div>
                </div>
            </div>

            <!--html input -->
            <form action="successfulPurchased.php" method="POST">
                <div class="col-md-6">
                    <label for="cname">Name on Card 持卡者名字</label>
                    <input type="text" id="cname" name="cardName" placeholder="姓名" required>
                    <label for="ccnum">Credit card number 信用卡號碼</label>
                    <input type="text" id="ccnum" name="cardNumber" placeholder="1111-2222-3333-4444" required>
                    <label for="expmonth">Exp Month 到期日</label>
                    <input type="text" id="expmonth" name="expmonth" maxlength="10" placeholder="YYYY-MM-DD" required>
                    <div class="col-30">
                        <label for="cvv">CVV 安全碼</label>
                        <input type="text" id="cvv" name="cvv" maxlength="3" placeholder="XXX" required><br><br>
                    </div>
                    <h2><b>Shipping Address 送貨地址</b></h2>
                    <textarea id="shipadr" name="shipadr" placeholder="桃園市中壢區中大路300號" required rows="4" cols="50"></textarea>
                    <br><br>
                </div>
                <button type="submit" class="btn">PLACE ORDER 下單</button>
            </form>
        </div>
    </body>
</html>