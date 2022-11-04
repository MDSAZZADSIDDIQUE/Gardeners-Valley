<?php
$source = $_FILES['treeImage']['tmp_name'];
$destination = "images/".$_FILES['treeImage']['name'];
move_uploaded_file($source, $destination);

$name = $_POST['name'];
$price = $_POST['price'];
$availability = $_POST['availability'];

$productInformationFile = fopen('product_information.txt', 'a');
$productInformation = $name."|".$price."|".$availability."|".$destination;
fwrite($productInformationFile, $productInformation);
header('Location: add_product.php');
