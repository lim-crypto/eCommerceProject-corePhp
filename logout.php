<?php 
session_start();
session_unset(); 
session_destroy();
setcookie('user', $user, time() - (86400 * 30));
header('location:login.php');