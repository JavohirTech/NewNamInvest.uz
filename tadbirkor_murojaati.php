<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $message = $_POST["message"];

    // Email configuration
    $to = "starkcoders@gmail.com"; // Change this to your email address
    $subject = "New Form Submission";

    // Email body
    $body = "F.I.O: $name\n";
    $body .= "Pochta manzil: $email\n";
    $body .= "Telefon raqami: $phone\n";
    $body .= "Manzil: $address\n";
    $body .= "Loyiha haqida qisqacha: $message\n";

    // Send email
    $headers = "From: $email\r\n";

    // Attachments handling
    if (isset($_FILES["file"]) && $_FILES["file"]["error"] == UPLOAD_ERR_OK) {
        $file_name = $_FILES["file"]["name"];
        $file_path = $_FILES["file"]["tmp_name"];
        $file_content = file_get_contents($file_path);

        $attachment = chunk_split(base64_encode($file_content));

        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: multipart/mixed; boundary=\"boundary\"\r\n\r\n";
        $headers .= "--boundary\r\n";
        $headers .= "Content-Type: application/octet-stream; name=\"$file_name\"\r\n";
        $headers .= "Content-Transfer-Encoding: base64\r\n";
        $headers .= "Content-Disposition: attachment\r\n\r\n";
        $headers .= "$attachment\r\n\r\n";
        $headers .= "--boundary--";
    }

    mail($to, $subject, $body, $headers);
}
?>
