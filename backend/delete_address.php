<?php
session_start();
$User_id = $_SESSION['user_id'];


require 'db-config.php';

$address_delete = "UPDATE users SET UserAddress='NULL', UserAddress2='NULL', UserCity='NULL', UserState='NULL', UserCountry='NULL', UserZip='NULL', UserFax='NULL' WHERE UserID='$User_id' ";

if (mysqli_query($conn, $address_delete)) {
    echo 1;
} else {
    echo 0;
}
?>