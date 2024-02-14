<?php
function printEntirePage() {
    // Start output buffering to capture the HTML output
    ob_start();

    // Include the HTML content
    include 'vreport.php?file=$filename';

    // Get the captured HTML content
    $pageContent = ob_get_clean();

    // Print the content
    echo $pageContent;
}

// Call the function to print the entire page
printEntirePage();
?>
