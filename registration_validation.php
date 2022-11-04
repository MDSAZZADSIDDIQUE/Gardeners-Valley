<?php
session_start();
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$emailAddress = $_POST['emailAddress'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];
$emptyInput = false;

$_SESSION['firstName'] = $firstName;
$_SESSION['lastName'] = $lastName;
$_SESSION['emailAddress'] = $emailAddress;
$_SESSION['password'] = $password;
$_SESSION['confirmPassword'] = $confirmPassword;

if ($firstName == "") {
    $_SESSION['emptyFirstName'] = true;
    $emptyInput = true;
}
if ($lastName == "") {
    $_SESSION['emptyLastName'] = true;
    $emptyInput = true;
}
if ($emailAddress == "") {
    $_SESSION['emptyEmailAddress'] = true;
    $emptyInput = true;
}
if ($password == "") {
    $_SESSION['emptyPassword'] = true;
    $emptyInput = true;
}
if ($confirmPassword == "") {
    $_SESSION['emptyConfirmPassword'] = true;
    $emptyInput = true;
}
if ($emptyInput) {
    header('location: registration.php');
} else if ($password != $confirmPassword) {
        echo "Hello";
        $_SESSION['unmatchedPassword'] = true;
        header('location: registration.php');
} else {
    $userInformationFile = fopen('user_information.txt', 'a');
    $userInformation = $firstName."|".$lastName."|".$emailAddress."|".$password;
    fwrite($userInformationFile, $userInformation);
    header('location: home.php');
}