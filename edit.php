<?php
if (!isset($_COOKIE['authorized']))
{
    header('location: index.php?error_message=UnauthorizedAccess');
}
?>
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
        $firstName = $userInformation[1];
        $lastName = $userInformation[2];
        $gender = $userInformation[3];
        $dateOfBirth = $userInformation[4];
        $emailAddress = $userInformation[5];
        $role = $userInformation[7];
    }
}

$replaceFirstName = $_POST['firstName'];
$repplaceLastName = $_POST['lastName'];
$replaceGender = $_POST['gender'];
$replaceDateOfBirth = $_POST['dateOfBirth'];
$replaceEmailAddress = $_POST['emailAddress'];
$replaceRole = $_POST['role']."\n";

for ($i = 1; !feof($userInformationFile); $i++)
{
    $usersInformation = fgets($userInformationFile);
    $userInformation = explode('|', $usersInformation);
    if ($i == $editUser)
    {
        $firstName = $userInformation[1];
        $lastName = $userInformation[2];
        $gender = $userInformation[3];
        $dateOfBirth = $userInformation[4];
        $emailAddress = $userInformation[5];
        $role = $userInformation[7];
        break;
    }
}


file_put_contents('user_information.txt', str_replace($firstName, $replaceFirstName, file_get_contents('user_information.txt')));
file_put_contents('user_information.txt', str_replace($lastName, $repplaceLastName, file_get_contents('user_information.txt')));
file_put_contents('user_information.txt', str_replace($gender, $replaceGender, file_get_contents('user_information.txt')));
file_put_contents('user_information.txt', str_replace($dateOfBirth, $replaceDateOfBirth, file_get_contents('user_information.txt')));
file_put_contents('user_information.txt', str_replace($emailAddress, $replaceEmailAddress, file_get_contents('user_information.txt')));
file_put_contents('user_information.txt', str_replace($role, $replaceRole, file_get_contents('user_information.txt')));
header('Location: view_all_user.php');