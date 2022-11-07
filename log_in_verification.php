<?php
include_once "empty_input_validation.php";
include_once "password_validation.php";
include_once "email_validation.php";

session_start();
$emailAddress = $_POST['emailAddress'];
$password = $_POST['password'];
$role;
$invalidInput = false;
$_SESSION['unmatchedInformations'] = true;

setcookie('emailAddress', $emailAddress, time() + 3600, '/');
setcookie('password', $password, time() + 3600, '/');

if (checkInput($emailAddress)) {
    $_SESSION['emptyEmailAddress'] = true;
    $invalidInput = true;
}
if (checkInput($password)) {
    $_SESSION['emptyPassword'] = true;
    $invalidInput = true;
}
if (checkEmail($emailAddress)) {
    $_SESSION['invalidEmailAddress'] = true;
    $invalidInput = true;
}
$userInformationFile = fopen('user_information.txt', 'r');
while (!feof($userInformationFile))
{
    $usersInformation = fgets($userInformationFile);
    $userInformation = explode('|', $usersInformation);
    for ($i = 0; $i < count($userInformation); $i++) {
        if ($emailAddress == $userInformation[$i] && $password == $userInformation[$i + 1])
    {
        $_SESSION['unmatchedInformations'] = false;
        $role = trim($userInformation[7]);
        break;
    }
    }
}
if ($invalidInput || $_SESSION['unmatchedInformations']) {
    header('location: log_in.php');
} else {
    if ($role == 'Admin') {
        setcookie('authorized', $password, time() + 3600, '/');
        header('location: admin_panel.php');
    } else if ($role == 'Buyer') {
        setcookie('authorized', $password, time() + 3600, '/');
        header('location: buyer_panel.php');
    } else if ($role == 'Seller') {
        setcookie('authorized', $password, time() + 3600, '/');
        header('location: seller_panel.php');
    } else if ($role == 'Expert') {
        setcookie('authorized', $password, time() + 3600, '/');
        header('location: expert_panel.php');
    } else if ($role == 'Delivery man') {
        setcookie('authorized', $password, time() + 3600, '/');
        header('location: delivery_man_panel.php');
    }
}