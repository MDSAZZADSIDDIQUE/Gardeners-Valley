<?php
if (!isset($_COOKIE['authorized']))
{
    header('location: index.php?error_message=UnauthorizedAccess');
}
?>
<?php
$source = $_FILES['treeImage']['tmp_name'];
$destination = "images/".$_FILES['treeImage']['name'];
move_uploaded_file($source, $destination);

$name = $_POST['name'];
$price = $_POST['price'];
$availability = $_POST['availability'];
$emailAddress = $_COOKIE['emailAddress'];
$description = $_POST['description'];
$supplier = "";
$supplierAddress = "";


$productInformationFile = fopen('product_information.txt', 'a');
$sellerInformationFile = fopen('seller_information.txt', 'r');
                    for ($i = 1; !feof($sellerInformationFile); $i++)
                    {
                        $sellersInformation = fgets($sellerInformationFile);
                        $sellerInformation = explode('|', $sellersInformation);
                        if ($sellerInformation[5] == $emailAddress) {
                            $supplier = $sellerInformation[7];
                            $supplierAddress = $sellerInformation[8];
                        }
                    }
$productCountFile = fopen('product_count.txt', 'r');
$productID = fgets($productCountFile);
$_SESSION['productCount'] = $productID;
$productInformation = $productID."|".$name."|".$price."|".$availability."|".$destination."|".$supplier."|".$supplierAddress."|".$description."\n";
fclose($productCountFile);
fwrite($productInformationFile, $productInformation);
$productCountFile = fopen('product_count.txt', 'w');
$newProductID = ++ $productID;
fwrite($productCountFile, $newProductID);
header('Location: seller_shop.php');