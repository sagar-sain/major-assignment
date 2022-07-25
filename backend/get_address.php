<?php

session_start();
$User_id = $_SESSION['user_id'];


require 'db-config.php';

$address_query = "SELECT * from users WHERE UserID='$User_id' ";
$result = mysqli_query($conn, $address_query);

$address_table = "";

if (mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);

    $address_table .="<div>Address: ".$row['UserAddress']."</div>"."<div>Address 2: ".$row['UserAddress2']."</div>"."<div>City: ".$row['UserCity']."</div>"."<div>State: ".$row['UserState'].
    "</div>"."<div>Country ".$row['UserCountry']."</div>"."<div>Zipcode: ".$row['UserZip']."</div>"."<div>Fax: ".$row['UserFax']."</div>";

    echo $address_table;
}


?>