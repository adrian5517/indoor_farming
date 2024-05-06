<?php
error_reporting(0);

header("Content-Type: application/json");
include("db_connection.php");

$response = array();
$result = $con->query("SELECT * FROM onlinemonitoring ORDER BY created_at DESC LIMIT 1");

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $response['data'] = $row;
} else {
    $response['data'] = null;
}

echo json_encode($response);
?>
