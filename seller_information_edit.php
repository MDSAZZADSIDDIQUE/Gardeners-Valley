<?php
if (!isset($_COOKIE['authorized']))
{
    header('location: index.php?error_message=UnauthorizedAccess');
}
?>
<?php
session_start();
$userID = $_POST['userID'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$gender = $_POST['gender'];
$dateOfBirth = $_POST['dateOfBirth'];
$previousEmailAddress = $_COOKIE['emailAddress'];
$emailAddress = $_POST['emailAddress'];
$shopName = $_POST['shopName'];
$shopAddress = $_POST['shopAddress'];

$sellerInformationData = $userID."|".$firstName."|".$lastName."|".$gender."|".$dateOfBirth."|".$emailAddress."|Seller|".$shopName."|".$shopAddress;

$replaceUserInformation = "";
$sellerInformationFile = fopen('seller_Information.txt', 'r');
while (!feof($sellerInformationFile)) {
    $sellersInformation = fgets($sellerInformationFile);
    $sellerInformation = explode('|', $sellersInformation);
    for ($i = 0; $i < count($sellerInformation); $i++) {
        if ($sellerInformation[$i] == $emailAddress) {
            for ($j = 0; $j < count($sellerInformation); $j++) {
                if ($j == 0) {
                    $replaceUserInformation = $sellerInformation[0];
                } else if ($j == (count($sellerInformation) - 1))
                {
                    $replaceUserInformation = $replaceUserInformation."|".$sellerInformation[$j]."\n";
                }
                else {
                    $replaceUserInformation = $replaceUserInformation."|".$sellerInformation[$j];
                }
            
            }
        }
    }
}

file_put_contents('seller_information.txt', str_replace($replaceUserInformation, $sellerInformationData, file_get_contents('seller_information.txt')));
header('location: seller_panel.php');