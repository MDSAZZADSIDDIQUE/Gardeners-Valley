<?php
session_start();
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
        height: 100vh;
        padding-left: 10px;
        text-align: left;
        width: 30vw;
    }
    .dashboard {
        width: 70vw;
    }
    .dashboard_header {
        font-family: 'Monoton', cursive;
        font-size: 50px;
        vertical-align: top;
    }
    .active {
        font-family: 'Monoton', cursive;
        font-size: 30px;
    }
    .dashboard_table {
        border: 0;
        font-family: 'Open Sans', sans-serif;
        font-size: 30px;
        background-color: rgba(0, 0, 0, 0.75);
    }
    .dashboard_table_data {
        border: 1px solid;
        height: 10px;
    }
    .edit_button {
        background-color: white;
        font-size: 30px;
        border-radius: 8px;
        color: blue;
        border: 2px solid blue;
        transition-duration: 0.4s;
        width: 70px;
    }
    .edit_button:hover {
        background-color: blue;
        color: white;
    }
    .delete_button {
        background-color: white;
        font-size: 30px;
        border-radius: 8px;
        color: red;
        border: 2px solid red;
        transition-duration: 0.4s;
        width: 100px;
    }
    .delete_button:hover {
        background-color: red;
        color: white;
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
                <a href="view_all_user.php" class="active">View all user</a>
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
                <table class="dashboard_table">
                    <tr>
                        <th class="dashboard_table_data">User ID</th>
                        <th class="dashboard_table_data">First Name</th>
                        <th class="dashboard_table_data">Last Name</th>
                        <th class="dashboard_table_data">Email Address</th>
                    </tr>
                    <?php
                    $userInformationFile = fopen('user_information.txt', 'r');
                    for ($i = 1; !feof($userInformationFile); $i++)
                    {
                        echo "<tr>";
                        echo "<td class='dashboard_table_data'>{$i}</td>";
                        $usersInformation = fgets($userInformationFile);
                        $userInformation = explode('|', $usersInformation);
                        for ($j = 0; $j < count($userInformation) - 1; $j++)
                        {
                            echo "<td class='dashboard_table_data'>{$userInformation[$j]}</td>";
                        }
                        ?>
                        <form action="editing_page.php" method="post">
                            <?php
                            echo "<td><input type='submit' value='Edit {$i}' name='edit' class='edit_button'></td>";
                            echo "<td><input type='submit' value='Delete {$i}' name='delete' class='delete_button'></td>";
                            ?>
                        </form>
                        <?php
                        echo "</tr>";
                    }
                    ?>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>