<?php
if (!isset($_COOKIE['authorized']))
{
    header('location: index.php?error_message=UnauthorizedAccess');
}
?>
<?php
session_start();
$userID;
$firstName;
$lastName;
$gender;
$dateOfBirth;
$emailAddress = $_COOKIE['emailAddress'];
$shopName = "";
$shopAddress = "";

$sellerInformation;

$sellerInformationFile = fopen('seller_information.txt', 'r');
while (!feof($sellerInformationFile)) {
    $sellersInformation = fgets($sellerInformationFile);
    $sellerInformation = explode('|', $sellersInformation);
    for ($i = 0; $i < count($sellerInformation); $i++) {
        if ($sellerInformation[$i] == $emailAddress) {
            $userID = $sellerInformation[0];
            $firstName = $sellerInformation[1];
            $lastName = $sellerInformation[2];
            $gender = $sellerInformation[3];
            $dateOfBirth = $sellerInformation[4];
            if (count($sellerInformation) > 8) {
                $shopName = $sellerInformation[7];
                $shopAddress = $sellerInformation[8];
            }
        }
    }
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
        text-align: left;
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
                <form action="seller_information_edit.php" method="POST">
                    <fieldset>
                        <p class="subheader">Edit</p>
                        <hr>
                        <p class="label">User ID : </p>
                        <hr>
                        <input type="number" name="userID" id="user_id"  value=<?php echo $userID ?>>
                        <hr>
                        <label for="edit.php" class="label">First name : </label>
                        <hr>
                        <input type="text" name="firstName" id="first_name" value=<?php echo $firstName ?>>
                        <hr>
                        <label for="last_name" class="label">Last name : </label>
                        <hr>
                        <input type="text" name="lastName" id="last_name" value=<?php echo $lastName ?>>
                        <hr>
                        <label for="gender" class="label">Gender : </label>
                        <hr>
                        <input type="text" name="gender" id="gender" value=<?php echo $gender ?>>
                        <hr>
                        <label for="date_of_birth" class="label">Date of birth : </label>
                        <hr>
                        <input type="date" name="dateOfBirth" id="date_of_birth" value=<?php echo $dateOfBirth ?>>
                        <hr>
                        <label for="emailAddress" class="label">Email Address : </label>
                        <hr>
                        <input type="email" name="emailAddress" id="email_address" value=<?php echo str_replace(' ', '&nbsp;', $emailAddress); ?>>
                        <hr>
                        <label for="shop_name" class="label">Shop name : </label>
                        <hr>
                        <input type="text" name="shopName" id="shop_name" value=<?php echo str_replace(' ', '&nbsp;', $shopName); ?>>
                        <hr>
                        <label for="shop_address" class="label">Shop Address : </label>
                        <hr>
                        <input type="text" name="shopAddress" id="shop_address" value=<?php echo str_replace(' ', '&nbsp;', $shopAddress); ?>>
                        <hr>
                        <input type="submit" value="Confirm edit">
                    </fieldset>
                </form>
            </td>
        </tr>
    </table>
</body>
</html>