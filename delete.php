<?php
if (!isset($_COOKIE['authorized']))
{
    header('location: index.php');
}
?>
<?php
session_start();
$userId = explode('Delete ', $_POST['delete']);
$editUser = $userId[1];
$usersInformation;

$userInformationFile = fopen('user_information.txt', 'r');
for ($i = 1; !feof($userInformationFile); $i++)
{
    $usersInformation = fgets($userInformationFile);
    if ($i == $editUser)
    {
        break;
    }
}
file_put_contents('user_information.txt', str_replace($usersInformation, "", file_get_contents('user_information.txt')));
header('Location: view_all_user.php');