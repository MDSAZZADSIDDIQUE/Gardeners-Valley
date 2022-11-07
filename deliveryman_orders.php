<?php
if (!isset($_COOKIE['authorized']))
{
    header('location: index.php?error_message=UnauthorizedAccess');
}
?>
<?php

$name;
$price;
$email;
$deliveryAddress;

$orderFile = fopen('order.txt', 'r');
while(!feof($orderFile)) {
    $ordersInformation = fgets($orderFile);
    if ($ordersInformation == "")
    {
        break;
    }
    $orderInformation = explode('|', $ordersInformation);
    $name = $orderInformation[0];
    $price = $orderInformation[1];
    $email = $orderInformation[2];
    $deliveryAddress = $orderInformation[4];
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
                <a href="orders.php">Delivery Address</a>
                <hr>
                <a href="log_out.php">Log out</a>
                <hr>
            </td>
            <td class="dashboard">
                <p class="subheader">Orders</p>
                <fieldset>
                    <?php
                    echo "Name: {$name}<br>";
                    echo "Price: {$price}<br>";
                    echo "Email: {$email}<br>";
                    echo "Address: {$deliveryAddress}<br>";
                    ?>
                </fieldset>
            </td>
        </tr>
    </table>
</body>
</html>