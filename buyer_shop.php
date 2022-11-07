<?php
if (!isset($_COOKIE['authorized']))
{
    header('location: index.php');
}
?>
<?php
session_start();
$productCountFile = fopen('product_count.txt', 'r');
$productID = fgets($productCountFile);
$_SESSION['productCount'] = $productID;
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
        vertical-align: text-top;
    }
    .dashboard {
        width: 70vw;
    }
    .dashboard_header {
        font-family: 'Monoton', cursive;
        font-size: 50px;
        vertical-align: top;
        margin-top: 50px;
    }
    img {
        width: 20vw;
        height: auto;
        border: 1px solid greenyellow;
    }

    .product {
        background-color: black;
        font-family: 'Open Sans', sans-serif;
        font-size: 25px;
        text-align: center;
        width: 35vw;
        padding-top: 25px;
        padding-bottom: 25px;
        border: 5px solid;
    }

    input[type="submit"] {
        margin-top: 10px;
        width: 170px;
        font-size: 30px;
        border: 5px solid greenyellow;
        color: greenyellow;
        background-color: black;
    }

    input[type="submit"]:hover {
        background-color: greenyellow;
        color: black;
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
                <table>
                <?php
$productInformationFile = fopen('product_information.txt', 'r');
for ($i = 1;!feof($productInformationFile) && $i < $_SESSION['productCount']; $i++) {
    $productsInformation = fgets($productInformationFile);
    $productInformation = explode('|', $productsInformation);
    if ($i % 2 != 0) {
        echo "<tr><form action='cart.php' method='POST'><td><div class='product'><img src='{$productInformation[4]}' alt=''>";
        echo "<p>{$productInformation[1]}</p><hr>";
        echo "<p>{$productInformation[2]} ৳</p><hr>";
        echo "<p>{$productInformation[3]}</p><hr>";
        echo "<p>Description:</p>";
        echo "<p>{$productInformation[7]}</p>";
        echo "<hr><input type='submit' name='addToCart' value='Add to cart {$i}'>
                        </div></td></form>";
    } else {
        echo "<form action='cart.php' method='POST'><td><div class='product'><img src='{$productInformation[4]}' alt=''>";
        echo "<p>{$productInformation[0]}</p><hr>";
        echo "<p>{$productInformation[1]} ৳</p><hr>";
        echo "<p>{$productInformation[2]}</p><hr>";
        echo "<p>Description:</p>";
        echo "<p>{$productInformation[7]}</p>";
        echo "<hr><input type='submit' name='addToCart' value='Add to cart {$i}'>
                        </div></td></form>";
        echo "</tr>";
    }
}
?>

                </table>
            </td>
        </tr>
    </table>
</body>
</html>