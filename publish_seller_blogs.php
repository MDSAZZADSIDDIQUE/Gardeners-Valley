<?php
if (!isset($_COOKIE['authorized']))
{
    header('location: index.php?error_message=UnauthorizedAccess');
}
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
        background-color: rgba(0, 0, 0, 0.50);
        width: 70vw;
    }
    .dashboard_header {
        font-family: 'Monoton', cursive;
        font-size: 50px;
        vertical-align: top;
    }
    form {
        text-align: center;
    }
    fieldset {
        background-color: rgba(0, 0, 0, 1);
        font-size: 25px;
        font-family: 'Open Sans', sans-serif;
        text-align: left;
    }
    input {
        width: 100%;
    }
    textarea {
        width: 100%;
        height: 150px;
    }
    .subheader {
        font-family: 'Monoton', cursive;
        font-size: 50px;
    }
    input[type = 'submit'] {
        font-size: 30px;
        border: 5px solid greenyellow;
        background-color: black;
        color: greenyellow;
    }
    input[type = 'submit']:hover {
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
                <form action="publishing_blogs.php" method="POST"  enctype="multipart/form-data" >
                    <fieldset>
                        <p class="subheader">Publish Blogs</p>
                        <hr>
                        <label for="title">Title : </label>
                        <hr>
                        <input type="text" name="title" id="title">
                        <hr>
                        <label for="author">Author : </label>
                        <hr>
                        <input type="text" name="author" id="author">
                        <hr>
                        <label for="blog">Blog : </label>
                        <hr>
                        <textarea name="blog" id="blog"></textarea>
                        <hr>
                        <label for="iamge">Image : </label>
                        <hr>
                        <input type="file" name="image" id="image">
                        <hr>
                        <input type="submit" value="Post">
                    </fieldset>
                </form>
            </td>
        </tr>
    </table>
</body>
</html>