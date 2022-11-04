<?php
session_start();
$emailAddress = $_POST['emailAddress'];
$password = $_POST['password'];

$userInformationFile = fopen('user_information.txt', 'r');
while (!feof($userInformationFile))
{
    $usersInformation = fgets($userInformationFile);
    $userInformation = explode('|', $usersInformation);
    if ($emailAddress == $userInformation[2] && $password == $userInformation[3])
    {
        header('Location: home.php');
    } else {
        echo "World";
        $_SESSION['unmatchedInformations'] = true;
        header('Location: log_in.php');
    }
}