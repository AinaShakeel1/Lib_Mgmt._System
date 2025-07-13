<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admin Dashboard</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <!-- Include Bootstrap CSS and Bootstrap-Select CSS -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css" rel="stylesheet">

        <!-- Include Bootstrap JS and jQuery -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- <link rel="stylesheet" href="style.css"> -->
    </head>
    <style>
 body {
    font-family: 'Roboto', sans-serif;
    background-color: #1c1c1c;
    margin: 0;
    padding-top: 65px;
    color: #ffffff;
}

/* .container {
    max-width: 1200px;
    margin: 20px auto;
    padding: 20px;
    background-color: #2b2b2b;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
} */

.innerdiv {
    margin: 0;
}

.leftinnerdiv {
    float: left;
    width: 20%;
    text-align: left;
    padding-right: 20px;
    box-sizing: border-box;
}

.rightinnerdiv {
    float: left;
    width: 80%;
    /* padding-top: 10px; */
    box-sizing: border-box;
    overflow-y: auto;
    max-height: 80vh; /* Adjust as needed */
}

.greenbtn {
    background-color: #d32f2f;
    color: #ffffff;
    border: none;
    border-radius: 4px;
    margin: 10px 0;
    padding: 10px 15px;
    font-size: 14px;
    cursor: pointer;
    text-decoration: none;
    display: block;
    text-align: left;
    transition: background-color 0.3s ease;
    width: 100%;
}

.greenbtn:hover {
    background-color: #b71c1c;
}

.greenbtn img {
    margin-right: 8px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
    background-color: #333333;
    color: #ffffff;
    max-height: 400px;
    overflow-y: auto;
}

th, td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #444444;
}

th {
    background-color: #b71c1c;
    color: #ffffff;
}

td {
    background-color: #424242;
    color: #ffffff;
}

tr:hover {
    background-color: #616161;
}

form {
    margin: 20px 0;
    color: #ffffff;
}

input[type=text],
input[type=email],
input[type=number],
input[type=password],
select,
textarea {
    width: calc(100% - 20px);
    padding: 10px;
    border: 1px solid #555555;
    border-radius: 4px;
    margin: 8px 0;
    box-sizing: border-box;
    background-color: #2b2b2b;
    color: #ffffff;
}

input[type=password],
select,
textarea {
    width: calc(100% - 20px);
    padding: 10px;
    border: 1px solid #555555;
    border-radius: 4px;
    margin: 8px 0;
    box-sizing: border-box;
    background-color: #2b2b2b;
    color: #ffffff;
}

input[type=submit] {
    background-color: #d32f2f;
    color: #ffffff;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

input[type=submit]:hover {
    background-color: #b71c1c;
}

label {
    font-size: 16px;
    color: #ffffff;
    display: block;
    margin-bottom: 8px;
}

input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

::placeholder {
    color: #888888;
    font-style: italic;
    font-size: 14px;
}

.return-btn {
    border: none;
    padding: 8px 16px;
    font-size: 14px;
    border-radius: 4px;
    cursor: pointer;
    color: #ffffff;
    background-color: #d32f2f;
    transition: background-color 0.3s ease;
}

.return-btn:disabled {
    background-color: #9e9e9e;
    cursor: not-allowed;
}

.return-btn:hover:not(:disabled) {
    background-color: #b71c1c;
}

.portion {
    clear: both;
}

::-webkit-scrollbar {
    width: 8px;
}

::-webkit-scrollbar-track {
    background-color: #2b2b2b;
}

::-webkit-scrollbar-thumb {
    background-color: #d32f2f;
    border-radius: 8px;
}
    </style>
    <body >

    <?php
   include("data_class.php");

$msg="";

   if(!empty($_REQUEST['msg'])){
    $msg=$_REQUEST['msg'];
 }

// if($msg=="done"){
//     echo "<div class='alert alert-success' role='alert'>Sucssefully Done</div>";
// }
// elseif($msg=="fail"){
//     echo "<div class='alert alert-danger' role='alert'>Fail</div>";
// }

    ?>



        <div class="container">
        <div class="innerdiv">
            <!-- <div class="row"><img class="imglogo" src="images/logo.png"/></div> -->
            <div class="leftinnerdiv">
                <!-- <Button class="greenbtn"> ADMIN</Button> -->
                <!-- <br> -->
                <Button class="greenbtn" onclick="openpart('addbook')" ><img class="icons" src="images/icon/book.png" width="30px" height="30px"/>  ADD BOOK</Button>
                <Button class="greenbtn" onclick="openpart('bookreport')" > <img class="icons" src="images/icon/open-book.png" width="30px" height="30px"/> BOOK REPORT</Button>
                <Button class="greenbtn" onclick="openpart('bookrequestapprove')"><img class="icons" src="images/icon/interview.png" width="30px" height="30px"/> BOOK REQUESTS</Button>
                <Button class="greenbtn" onclick="openpart('addperson')"> <img class="icons" src="images/icon/add-user.png" width="30px" height="30px"/> ADD STUDENT</Button>
                <Button class="greenbtn" onclick="openpart('studentrecord')"> <img class="icons" src="images/icon/monitoring.png" width="30px" height="30px"/> STUDENT REPORT</Button>
                <Button class="greenbtn"  onclick="openpart('issuebook')"> <img class="icons" src="images/icon/test.png" width="30px" height="30px"/> ISSUE BOOK</Button>
                <Button class="greenbtn" onclick="openpart('issuebookreport')"> <img class="icons" src="images/icon/checklist.png" width="30px" height="30px"/> ISSUE REPORT</Button>
                <a href="index.php"><Button class="greenbtn" ><img class="icons" src="images/icon/book.png" width="30px" height="30px"/> LOGOUT</Button></a>
            </div>

            <div class="rightinnerdiv">   
            <div id="bookrequestapprove" class="innerright portion" style="display:none">
            <Button class="greenbtn" >BOOK REQUEST APPROVE</Button>

            <?php
            $u=new data;
            $u->setconnection();
            $u->requestbookdata();
            $recordset=$u->requestbookdata();

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='
            padding: 8px;'>Person Name</th><th>Person type</th><th>Book name</th><th>Days </th><th>Approve</th></tr>";
            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
              "<td>$row[1]</td>";
              "<td>$row[2]</td>";

                $table.="<td>$row[3]</td>";
                $table.="<td>$row[4]</td>";
                $table.="<td>$row[5]</td>";
                $table.="<td>$row[6]</td>";
               // $table.="<td><a href='approvebookrequest.php?reqid=$row[0]&book=$row[5]&userselect=$row[3]&days=$row[6]'><button type='button' class='btn btn-primary'>Approved BOOK</button></a></td>";
                $table.="<td><a href='approvebookrequest.php?reqid=$row[0]&book=$row[5]&userselect=$row[3]&days=$row[6]'><button type='button' class='btn btn-primary' style='background-color:#b71c1c;'>Approved</button></a></td>";
                // $table.="<td><a href='deletebook_dashboard.php?deletebookid=$row[0]'>Delete</a></td>";
                $table.="</tr>";
                // $table.=$row[0];
            }
            $table.="</table>";

            echo $table;
            ?>

            </div>
            </div>

            <div class="rightinnerdiv">   
            <div id="addbook" class="innerright portion" style="<?php  if(!empty($_REQUEST['viewid'])){ echo "display:none";} else {echo ""; }?>">
            <Button class="greenbtn" >ADD NEW BOOK</Button>
            <!-- <br> -->
            <form action="addbookserver_page.php" method="post" enctype="multipart/form-data">
            <label>Book Name:</label><input type="text" name="bookname"/>
            </br>
            <label>Detail:</label><input  type="text" name="bookdetail"/></br>
            <label>Author:</label><input type="text" name="bookaudor"/></br>
            <label>Publication:</label><input type="text" name="bookpub"/></br>
            <div><label>Category:</label><input type="radio" name="branch" value="other"/>Other<input type="radio" name="branch" value="Fiction"/>Fiction<input type="radio" name="branch" value="Academics"/>Academics<input type="radio" name="branch" value="Religious"/>Religious<div style="margin-left:80px"></div>
            </div>   
            <!-- <label>Price:</label><input  type="number" name="bookprice"/></br> -->
            <label>Quantity:</label><input type="number" name="bookquantity"/></br>
            <label>BookPhoto:</label><input  type="file" name="bookphoto"/></br>
            </br>
   
            <input type="submit" value="SUBMIT"/>
            </br>
            </br>

            </form>
            </div>
            </div>


            <div class="rightinnerdiv">   
            <div id="addperson" class="innerright portion" style="display:none">
            <Button class="greenbtn" >ADD PERSON</Button>
            <form action="addpersonserver_page.php" method="post" enctype="multipart/form-data">
            <label>Name:</label><input type="text" name="addname"/>
            </br>
            <label>Pasword:</label><input type="pasword" name="addpass"/>
            </br>
            <label>Email:</label><input  type="email" name="addemail"/></br>
            <label for="typw">Choose type:</label>
            <select name="type" >
                <option value="student">student</option>
                <option value="teacher">teacher</option>
            </select>

            <input type="submit" value="SUBMIT"/>
            </form>
            </div>
            </div>

            <div class="rightinnerdiv">   
            <div id="studentrecord" class="innerright portion" style="display:none">
            <Button class="greenbtn" >STUDENT RECORD</Button>

            <?php
            $u=new data;
            $u->setconnection();
            $u->userdata();
            $recordset=$u->userdata();

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style=' 
            padding: 8px;'> Name</th><th>Email</th><th>Type</th></tr>";
            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
                $table.="<td>$row[1]</td>";
                $table.="<td>$row[2]</td>";
                $table.="<td>$row[4]</td>";
                // $table.="<td><a href='deleteuser.php?useriddelete=$row[0]'>Delete</a></td>";
                $table.="</tr>";
                // $table.=$row[0];
            }
            $table.="</table>";

            echo $table;
            ?>

            </div>
            </div>
            <div class="rightinnerdiv">   
            <div id="issuebookreport" class="innerright portion" style="display:none">
                <Button class="greenbtn">ISSUE BOOK RECORD</Button>
                <form id="searchForm" method="POST">
                    <label>Search:</label>
                    <input type="text" id="searchValue" name="search_issue_report" placeholder="Search by any field">
                    
                    <label>Issue Date:</label>
                    <input type="date" id="issueDate" name="issueDate">

                    <label>Return Date:</label>
                    <input type="date" id="returnDate" name="returnDate">

                    <input type="submit" value="Search">
                </form>
                <div id="issueReport">
                    <?php
                    $u = new data;
                    $u->setconnection();

                    $recordset = $u->issuereport(""); // Display all records initially

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
                    ?>
                </div>
            </div>
        </div>
            </div>
            <div class="rightinnerdiv">   
            <div id="issuebook" class="innerright portion" style="display:none">
            <Button class="greenbtn" >ISSUE BOOK</Button>
            <form action="issuebook_server.php" method="post" enctype="multipart/form-data">
            <label for="book">Choose Book:</label>
           
            <select name="book" >
            <?php
            $u=new data;
            $u->setconnection();
            $u->getbookissue();
            $recordset=$u->getbookissue();
            foreach($recordset as $row){

                echo "<option value='". $row[2] ."'>" .$row[2] ."</option>";
        
            }            
            ?>
            </select>
<!-- <br> -->
            <label for="Select Student">Select Student:</label>
            <select name="userselect" >
            <?php
            $u=new data;
            $u->setconnection();
            $u->userdata();
            $recordset=$u->userdata();
            foreach($recordset as $row){
               $id= $row[0];
                echo "<option value='". $row[1] ."'>" .$row[1] ."</option>";
            }            
            ?>
            </select>
<!-- <br> -->
           <label>Days</label> <input type="number" name="days"/>

            <input type="submit" value="SUBMIT"/>
            </form>
            </div>
            </div>

            <div class="rightinnerdiv">   
            <div id="bookdetail" class="innerright portion" style="<?php  if(!empty($_REQUEST['viewid'])){ $viewid=$_REQUEST['viewid'];} else {echo "display:none"; }?>">
            
            <Button class="greenbtn" >BOOK DETAIL</Button>
</br>
<?php
            $u=new data;
            $u->setconnection();
            $u->getbookdetail($viewid);
            $recordset=$u->getbookdetail($viewid);
            foreach($recordset as $row){

               $bookid= $row[0];
               $bookimg= $row[1];
               $bookname= $row[2];
               $bookdetail= $row[3];
               $bookauthour= $row[4];
               $bookpub= $row[5];
               $branch= $row[6];
               $bookprice= $row[7];
               $bookquantity= $row[8];
               $bookava= $row[9];
               $bookrent= $row[10];

            }            
?>

            <img width='150px' height='150px' style='border:1px solid #333333; float:left;margin-left:20px' src="uploads/<?php echo $bookimg?> "/>
            </br>
            <p style="color:white;"><u>Book Name:</u> &nbsp;&nbsp;<?php echo $bookname ?></p>
            <p style="color:white;"><u>Book Detail:</u> &nbsp;&nbsp;<?php echo $bookdetail ?></p>
            <p style="color:white;"><u>Book Author:</u> &nbsp;&nbsp;<?php echo $bookauthour ?></p>
            <p style="color:white;"><u>Book Publisher:</u> &nbsp;&nbsp;<?php echo $bookpub ?></p>
            <p style="color:white;"><u>Book Branch:</u> &nbsp;&nbsp;<?php echo $branch ?></p>
            <p style="color:white;"><u>Book Price:</u> &nbsp;&nbsp;<?php echo $bookprice ?></p>
            <p style="color:white;"><u>Book Available:</u> &nbsp;&nbsp;<?php echo $bookava ?></p>
            <p style="color:white;"><u>Book Rent:</u> &nbsp;&nbsp;<?php echo $bookrent ?></p>

            </div>
            </div>

            <?php
              // Fetch categories for the dropdown
              $u = new data;
              $u->setconnection();
              $categories = $u->getCategories();
  
              // Get selected categories from the form
              $selectedCategories = isset($_GET['categories']) ? $_GET['categories'] : [];
  
              // Fetch the books with filtering
              $recordset = $u->getbookcat($selectedCategories);
  
              $table = "<table style='font-family: Arial, Helvetica, sans-serif; border-collapse: collapse; width: 100%;'>
                          <tr>
                              <th style='padding: 8px;'>Book Name</th>
                              <th>Category</th>
                              <th>Quantity</th>
                              <th>Available</th>
                              <th>Issued</th>
                              <th>View</th>
                              <th> Delete </th>
                          </tr>";
  
              foreach ($recordset as $row) {
                  // $table.="<tr>";
                      // "<td>$row[0]</td>";
                          $table .= "<tr id='book-row-$row[0]'>";
                          $table .= "<td>$row[2]</td>";
                          $table .= "<td>$row[6]</td>"; // category
                          $table .= "<td>$row[8]</td>"; // quantity
                          $table .= "<td>$row[9]</td>"; // available
                          $table .= "<td>$row[10]</td>"; // issued
                          $table .= "<td><a href='admin_service_dashboard.php?viewid=$row[0]'><button type='button' class='btn btn-primary' style='background-color:#b71c1c;'>View Book</button></a></td>";
                          $table .= "<td><a href='#' onclick='deleteBook($row[0]); return false;' style='color: #b71c1c '>Delete</a></td>";
                          $table .= "</tr>";
              }
              $table .= "</table>";
              ?>
  
              <div class="rightinnerdiv">
                  <div id="bookreport" class="innerright portion" style="display:none">
                      <button class="greenbtn">BOOK RECORD</button>
  
                      <!-- Category Filter Form -->
                      <form id="filterForm">
                          <label for="categories">Filter by Category:</label>
                          <select id="categories" name="categories[]" multiple>
                              <?php
                              foreach ($categories as $category) {
                                  echo "<option value='" . htmlspecialchars($category['branch']) . "'>" . htmlspecialchars($category['branch']) . "</option>";
                              }
                              ?>
                          </select>
                          <button type="button" class='btn btn-primary' style='background-color:#b71c1c;' onclick="filterBooks()">Filter</button>
                      </form>
  
                      <div id="bookTable">
                          <?php echo $table; ?>
                      </div>
                  </div>
              </div>
  
  
          </div>
          </div>
     
<script>
    $(document).ready(function() {
        $('.return-btn').click(function() {
            var button = $(this);
            var issueId = button.data('issueid');

            $.ajax({
                url: 'returnbook.php',
                type: 'POST',
                data: { issueid: issueId },
                success: function(response) {
                    response = response.trim();
                    var result = JSON.parse(response);

                    if (result.status === "success") {
                        button.text('Returned');
                        button.prop('disabled', true);

                        // Update the "Available" column in the table
                        var availableCell = button.closest('tr').find('td').eq(3);
                        availableCell.text(result.bookava);

                        updateAvailableQuantityTable(); // Optionally update the full table
                    } else {
                        alert('Error: ' + result.status);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX request failed:', error);
                    alert('Request failed: ' + error);
                }
            });
        });
        function updateAvailableQuantityTable() {
            $.ajax({
                url: 'getUpdatedBookReport.php',
                type: 'GET',
                success: function(updatedHtml) {
                    $('#bookreport').html(updatedHtml);
                },
                error: function(xhr, status, error) {
                    console.error('Failed to update available quantity table:', error);
                    alert('Failed to update available quantity table');
                }
            });
        }
    });
    function openpart(portion) {
    var i;
    var x = document.getElementsByClassName("portion");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";  
    }
    document.getElementById(portion).style.display = "block";  
    }
    document.getElementById('searchForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the form from submitting the traditional way

    // Gather form data
    var searchValue = document.getElementById('searchValue').value;
    var issueDate = document.getElementById('issueDate').value;
    var returnDate = document.getElementById('returnDate').value;

    // Create the query string
    var data = 'search_issue_report=' + encodeURIComponent(searchValue) +
                '&issueDate=' + encodeURIComponent(issueDate) +
                '&returnDate=' + encodeURIComponent(returnDate);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'search_issue_report.php', true); // Point to the PHP file
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Update the issue report table with the returned data
            document.getElementById('issueReport').innerHTML = xhr.responseText;
        }
    };

    xhr.send(data); // Send the form data
    });
    function filterBooks() {
        // Get selected categories
        var selectedCategories = $('#categories').val();

        // Make an AJAX POST request
        $.ajax({
            url: 'filter_books.php', // The URL of the PHP file that handles filtering
            type: 'POST',
            data: {
                categories: selectedCategories
            },
            success: function(response) {
                // Update the bookTable div with the response (the filtered table)
                $('#bookTable').html(response);
            },
            error: function(xhr, status, error) {
                console.error('Error: ' + error);
            }
        });
    }

    $(document).ready(function() {
            $("#addBookForm").on('submit', function(e) {
                e.preventDefault(); // Prevent the default form submission
                var formData = new FormData(this);
                
                $.ajax({
                    type: "POST",
                    url: "addbookserver_page.php",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        $("#message").html('<p style="color: green;">Book added successfully!</p>');
                        $("#addBookForm")[0].reset(); // Reset form fields
                    },
                    error: function() {
                        $("#message").html('<p style="color: red;">Failed to add the book. Please try again.</p>');
                    }
                });
            });
        });
        function deleteBook(bookId) {
        if (confirm("Are you sure you want to delete this book?")) {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "deletebook_dashboard.php?deletebookid=" + bookId, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Remove the corresponding row from the table
                    var row = document.getElementById("book-row-" + bookId);
                    if (row) {
                        row.parentNode.removeChild(row);
                    }
                }
            };
            xhr.send();
        }
    }
</script>
    </body>
</html>