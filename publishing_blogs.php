<?php
$title = $_POST['title'];
$author = $_POST['author'];
$blog = $_POST['blog'];

$source = $_FILES['image']['tmp_name'];
$destination = "images/".$_FILES['image']['name'];
move_uploaded_file($source, $destination);

$blogsFile = fopen('blogs.txt', 'a');
$blogs = $title."|".$author."|".$blog."|".$destination;
fwrite($blogsFile, $blogs);
header('Location: blogs.php');