<?php
if (!isset($_COOKIE['authorized']))
{
    header('location: index.php');
}
?>
<html>
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Monoton&family=Open+Sans&display=swap" rel="stylesheet">
    <title>Seller</title>
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
        vertical-align: text-top;
    }
    .dashboard {
        width: 70vw;
    }
    .dashboard_header {
        font-family: 'Monoton', cursive;
        font-size: 50px;
        margin-top: 50px;
        vertical-align: top;
    }
    fieldset {
        font-family: 'Open Sans', sans-serif;
        font-size: 25px;
        display: inline-block;
        background-color: rgba(0, 0, 0, 0.75);
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
                <a href="chat.php">Chat</a>
                <hr>
                <a href="log_out.php">Log out</a>
                <hr>
            </td>
            <td class="dashboard">
            <form action="chatting.php" method="POST">
                    <fieldset>
                    <?php
$chatFile = fopen('chat.txt', 'r');
while (!feof($chatFile)) {
    $chats = fgets($chatFile);
    if ($chats == "")
    {
        break;
    }
    $chat = explode('|', $chats);
    $message = $chat[0];
    $sender = $chat[1];
    echo "Message: {$message}<br>";
    echo "From: {$sender}<br>";
    echo "Sent: {$chat[3]}<br>";
}
?>
<input type="text" name="message" id="message">
                    <input type="submit" value="Send">
                    </fieldset>
                </form>
            </td>
        </tr>
    </table>
</body>
</html>