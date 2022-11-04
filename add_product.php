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
        padding-left: 22.5vw;
        width: 70vw;
        text-align: center;
    }
    .dashboard_header {
        font-family: 'Monoton', cursive;
        font-size: 50px;
        vertical-align: top;
    }
    fieldset {
        background-color: rgba(0, 0, 0, 0.75);
        width: 25vw;
    }
    .subheader {
        font-size: 50px;
        text-align: center;
    }
    .label{
        font-family: 'Open Sans', sans-serif;
        font-size: 25px;
    }
    input {
        width: 100%;
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
                <form action="product_add.php" method="POST" enctype="multipart/form-data" >
                    <fieldset>
                        <p class="subheader">Add product</p>
                        <hr>
                        <label for="name" class="label">Name : </label>
                        <hr>
                        <input type="text" name="name" id="name">
                        <hr>
                        <label for="price" class="label">Price : </label>
                        <hr>
                        <input type="number" name="price" id="price">
                        <hr>
                        <label for="availability" class="label">Availability : </label>
                        <hr>
                        <input type="text" name="availability" id="availability">
                        <hr>
                        <label for="treeImage" class="label">Image: </label>
                        <hr>
                        <input type="file" name="treeImage" id="tree_image">
                        <hr>
                        <input type="submit" value="Add">
                    </fieldset>
                </form>
            </td>
        </tr>
    </table>
</body>
</html>