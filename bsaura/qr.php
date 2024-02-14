<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'phpqrcode/qrlib.php';
include 'connection.php';

if ($connection->connect_error) {
    die('Connection failed: ' . $connection->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Display the HTML form for entering data
    echo <<<HTML
    <!DOCTYPE html>
    <html lang="en">
    <head>
          <link rel="icon" href="wimg/CA.png" type="image/x-icon">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>QR Code Generator</title>
    </head>
    <body>
        <h2>Generate and Save QR Code</h2>
    
        <!-- HTML form to input data -->
        <form method="post" action="">
            <label for="data">Enter data:</label>
            <input type="text" name="data" required>
            <button type="submit">Generate and Save QR Code</button>
        </form>
    </body>
    </html>
HTML;
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the data from the POST request
    $data = isset($_POST['data']) ? $_POST['data'] : '';

    // Generate a unique name for the QR code image
    $img_upload = "qrimg/" . uniqid() . ".png";

    // Create a QR code and save it to the specified path
    QRcode::png($data, $img_upload);

    // Check if QR code generation and save were successful
    if (file_exists($img_upload)) {
        // Save QR code name in the database
        $sql = "INSERT INTO carabao_tbl (qr) VALUES ('$img_upload')";
        if ($connection->query($sql) === TRUE) {
            echo 'QR code generated and saved successfully.<br>';
            echo '<img src="' . $img_upload . '" alt="Generated QR Code"><br>';
            echo 'QR code name saved in the database.';
        } else {
            echo 'Error: ' . $sql . '<br>' . $connection->error;
        }
    } else {
        echo 'Error: QR code generation or save failed.';
    }
} else {
    echo 'Invalid request method.';
}

// Close the database connection
$connection->close();
?>
