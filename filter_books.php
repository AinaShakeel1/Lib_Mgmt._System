<?php
include 'data_class.php'; // Include your data handling class

// Create an instance of your data class
$u = new data;
$u->setconnection();

// Get selected categories from the AJAX request
$selectedCategories = isset($_POST['categories']) ? $_POST['categories'] : [];

// Fetch the books with filtering
$recordset = $u->getbookcat($selectedCategories);

// Prepare the table for the response
$table = "<table style='font-family: Arial, Helvetica, sans-serif; border-collapse: collapse; width: 100%;'>
            <tr>
                <th style='padding: 8px;'>Book Name</th>
                <th>Category</th>
                <th>Quantity</th>
                <th>Available</th>
                <th>Issued</th>
                <th>View</th>
                <th>Delete</th>
            </tr>";

foreach ($recordset as $row) {
    $table .= "<tr id='book-row-$row[0]'>";
    $table .= "<td>$row[2]</td>";
    $table .= "<td>$row[6]</td>"; // category
    $table .= "<td>$row[8]</td>"; // quantity
    $table .= "<td>$row[9]</td>"; // available
    $table .= "<td>$row[10]</td>"; // issued
    $table .= "<td><a href='admin_service_dashboard.php?viewid=$row[0]'><button type='button' class='btn btn-primary' style='background-color:#b71c1c;'>View Book</button></a></td>";
    $table .= "<td><a href='#' onclick='deleteBook($row[0]); return false;' style='color: #b71c1c'>Delete</a></td>";
    $table .= "</tr>";
}
$table .= "</table>";

// Return the table as a response
echo $table;
?>
