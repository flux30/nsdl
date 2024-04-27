<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get location data
    $latitude = $_POST["latitude"];
    $longitude = $_POST["longitude"];
    // Generate unique filename
    $filename = 'location_' . uniqid() . '.txt';
    // Save location
    file_put_contents($filename, "{$latitude},{$longitude}");
    // Send response
    echo json_encode(["filename" => $filename]);
} else {
    // Method not allowed
    http_response_code(405);
    echo json_encode(["error" => "Method Not Allowed"]);
}
?>
