<?php
if (!isset($_COOKIE['authorized']))
{
    header('location: index.php?error_message=UnauthorizedAccess');
}
?>
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
                <a href="view_all_user.php">View all user</a>
                <hr>
                <a href="view_all_admin.php">View all admin</a>
                <hr>
                <a href="view_all_buyer.php">View all buyer</a>
                <hr>
                <a href="view_all_seller.php">View all seller</a>
                <hr>
                <a href="view_all_expert.php">View all Expert</a>
                <hr>
                <a href="view_all_delivery_man.php">View all Delivery man</a>
                <hr>
                <a href="log_out.php">Log out</a>
                <hr>
            </td>
            <td class="dashboard">
                <table class="dashboard_table">
                    <tr>
                        <th class="dashboard_table_data">User ID</th>
                        <th class="dashboard_table_data">First name</th>
                        <th class="dashboard_table_data">Last name</th>
                        <th class="dashboard_table_data">Gender</th>
                        <th class="dashboard_table_data">Date of birth</th>
                        <th class="dashboard_table_data">Email Address</th>
                        <th class="dashboard_table_data">Role</th>
                    </tr>
                    <?php
                    $deliveryManInformationFile = fopen('delivery_man_information.txt', 'r');
                    for ($i = 1; !feof($deliveryManInformationFile); $i++)
                    {
                        echo "<tr>";
                        $deliveryManInformation = fgets($deliveryManInformationFile);
                        $deliveryManInformation = explode('|', $deliveryManInformation);
                        for ($j = 0; $j < count($deliveryManInformation); $j++)
                        {
                            if ($j == 6) {
                                continue;
                            }
                            echo "<td class='dashboard_table_data'>{$deliveryManInformation[$j]}</td>";
                        }
                        ?>
                        <form action="editing_page.php" method="post">
                            <?php
                            echo "<td><input type='submit' value='Edit {$i}' name='edit' class='edit_button'></td>";
                            ?>
                        </form>
                        <form action="delete.php" method="post">
                            <?php
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