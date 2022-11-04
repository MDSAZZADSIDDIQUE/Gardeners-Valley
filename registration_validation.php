<?php
include_once "empty_input_validation.php";
include_once "name_validation.php";
include_once "password_validation.php";

session_start();

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$gender = $_POST['gender'];
$dateOfBirth = $_POST['dateOfBirth'];
$emailAddress = $_POST['emailAddress'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];
$invalidInput = false;

$_SESSION['firstName'] = $firstName;
$_SESSION['lastName'] = $lastName;
$_SESSION['gender'] = $gender;
$_SESSION['dateOfBirth'] = $dateOfBirth;
$_SESSION['emailAddress'] = $emailAddress;
$_SESSION['password'] = $password;
$_SESSION['confirmPassword'] = $confirmPassword;

if (checkInput($firstName)) {
    $_SESSION['emptyFirstName'] = true;
    $invalidInput = true;
}
if (checkInput($lastName)) {
    $_SESSION['emptyLastName'] = true;
    $invalidInput = true;
}
if (checkInput($gender)) {
    $_SESSION['emptyGender'] = true;
    $invalidInput = true;
}
if (checkInput($dateOfBirth)) {
    $_SESSION['emptyDateOfBirth'] = true;
    $invalidInput = true;
}
if (checkInput($emailAddress)) {
    $_SESSION['emptyEmailAddress'] = true;
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
if (checkName($firstName)) {
    $_SESSION['invalidFirstName'] = true;
    $invalidInput = true;
}
if (checkName($lastName)) {
    $_SESSION['invalidLastName'] = true;
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
if ($invalidInput) {
    $invalidInput = true;
} else {
    $userInformationFile = fopen('user_information.txt', 'a');
    $userInformation = $firstName."|".$lastName."|".$gender."|".$dateOfBirth."|".$emailAddress."|".$password;
    fwrite($userInformationFile, $userInformation);
    header('location: home.php');
}