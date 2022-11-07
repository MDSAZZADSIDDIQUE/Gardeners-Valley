<?php
if (!isset($_COOKIE['authorized']))
{
    header('location: index.php?error_message=UnauthorizedAccess');
}
?>
<?php
include_once "get_time.php";
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
        text-align: center;
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
    }
    img {
        width: 25vw;
        border: 5px solid #000000;
    }
    .post {
        text-align: left;
        background-color: black;
        display: inline-block;
        font-family: 'Open Sans', sans-serif;
        padding-left: 25px;
        padding-right: 25px;
        border: 5px solid;
    }
    .post_header {
        text-align: left;
        font-weight: bold;
        font-size: 25px;
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
                <table>
                            <?php
                            $postFile = fopen('post.txt', 'r');
                            while (!feof($postFile))
                            {
                                echo "<tr><td class='post'>";
                                $posts = fgets($postFile);
                                $post = explode('|', $posts);
                                echo "<p class='post_header'>{$post[0]}</p>";
                                echo getTime();
                                echo "<br><img src='{$post[1]}'>";
                                echo "</tr></td>";
                            }
                            ?>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>