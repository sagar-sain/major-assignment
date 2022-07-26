<?php

require 'db-config.php';

if (isset($_POST['query'])) {
    $searched_query = $_POST['query'];

    $sql = "SELECT * FROM products WHERE ProductName LIKE '%$searched_query%' OR ProductSKU LIKE '%$searched_query%' OR ProductLongDesc LIKE '%$searched_query%'";
    $result = mysqli_query($conn, $sql);

    $total = mysqli_num_rows($result);

    if ($total) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<a href="#" class="list-group-item list-group-item-action border-1">' . $row['ProductName'] . '</a>';
        }
    } else {
        echo '<p class="list-group-item border-1">No Record</p>';
    }
}

?>