<?php
$name = $_COOKIE['name'];
$price = $_COOKIE['price'];
$email = $_COOKIE['emailAddress'];
$deliveryAddress = $_POST['deliveryAddress'];

$order_information = $name."|".$price."|".$email."|".$deliveryAddress."\n";

$orderFile = fopen('order.txt', 'a');
fwrite($orderFile, $order_information);
