<?php
if (!isset($_COOKIE['authorized']))
{
    header('location: index.php?error_message=UnauthorizedAccess');
}
?>
<?php
$productID = $_POST['productID'];
$name = $_POST['name'];
$price = $_POST['price'];
$availability = $_POST['availability'];
$supplier =  $_POST['supplier'];;
$supplierAddresss = $_POST['supplierAddress'];
$description = $_POST['description'];
$replaceProduct = "";

$image;

$productInformationFile = fopen('product_information.txt', 'r');
while (!feof($productInformationFile)) {
    $productsInformation = fgets($productInformationFile);
    $productInformation = explode('|', $productsInformation);
        for ($i = 0; $i < count($productInformation); $i++) {
            if ($productID == $productInformation[$i]) {
                for ($j = 0; $j < count($productInformation); $j++) {
                    if ($j == 4) {
                        $image = $productInformation[4];
                    }
            if ($j == 0) {
                $replaceProduct = $productInformation[0];
            } else if($j == count($productInformation) - 1) {
                $replaceProduct = $replaceProduct."|".$productInformation[$j]."\n";
            }
             else {
                $replaceProduct = $replaceProduct."|".$productInformation[$j];
            }
        }
        }
        }
    
}

$prouctInformationData = $productID."|".$name."|".$price."|".$availability."|".$image."|".$supplier."|".$supplierAddresss."|".$description;
file_put_contents('product_information.txt', str_replace($replaceProduct, $prouctInformationData, file_get_contents('product_information.txt')));
// echo $prouctInformationData;
// echo "\n";
// echo $replaceProduct;
header('location: seller_view_products.php');

