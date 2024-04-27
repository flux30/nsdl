<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get audio data
    $audioData = file_get_contents($_FILES['audio']['tmp_name']);
    // Generate unique filename
    $filename = 'audio_' . uniqid() . '.webm';
    // Save audio
    file_put_contents($filename, $audioData);
    // Send response
    echo json_encode(["filename" => $filename]);
} else {
    // Method not allowed
    http_response_code(405);
    echo json_encode(["error" => "Method Not Allowed"]);
}
?>
