<?php
include("data_class.php");

if (isset($_GET['deletebookid'])) {
    $deletebookid = $_GET['deletebookid'];

    $obj = new data();
    $obj->setconnection();
    $obj->deletebook($deletebookid);

    echo "Book deleted successfully.";
}
