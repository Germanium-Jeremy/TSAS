<?php
include('../php/dbConnection.php');

if(isset($_POST['id']) && isset($_POST['table'])) {
    $id = $_POST['id'];
    $table = $_POST['table'];

    // Perform the deletion
    $sql = "DELETE FROM $table WHERE ID = $id";
    if ($connection->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "error";
    }
} else {
    echo "Invalid request";
}
?>
