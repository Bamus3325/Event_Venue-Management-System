<?php
header('Content-Type: application/json');

// Database credentials
include 'includes/dbconnection.php';

// Query to fetch data
$sql = "SELECT venuename, price FROM tblservice";
$result = $conn->query($sql);

$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = array($row['venuename'], (int)$row['price']);
}

$conn->close();

// Add the header row
array_unshift($data, array('Venues', 'Amounts'));

// Return data as JSON
echo json_encode($data);
?>
