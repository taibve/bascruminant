<?php
if (isset($_GET['file'])) {
    $filename = $_GET['file'];
    $csvFilePath = "csv/" . $filename;

    // Check if the file exists
    if (file_exists($csvFilePath)) {
        // Output CSV content for printing
        header('Content-Type: text/html');
        echo '<html>';
        echo '<head>';
        echo '<title>Print CSV</title>';
        echo '</head>';
        echo '<body>';

        // Read and output CSV content
        if (($handle = fopen($csvFilePath, "r")) !== FALSE) {
            echo '<pre>'; // Preserve formatting
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                foreach ($data as $value) {
                    echo htmlspecialchars($value) . "\t";
                }
                echo "\n";
            }
            echo '</pre>';
            fclose($handle);

            // Use JavaScript to trigger the print
            echo '<script type="text/javascript">';
            echo 'window.onload = function() { window.print(); }';
            echo '</script>';
        } else {
            echo '<p>Error reading CSV file</p>';
        }

        echo '</body>';
        echo '</html>';
        exit;
    } else {
        echo "File not found.";
    }
} else {
    echo "Invalid request.";
}
?>