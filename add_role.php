<?php
session_start();
$role = $_POST['role'];
$userInformationFile = fopen('user_information.txt', 'a');
$userRole = "|".$role."\n";
fwrite($userInformationFile, $userRole);
fclose($userInformationFile);

$userInformationFile = fopen('user_information.txt', 'r');
$usersInformation = "";
while (!feof($userInformationFile)) {
    $usersInformation = fgets($userInformationFile);
    $userInformation = explode("|", $usersInformation);
    for ($i = 0; $i < count($userInformation); $i++)
    {
        if ($i == 0) {
            $temporaryUserID = $userInformation[$i];
            break;
        }
    }
    if ($temporaryUserID == $_SESSION['usersCount']) {
        break;
    }
}
if ($role == 'Buyer') {
    $buyerInformationFile = fopen('buyer_information.txt', 'a');
    fwrite($buyerInformationFile, $usersInformation);
    header('location: buyer_panel.php');
} else if ($role == 'Seller') {
    $sellerInformationFile = fopen('seller_information.txt', 'a');
    fwrite($sellerInformationFile, $usersInformation);
    header('location: seller_panel.php');
} else if ($role == 'Expert') {
    $expertInformationFile = fopen('expert_information.txt', 'a');
    fwrite($expertInformationFile, $usersInformation);
    header('location: expert_panel.php');
} else if ($role == 'Delivery man') {
    $deliveryManInformationFile = fopen('delivery_man_information.txt', 'a');
    fwrite($deliveryManInformationFile, $usersInformation);
    header('location: delivery_man_panel.php');
}