<?php
if (!isset($_COOKIE['authorized']))
{
    header('location: index.php');
}
?>
<?php
include_once 'get_time.php';

$message = $_POST['message'];
$sender = $_COOKIE['emailAddress'];
$receiver = $_POST['experts'];

$messages = $message."|".$sender."|".$receiver."|".getTime()."\r\n";
$chat_file = fopen('chat.txt', 'a');
fwrite($chat_file, $messages);
header('location: chat_with_expert.php');