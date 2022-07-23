<?php

session_start();
session_unset();
session_destroy();

$logoutSuccess = "You Are Logged Out";

header("Location: /login.php?logout=$logoutSuccess");

?>