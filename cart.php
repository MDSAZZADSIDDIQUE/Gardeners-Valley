<?php
if (!isset($_COOKIE['authorized']))
{
    header('location: index.php');
}
?>
<?php
session_start();
$addToCart = $_POST['addToCart'];
$productsID = explode('Add to cart', $addToCart);
$productID = $productsID[1];
$productInformationFile = fopen('product_information.txt', 'r');
$name;
$price;
$supplier;
$supplierAddress;
for ($i = 1; !feof($productInformationFile); $i++) {
    $productsInformation = fgets($productInformationFile);
    $productInformation = explode('|', $productsInformation);
    if ($i == $productID)
    {
        $name = $productInformation[1];
        $price = $productInformation[2];
        $suppliers = $productInformation[5];
        $supplierAddress = $productInformation[6];
        break;
    }
}
setcookie('name', $name, time()+ 3600, '/');
setcookie('price', $price, time()+ 3600, '/');
setcookie('suppliers', $suppliers, time()+ 3600, '/');
setcookie('supplierAddress', $supplierAddress, time()+ 3600, '/');

if (!(isset($name) && isset($price) && isset($suppliers) && isset($supplierAddress))) {
    $name = $_COOKIE['name'];
        $price = $_COOKIE['price'];
        $suppliers = $_COOKIE['suppliers'];
        $supplierAddress = $_COOKIE['supplierAddress'];
}
$deliveryAddress;
?>

<html>
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Monoton&family=Open+Sans&display=swap" rel="stylesheet">
    <title>Admin panel</title>
</head>
<style>
    body {
        background-image: url('images/pexels-sohail-nachiti-807598.jpg');
        background-size: cover;
        margin: 0;
    }
    table {
        border: 10px solid #FFFFFF;
        border-top: 0;
        color: #FFFFFF;
        font-family: 'Monoton', cursive;
        height: 100vh;
        width: 100%;
    }
    a {
        color: #FFFFFF;
        font-size: 25px;
        text-decoration: none;
    }
    .header {
        border: 10px solid #FFFFFF;
        font-size: 75px;
        height: 30px;
        text-align: center;
    }
    .side_panel {
        background-color: rgba(0, 0, 0, 0.75);
        border: 5px solid;
        border-bottom: 0;
        border-left: 0;
        border-top: 0;
        font-family: 'Open Sans', sans-serif;
        font-size: 25px;
        padding-left: 10px;
        text-align: left;
        width: 30vw;
    }
    .dashboard {
        width: 70vw;
    }
    .dashboard_header {
        font-family: 'Monoton', cursive;
        font-size: 50px;
        vertical-align: top;
    }
    .subheader {
        font-size: 50px;
    }
    fieldset {
        font-family: 'Open Sans', sans-serif;
        background-color: rgba(0, 0, 0, 0.75);
        font-size: 25px;
    }
    #delivery_address{
        height:50px;
        width: 50%;
    }
    .button {
        margin-top: 25px;
        height: 25px;
        width: 50%;
    }
    .online_payment {
        margin-top: 20px;
    }
    input {
        height:25px;
        width: 50%; 
    }
</style>
<body>
    <table class="header">
        <tr>
            <td>GARDENERS VALLEY</td>
        </tr>
</table>
<table>
        <tr>
            <td class="side_panel">
                <p class="dashboard_header">Dashboard</p>
                <hr>
                <a href="buyer_shop.php">Shop</a>
                <hr>
                <a href="cart.php">Cart</a>
                <hr>
                <a href="buyer_blogs.php">Blogs</a>
                <hr>
                <a href="publish_buyer_blogs.php">Publish blogs</a>
                <hr>
                <a href="buyer_newsfeed.php">Newsfeed</a>
                <hr>
                <a href="buyer_post.php">Post</a>
                <hr>
                <a href="chat_with_expert.php">Chat</a>
                <hr>
                <a href="log_out.php">Log out</a>
                <hr>
            </td>
            <td class="dashboard">
            <p class="subheader">Shopping Cart</p>
                <form action="order_processing.php" method="POST">
                    <fieldset>
                        <?php
                        
                            echo "<p>Name: {$name}</p>";
                        echo "<p>Price: {$price}</p>";
                        echo "<p>Suppliers: {$suppliers}</p>";
                        echo "<p>Supplier Address: {$supplierAddress}</p>";
                        if (isset($deliveryAddress))
                        {
                            echo "<p>Delivery Address: {$deliveryAddress}</p>";
                        } else {
                            echo "<label for='deliveryAddress'>Delivery Address: </label>";
                        
                        }
                        ?>
                        <input type='text' name='deliveryAddress' id='delivery_address'>
                        <fieldset class="online_payment">
                            <h1>Online Payment</h1>
                            <hr>
                            <label for="creditCardNumber">Credit Card Number: </label>
                            <input type="number" name="creditCardNumber" id="credit_card_number" placeholder="XXXX-XXXX-XXXX-XXXX">
                            <hr>
                            <label for="expiryDate">Expiry Date: </label>
                            <input type="date" name="expiryDate" id="expiry_date">
                            <hr>
                            <label for="cvv">CVV: </label>
                            <input type="number" name="cvv" id="cvv">
                            
                        </fieldset>
                        <input type='submit' value='checkout' class='button'>
                    </fieldset>
                </form>
            </td>
        </tr>
    </table>
</body>
</html>