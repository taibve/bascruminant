<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "bsaura";

    $connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // Check if the user confirms the deletion
    if (isset($_GET["confirm"]) && $_GET["confirm"] == "true") {
        // Use prepared statement to delete the record
        $sql = "DELETE FROM user_tbl WHERE email = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("s", $id);

        if ($stmt->execute()) {
            // Record deleted successfully
            $stmt->close();
            $connection->close();
            header("Location: user.php");
            exit;
        } else {
            // Error occurred during deletion
            echo "Error deleting record: " . $stmt->error;
            $stmt->close();
            $connection->close();
        }
    } else {
        // Display confirmation dialog
        echo '<script>
            var result = confirm("Are you sure you want to delete this record?");
            if (result) {
                window.location.href = "delete.php?id=' . $id . '&confirm=true";
            } else {
                window.location.href = "user.php";
            }
        </script>';
    }
} else {
    // ID parameter is missing
    echo "ID parameter is missing";
}
?>
