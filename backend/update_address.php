<?php

session_start();
$User_id = $_SESSION['user_id'];


require 'db-config.php';

$address_update = "SELECT * from users WHERE UserID='$User_id' ";
$result = mysqli_query($conn, $address_update);

$arr =[];
if (mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
    $arr['address'] = $row['UserAddress'];
    $arr['address2'] = $row['UserAddress2'];
    $arr['city'] = $row['UserCity'];
    $arr['state'] = $row['UserState'];
    $arr['country'] = $row['UserCountry'];
    $arr['zip'] = $row['UserZip'];
    $arr['fax'] = $row['UserFax'];

    echo json_encode($arr);
}

?>