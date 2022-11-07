<?php
if (!isset($_COOKIE['authorized']))
{
    header('location: index.php?error_message=UnauthorizedAccess');
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
        height: 100vh;
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
    .active {
        font-family: 'Monoton', cursive;
        font-size: 30px;
    }
    .dashboard_table {
        border: 0;
        font-family: 'Open Sans', sans-serif;
        font-size: 30px;
        background-color: rgba(0, 0, 0, 0.75);
    }
    .dashboard_table_data {
        border: 1px solid;
        height: 10px;
    }
    .edit_button {
        background-color: white;
        font-size: 30px;
        border-radius: 8px;
        color: blue;
        border: 2px solid blue;
        transition-duration: 0.4s;
        width: 70px;
    }
    .edit_button:hover {
        background-color: blue;
        color: white;
    }
    .delete_button {
        background-color: white;
        font-size: 30px;
        border-radius: 8px;
        color: red;
        border: 2px solid red;
        transition-duration: 0.4s;
        width: 100px;
    }
    .delete_button:hover {
        background-color: red;
        color: white;
    }

    img {
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
                <a href="seller_shop.php">Shop</a>
                <hr>
                <a href="seller_view_products.php">View products</a>
                <hr>
                <a href="add_product.php">Add product</a>
                <hr>
                <a href="orders.php">Orders</a>
                <hr>
                <a href="seller_newsfeed.php">Newsfeed</a>
                <hr>
                <a href="seller_post.php">Post</a>
                <hr>
                <a href="seller_blogs.php">Blog</a>
                <hr>
                <a href="publish_seller_blogs.php">Publish Blog</a>
                <hr>
                <a href="edit_seller_information.php">Edit personal information</a>
                <hr>
                <a href="log_out.php">Log out</a>
                <hr>
            </td>
            <td class="dashboard">
                <table class="dashboard_table">
                    <tr>
                        <th class="dashboard_table_data">Product ID</th>
                        <th class="dashboard_table_data">Name</th>
                        <th class="dashboard_table_data">Price</th>
                        <th class="dashboard_table_data">Availability</th>
                        <th class="dashboard_table_data">Image</th>
                        <th class="dashboard_table_data">Supplier</th>
                        <th class="dashboard_table_data">Supplier address</th>
                        <th class="dashboard_table_data">Description</th>
                    </tr>
                    <?php
                    $productInformationFile = fopen('product_information.txt', 'r');
                    for ($i = 1; !feof($productInformationFile); $i++)
                    {
                        echo "<tr>";
                        $productsInformation = fgets($productInformationFile);
                        $productInformation = explode('|', $productsInformation);
                        for ($j = 0; $j < count($productInformation); $j++)
                        {
                            if ($j == 4) {
                                echo "<td class='dashboard_table_data'><img src={$productInformation[$j]}></td>";
                            } else if ($j == 7) {
                                break;
                            }
                            else {
                                echo "<td class='dashboard_table_data'>{$productInformation[$j]}</td>";
                            }
                        }
                        ?>
                        <form action="edit_product.php" method="post">
                            <?php
                            echo "<td><input type='submit' value='Edit {$i}' name='edit' class='edit_button'></td>";
                            ?>
                        </form>
                        <form action="delete.php" method="post">
                            <?php
                            echo "<td><input type='submit' value='Delete {$i}' name='delete' class='delete_button'></td>";
                            ?>
                        </form>
                        <?php
                        echo "</tr>";
                    }
                    ?>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>