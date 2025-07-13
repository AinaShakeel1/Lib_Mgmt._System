<?php
require 'data_class.php'; // Include your data class

$id = $_POST['issueid'] ?? '';

if (!empty($id)) {
    $u = new data;
    $u->setconnection();
    $result = $u->returnbook($id);
    $output = ob_get_contents(); // Get the buffered output
    ob_end_clean(); // Clear the buffer and stop buffering

    // Check if there's any unwanted output
    if (!empty($output)) {
        error_log("Unexpected output detected: " . $output);
    }

    echo trim($result);
    // echo trim($result);// Output only the result, trimmed of extra whitespace
}
?>
