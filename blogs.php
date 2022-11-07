<?php
if (!isset($_COOKIE['authorized']))
{
    header('location: index.php');
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
        width: 50vw;
        height: 50vh;
        border: 5px solid #000000;
    }
    .blog {
        text-align: left;
        background-color: black;
        display: inline-block;
        font-family: 'Open Sans', sans-serif;
        padding-left: 25px;
        padding-right: 25px;
        border: 5px solid;
    }
    .blog_header {
        text-align: center;
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
                <a href="view_all_user.php">View all user</a>
                <br>
                <hr>
                <a href="">View all buyer</a>
                <br>
                <hr>
                <a href="">View all seller</a>
                <br>
                <hr>
                <a href="">View all expert</a>
                <br>
                <hr>
                <a href="">View all delivery man</a>
                <br>
                <hr>
                <a href="">Chat</a>
                <hr>
            </td>
            <td class="dashboard">
                <table>
                            <?php
                            $blogsFile = fopen('blogs.txt', 'r');
                            while (!feof($blogsFile))
                            {
                                echo "<tr><td class='blog'>";
                                $blogs = fgets($blogsFile);
                                $blog = explode('|', $blogs);
                                echo "<p class='blog_header'>{$blog[0]}</p>";
                                echo "<img src='{$blog[3]}'>";
                                echo "<p>Author: {$blog[1]}</p>";
                                echo "<p>";
                                echo getTime();
                                echo "</p>";
                                echo "<p>{$blog[2]}</p>";
                                echo "</tr></td>";
                            }
                            ?>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>