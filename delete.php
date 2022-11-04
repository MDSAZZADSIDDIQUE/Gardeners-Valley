<?php
session_start();
$editUser = $_SESSION['editUser'];

$userInformationFile = fopen('user_information.txt', 'r');
for ($i = 1; !feof($userInformationFile); $i++)
{
    
    if ($i == $editUser)
    {
        $usersInformation = fgets($userInformationFile);
        break;
    }
}
file_put_contents('user_information.txt', str_replace($usersInformation, "", file_get_contents('user_information.txt')));


header('Location: view_all_user.php');