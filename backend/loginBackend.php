<!--login Backend-->
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$email = $_POST['Username'];
$pass = $_POST['Password'];


//message variables
$loginError = "Enter Correct Information";

require 'db-config.php';


$loginCheck = "SELECT * from users WHERE ((UserEmail='$email' OR UserPhone='$email') AND UserPassword='$pass')";
$result = mysqli_query($conn, $loginCheck) or die('Select query not fired in loginBacked');


if (mysqli_num_rows($result) > 0) {

    echo "inside if";
    $row = mysqli_fetch_assoc($result);

    $loginSuccess = "Login Successful";

    session_start();

    $_SESSION['userFirstName'] = $row['UserFirstName'];
    $_SESSION['userLastName'] = $row['UserLastName'];
    $_SESSION['userEmailAddress'] = $row['UserEmail'];
    $_SESSION['user_id'] = $row['UserID'];
    $_SESSION['loginStatus'] = true;

    if (isset($_SESSION['loginStatus'])) {
        header("Location: /userAccount.php");
    }
} else {
    header("Location: /login.php?msg=$loginError");
}


?>