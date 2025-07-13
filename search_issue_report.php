<?php
include 'data_class.php'; // Include your data class file

$u = new data;
$u->setconnection();

if (isset($_POST['search_issue_report'])) {
    $searchValue = $_POST['search_issue_report'];
    $issueDate = isset($_POST['issueDate']) ? $_POST['issueDate'] : "";
    $returnDate = isset($_POST['returnDate']) ? $_POST['returnDate'] : "";

    // Debugging: Print the captured date values
    echo "Issue Date: " . $issueDate . "<br>";
    echo "Return Date: " . $returnDate . "<br>";

    $recordset = $u->issuereport($searchValue, $issueDate, $returnDate);

    $table = "<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'>
                <tr><th style='padding: 8px;'>Issue Name</th><th>Book Name</th><th>Issue Date</th><th>Return Date</th><th>Issue Type</th><th>Action</th></tr>";

    foreach ($recordset as $row) {
        $table .= "<tr>";
        $table .= "<td>$row[2]</td>"; // Issue Name
        $table .= "<td>$row[3]</td>"; // Book Name
        $table .= "<td>$row[6]</td>"; // Issue Date
        $table .= "<td>$row[7]</td>"; // Return Date
        $table .= "<td>$row[4]</td>"; // Issue Type
        
        // Check if the book has been returned
        if ($row['returned']) {
            $table .= "<td><button type='button' class='return-btn btn btn-secondary' data-issueid='$row[0]' disabled>Returned</button></td>";
        } else {
            $table .= "<td><button type='button' class='return-btn btn btn-primary' data-issueid='$row[0]'>Return</button></td>";
        }
        
        $table .= "</tr>";
    }

    $table .= "</table>";

    echo $table;
    exit;
}
?>
