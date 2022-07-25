<?php
session_start();
$User_id = $_SESSION['user_id'];

$address = $_POST['userAddress'];
$address2 = $_POST['userAddress2'];
$City = $_POST['city'];
$state = $_POST['userState'];
$country = $_POST['userCountry'];
$zip = $_POST['userZip'];
$fax = $_POST['userFax'];

require 'db-config.php';

$address_query = "UPDATE users SET UserAddress='$address', UserAddress2='$address2', UserCity='$City', UserState='$state', UserCountry='$country', UserZip='$zip', UserFax='$fax' WHERE UserID='$User_id' ";

if (mysqli_query($conn, $address_query)) {
    echo 1;
} else {
    echo 0;
}
?>