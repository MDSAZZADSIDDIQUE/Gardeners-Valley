<?php
setcookie('authorized', 'true', time()-3600, '/');
setcookie('emailAddress', 'true', time()-3600, '/');
setcookie('Password', 'true', time()-3600, '/');
    header('location: index.php');