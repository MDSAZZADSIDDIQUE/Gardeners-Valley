<?php
if (!isset($_COOKIE['authorized']))
{
    header('location: index.php?error_message=UnauthorizedAccess');
}
?>
<?php
$name = $_COOKIE['name'];
$price = $_COOKIE['price'];
$email = $_COOKIE['emailAddress'];
$supplier = $_COOKIE['suppliers'];
$deliveryAddress = $_POST['deliveryAddress'];

$order_information = $name."|".$price."|".$email."|".$supplier."|".$deliveryAddress."\n";

$orderFile = fopen('order.txt', 'a');
fwrite($orderFile, $order_information);
header('location: buyer_shop.php');
