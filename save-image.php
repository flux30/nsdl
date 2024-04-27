<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get image data
    $imageData = $_POST["image"];
    // Extract base64 encoded part
    $encodedData = explode(',', $imageData)[1];
    // Decode base64 data
    $decodedImage = base64_decode($encodedData);
    // Generate unique filename
    $filename = 'image_' . uniqid() . '.png';
    // Save image
    file_put_contents($filename, $decodedImage);
    // Send response
    echo json_encode(["filename" => $filename]);
} else {
    // Method not allowed
    http_response_code(405);
    echo json_encode(["error" => "Method Not Allowed"]);
}
?>
