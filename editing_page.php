<?php
if (!isset($_COOKIE['authorized']))
{
    header('location: index.php?error_message=UnauthorizedAccess');
}
?>
<?php
session_start();
$userId = explode('Edit ', $_POST['edit']);
$editUser = $userId[1];
$_SESSION['editUser'] = $editUser;
$firstName;
$lastName;
$gender;
$dateOfBirth;
$emailAddress;
$role;

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
?>
<html>
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Monoton&family=Open+Sans&display=swap" rel="stylesheet">
    <title>Admin panel</title>
</head>
<style>
    body {
        background-image: url('images/pexels-sohail-nachiti-807598.jpg');
        background-size: cover;
        margin: 0;
    }
    table {
        border: 10px solid #FFFFFF;
        border-top: 0;
        color: #FFFFFF;
        font-family: 'Monoton', cursive;
        height: 100vh;
        width: 100%;
    }
    a {
        color: #FFFFFF;
        font-size: 25px;
        text-decoration: none;
    }
    .header {
        border: 10px solid #FFFFFF;
        font-size: 75px;
        height: 30px;
        text-align: center;
    }
    .side_panel {
        background-color: rgba(0, 0, 0, 0.75);
        border: 5px solid;
        border-bottom: 0;
        border-left: 0;
        border-top: 0;
        font-family: 'Open Sans', sans-serif;
        font-size: 25px;
        padding-left: 10px;
        text-align: left;
        width: 30vw;
    }
    .dashboard {
        padding-left: 22.5vw;
        width: 70vw;
        text-align: center;
    }
    .dashboard_header {
        font-family: 'Monoton', cursive;
        font-size: 50px;
        vertical-align: top;
    }
    fieldset {
        background-color: rgba(0, 0, 0, 0.75);
        width: 25vw;
    }
    .subheader {
        font-size: 50px;
        text-align: center;
    }
    .label{
        font-family: 'Open Sans', sans-serif;
        font-size: 25px;
    }
    input {
        width: 100%;
    }
</style>
<body>
    <table class="header">
        <tr>
            <td>GARDENERS VALLEY</td>
        </tr>
</table>
<table>
        <tr>
            <td class="side_panel">
                <p class="dashboard_header">Dashboard</p>
                <hr>
                <a href="view_all_user.php">View all user</a>
                <br>
                <hr>
                <a href="">View all buyer</a>
                <br>
                <hr>
                <a href="">View all seller</a>
                <br>
                <hr>
                <a href="">View all expert</a>
                <br>
                <hr>
                <a href="">View all delivery man</a>
                <br>
                <hr>
                <a href="">Chat</a>
                <hr>
            </td>
            <td class="dashboard">
                <form action="edit.php" method="POST">
                    <fieldset>
                        <p class="subheader">Edit</p>
                        <hr>
                        <p class="label">User ID:</p>
                        <hr>
                        <input type="number" name="userID" id="user_id"  value=<?php echo $editUser ?>>
                        <hr>
                        <label for="edit.php" class="label">First name</label>
                        <hr>
                        <input type="text" name="firstName" id="first_name" value=<?php echo $firstName ?>>
                        <hr>
                        <label for="last_name" class="label">Last name</label>
                        <hr>
                        <input type="text" name="lastName" id="last_name" value=<?php echo $lastName ?>>
                        <hr>
                        <label for="gender" class="label">Gender</label>
                        <hr>
                        <input type="text" name="gender" id="gender" value=<?php echo $gender ?>>
                        <hr>
                        <hr><label for="date_of_birth" class="label">Date of birth</label>
                        <hr>
                        <input type="text" name="dateOfBirth" id="date_of_birth" value=<?php echo $dateOfBirth ?>>
                        <hr>
                        <label for="emailAddress" class="label">Email Address</label>
                        <hr>
                        <input type="email" name="emailAddress" id="email_address" value=<?php echo $emailAddress ?>>
                        <hr>
                        <label for="role" class="label">Role</label>
                        <hr>
                        <input type="text" name="role" id="role" value=<?php echo $role ?>>
                        <hr>
                        <input type="submit" value="Confirm edit">
                    </fieldset>
                </form>
            </td>
        </tr>
    </table>
</body>
</html>