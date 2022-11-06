<?php
session_start();
include_once "empty_input_validation.php";
include_once "name_validation.php";
include_once "password_validation.php";
include_once "email_validation.php";

unset($_SESSION['emptyEmailAddress']);
unset($_SESSION['invalidEmailAddress']);
unset($_SESSION['emptyPassword']);
unset($_SESSION['emptyConfirmPassword']);
unset($_SESSION['weakPassword']);
unset($_SESSION['unmatchedPassword']);
unset($_SESSION['samePassword']);

$emailAddress = $_POST['emailAddress'];;
$previousPassword;
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];
$userInformationFile = fopen('user_information.txt', 'r');
$invalidInput = false;
while (!feof($userInformationFile)) {
    $usersInformation = fgets($userInformationFile);
    $userInformation = explode('|', $usersInformation);
    if ($emailAddress == $userInformation[5]) {
        $previousPassword = $userInformation[6];
        break;
    }
}
fclose($userInformationFile);
if (checkInput($emailAddress)) {
    $_SESSION['emptyEmailAddress'] = true;
    $invalidInput = true;
}
if (checkEmail($emailAddress)) {
    $_SESSION['invalidEmailAddress'] = true;
    $invalidInput = true;
}
if (checkInput($password)) {
    $_SESSION['emptyPassword'] = true;
    $invalidInput = true;
}
if (checkInput($confirmPassword)) {
    $_SESSION['emptyConfirmPassword'] = true;
    $invalidInput = true;
}
if (checkPassword($password)) {
    $_SESSION['weakPassword'] = true;
    $invalidInput = true;
}
if ($password != $confirmPassword) {
    $_SESSION['unmatchedPassword'] = true;
    $invalidInput = true;
}
if ($password == $previousPassword) {
    $_SESSION['samePassword'] = true;
    $invalidInput = true;
}
if ($invalidInput) {
    $_SESSION['emailAddress'] = $emailAddress;
    $_SESSION['password'] = $password;
    $_SESSION['confirmPassword'] = $confirmPassword;
    header('location: forgot_password.php');
} else {
    file_put_contents('user_information.txt', str_replace($previousPassword, $password, file_get_contents('user_information.txt')));
    $userInformationFile = fopen('user_information.txt', 'r');
    $role;
while (!feof($userInformationFile))
{
    $usersInformation = fgets($userInformationFile);
    $userInformation = explode('|', $usersInformation);
    if ($emailAddress == $userInformation[5] && $password == $userInformation[6])
    {
        $_SESSION['unmatchedInformations'] = false;
        $role = trim($userInformation[7]);
    }
}
if ($role == 'Admin') {
    header('location: admin_panel.php');
} else if ($role == 'Buyer') {
    header('location: buyer_panel.php');
} else if ($role == 'Seller') {
    header('location: seller_panel.php');
} else if ($role == 'Expert') {
    header('location: expert_panel.php');
} else if ($role == 'Delivery man') {
    header('location: delivery_man_panel.php');
}
}