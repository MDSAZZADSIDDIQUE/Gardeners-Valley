<?php
session_start();
$editUser = $_SESSION['editUser'];

$userInformationFile = fopen('user_information.txt', 'r');
for ($i = 1; !feof($userInformationFile); $i++)
{
    $usersInformation = fgets($userInformationFile);
    $userInformation = explode('|', $usersInformation);
    if ($i == $editUser)
    {
        $firstName = $userInformation[0];
        $lastName = $userInformation[1];
        $emailAddress = $userInformation[2];
    }
}

$replaceFirstName = $_POST['firstName'];
$repplaceLastName = $_POST['lastName'];
$replaceEmailAddress = $_POST['emailAddress'];

file_put_contents('user_information.txt', str_replace($firstName, $replaceFirstName, file_get_contents('user_information.txt')));
file_put_contents('user_information.txt', str_replace($lastName, $repplaceLastName, file_get_contents('user_information.txt')));
file_put_contents('user_information.txt', str_replace($emailAddress, $replaceEmailAddress, file_get_contents('user_information.txt')));
header('Location: view_all_user.php');