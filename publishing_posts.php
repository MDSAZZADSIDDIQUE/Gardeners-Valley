<?php
if (!isset($_COOKIE['authorized']))
{
    header('location: index.php?error_message=UnauthorizedAccess');
}
?>
<?php
$caption = $_POST['caption'];

$source = $_FILES['image']['tmp_name'];
$destination = "images/".$_FILES['image']['name'];
move_uploaded_file($source, $destination);

$postsFile = fopen('post.txt', 'a');
$posts = $caption."|".$destination."\n";
fwrite($postsFile, $posts);
header('Location: newsfeed.php');