<?php
session_start();

$_SESSION = array();

session_destroy();

header("Location: login.php"); // Change "login.php" to the desired destination

exit();

?>