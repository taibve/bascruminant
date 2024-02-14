<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View and Edit CSV Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
body {
    font-family: Arial, sans-serif;
    margin: 20px;
}

textarea {
    width: 100%;
}

h2, h5 {
    text-align: center;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    border: 1px solid #ddd;
    padding: 12px;
    text-align: center;
}

th {
    background-color: #f2f2f2;
    font-weight: bold;
}

tr:hover {
    background-color: #f5f5f5;
}

/* Add some responsiveness */
@media (max-width: 767px) {
    table {
        width: 100%;
    }

    th, td {
        display: block;
        width: 100%;
        box-sizing: border-box;
    }

    th {
        background-color: #f2f2f2;
        font-weight: bold;
        text-align: center;
    }
}
.smallTable {
    width: 100%;
    margin-top: 20px;
}

.smallTable th, .smallTable td {
    border: 1px solid #ddd;
    padding: 12px;
    text-align: left;
}

.smallTable th {
    background-color: #f2f2f2;
    font-weight: bold;
}

.smallTable tr:hover {
    background-color: #f5f5f5;
}

.smallTable td div.editable {
    min-width: 80px;
    max-width: 150px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.smallTable input[type="submit"], .print-button {
    margin-top: 10px;
    padding: 12px;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.smallTable input[type="submit"] {
    background-color: #28a745; /* Bootstrap success color */
}

.smallTable input[type="submit"]:hover {
    background-color: #218838; /* Bootstrap success color darker shade */
}

.print-button {
    background-color: #007bff; /* Bootstrap primary color */
}

.print-button:hover {
    background-color: #0056b3; /* Bootstrap primary color darker shade */
}

.container {
    max-width: 1200px;
    margin: 0 auto;
}
.div-bottom{
    display: flex;
    justify-content: flex-start;

}

    </style>
</head>

<body>
    <?php
    $currentMonthAndYear = date("F Y");

    if (isset($_GET['file'])) {
        // Define the folder where the CSV files are stored
        $csvFolder = "csv/";

        // Get the requested CSV file
        $requestedFile = $_GET['file'];
        $csvFilePath = $csvFolder . $requestedFile;

        // Check if the file exists
        if (file_exists($csvFilePath)) {
            // Check if the form is submitted
            if (isset($_POST['csvData'])) {
                // Save the updated data back to the CSV file
                file_put_contents($csvFilePath, $_POST['csvData']);
            }

            // Read the CSV file
            $csvData = file_get_contents($csvFilePath);
            $rows = explode("\n", $csvData);

            // Display CSV file contents in a table
            echo "<h2>CSV File: $requestedFile</h2>";
            echo "<h2>QUARTERLY REPORT OF BIOLOGICAL ASSET</h2>";
            echo "<h5>CATTLE PROJECT</h5>";
            echo "<h5>as of $currentMonthAndYear</h5>";        
            echo "<form action='' method='post'>";
            echo "<table class='smallTable'>";
            echo "</table>";
            echo "<br>";
            echo "</form>";


            // Nested fixed table structure
            echo '<table border="1">';
            echo '<tr>';
                echo '<th rowspan="3">Biological Asset Number</th>';
                echo '<th rowspan="3">Description</th>';
                echo '<th colspan="2">Balance Per Card</th>';
                echo '<th colspan="8">Additions</th>';
                echo '<th colspan="8">Reductions</th>';
                echo '<th colspan="2">Balance Per Card</th>';
                echo '<th rowspan="3">Remarks</th>';
                echo '</tr>';
            echo '<tr>';
                echo '<th colspan="2">Per Last Report</th>';
                echo '<th colspan="2">Purchase</th>';
                echo '<th colspan="2">Birth</th>';
                echo '<th colspan="2"></th>';
                echo '<th colspan="2">Total</th>';
                echo '<th colspan="2">Sale</th>';
                echo '<th colspan="2">Death</th>';
                echo '<th colspan="2">Others</th>';
                echo '<th colspan="2">Total</th>';
                echo '<th colspan="2">End of Period</th>';
            echo '</tr>'; 
            echo '<tr>';
                echo '<th>Quantity</th>';
                echo '<th>Fair Value</th>';
                echo '<th>Quantity</th>';
                echo '<th>Cost</th>';
                echo '<th>Quantity</th>';
                echo '<th>Fair Value</th>';
                echo '<th>Quantity</th>';
                echo '<th>Cost/Fair Value</th>';
                echo '<th>Quantity</th>';
                echo '<th>Cost/Fair Value</th>';
                echo '<th>Quantity</th>';
                echo '<th>Selling Price</th>';
                echo '<th>Quantity</th>';
                echo '<th>Fair Value</th>';
                echo '<th>Quantity</th>';
                echo '<th>Cost/Fair Value</th>';
                echo '<th>Quantity</th>';
                echo '<th>Cost/Fair Value</th>';
                echo '<th>Quantity</th>';
                echo '<th>Fair Value</th>';
            echo '</tr>'; 
       

            // Counter to keep track of rows
            $rowCounter = 1;

            foreach ($rows as $row) {
                if ($rowCounter >= 4) {
                    echo "<tr>";

                    $cells = str_getcsv($row);
                    foreach ($cells as $cell) {
                        echo "<td><div>$cell</div></td>";
                    }

                    echo "</tr>";
                }

                // Increment the row counter
                $rowCounter++;
            }
        } else {
            echo "<p>CSV file not found.</p>";
        }
    } else {
        echo "<p>No CSV file specified.</p>";
    }
    echo '</table>';
    ?>
    <div class="div-bottom"> 
        <div style="margin-right: 33.5%;">   
        <?php
            echo '<br>';
            echo 'Prepared By:';
            echo '<br>';
            echo '<br>';
            echo '<strong>CELSO SANTO DOMINGO</strong>';
            echo '<br>';
            echo 'Project-In-Charge';
        ?>
        </div>
        <div style="margin-right: 16%; margin-left: 10%; height:60px; padding-left: 200px; background-color:red;">   
        <?php
            echo '<br>';
            echo 'Witnessed By: Certified Correct:';
            echo '<br>';
            echo '<br>';
            echo '<strong>RONA ANGELA O. CLARIN</strong>';
            echo '<br>';
            echo 'Supply-Officer/Property Custodian';
        ?>
        </div>
        <div style="margin-left: 30%;">   
        <?php
            echo '<br>';
            echo 'Verified By:';
            echo '<br>';
            echo '<br>';
            echo '<strong>MA. DOLORES G. BERSAMINA</strong>';
            echo '<br>';
            echo 'Accountant III';
        ?>
        </div>
    </div>
    
</body>

</html>
