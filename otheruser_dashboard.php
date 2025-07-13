<?php

session_start();

$userloginid=$_SESSION["userid"] = $_GET['userlogid'];
// echo $_SESSION["userid"];


?>


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
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
    <body>

    <?php
   include("data_class.php");
    ?>
           <div class="container">
            <div class="innerdiv">
            <!-- <div class="row"><img class="imglogo" src="images/logo.png"/></div> -->
            <div class="leftinnerdiv">
                <br>
                <Button class="greenbtn" onclick="openpart('myaccount')"> <img class="icons" src="images/icon/profile.png" width="30px" height="30px"/>  My Account</Button>
                <Button class="greenbtn" onclick="openpart('requestbook')"><img class="icons" src="images/icon/book.png" width="30px" height="30px"/> Request Book</Button>
                <Button class="greenbtn" onclick="openpart('issuereport')"> <img class="icons" src="images/icon/monitoring.png" width="30px" height="30px"/>  Book Report</Button>
                <a href="index.php"><Button class="greenbtn" ><img class="icons" src="images/icon/logout.png" width="30px" height="30px"/> LOGOUT</Button></a>
            </div>


            <div class="rightinnerdiv">   
            <div id="myaccount" class="innerright portion" style="<?php  if(!empty($_REQUEST['returnid'])){ echo "display:none";} else {echo ""; }?>">
            <Button class="greenbtn" >My Account</Button>

            <?php

            $u=new data;
            $u->setconnection();
            $u->userdetail($userloginid);
            $recordset=$u->userdetail($userloginid);
            foreach($recordset as $row){

            $id= $row[0];
            $name= $row[1];
            $email= $row[2];
            $pass= $row[3];
            $type= $row[4];
            }               
                ?>

            <p style="color:white"><u>Person Name:</u> &nbsp&nbsp<?php echo $name ?></p>
            <p style="color:white"><u>Person Email:</u> &nbsp&nbsp<?php echo $email ?></p>
            <p style="color:white"><u>Account Type:</u> &nbsp&nbsp<?php echo $type ?></p>
        
            </div>
            </div>


            



            <div class="rightinnerdiv">   
            <div id="issuereport" class="innerright portion" style="<?php  if(!empty($_REQUEST['returnid'])){ echo "display:none";} else {echo "display:none"; }?>">
            <Button class="greenbtn" >BOOK RECORD</Button>

            <?php

            $userloginid=$_SESSION["userid"] = $_GET['userlogid'];
            $u=new data;
            $u->setconnection();
            $u->getissuebook($userloginid);
            $recordset=$u->getissuebook($userloginid);

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='  
            padding: 8px;'>Name</th><th>Book Name</th><th>Issue Date</th><th>Return Date</th></tr>";

            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
                $table.="<td>$row[2]</td>";
                $table.="<td>$row[3]</td>";
                $table.="<td>$row[6]</td>";
                $table.="<td>$row[7]</td>";
                // $table.="<td>$row[8]</td>";
                // $table.="<td><a href='otheruser_dashboard.php?returnid=$row[0]&userlogid=$userloginid'><button type='button' class='btn btn-primary'>Return</button></a></td>";
                $table.="</tr>";
                // $table.=$row[0];
            }
            $table.="</table>";

            echo $table;
            ?>

            </div>
            </div>


            <div class="rightinnerdiv">   
            <div id="return" class="innerright portion" style="<?php  if(!empty($_REQUEST['returnid'])){ $returnid=$_REQUEST['returnid'];} else {echo "display:none"; }?>">
            <Button class="greenbtn" >Return Book</Button>

            <?php

            $u=new data;
            $u->setconnection();
            $u->returnbook($returnid);
            $recordset=$u->returnbook($returnid);
                ?>

            </div>
            </div>


            <div class="rightinnerdiv">   
            <div id="requestbook" class="innerright portion" style="<?php  if(!empty($_REQUEST['returnid'])){ $returnid=$_REQUEST['returnid'];echo "display:none";} else {echo "display:none"; }?>">
            <Button class="greenbtn" >Request Book</Button>

            <?php
            $u=new data;
            $u->setconnection();
            $u->getbookissue();
            $recordset=$u->getbookissue();

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr>
            <th>Image</th><th>Book Name</th><th>Book Authour</th><th>Category</th><th>Request Book</th></tr>";

            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
               $table.="<td><img src='uploads/$row[1]' width='100px' height='100px' style='border:1px solid #333333;'></td>";
               $table.="<td>$row[2]</td>";
                $table.="<td>$row[4]</td>";
                $table.="<td>$row[6]</td>";
                // $table.="<td>$row[7]</td>";
                $table.="<td><a href='requestbook.php?bookid=$row[0]&userid=$userloginid'><button type='button' class='btn btn-primary' style='background-color:#b71c1c;'>Request Book</button></a></td>";
           
                $table.="</tr>";
                // $table.=$row[0];
            }
            $table.="</table>";

            echo $table;


                ?>

            </div>
            </div>

        </div>
        </div>


        <script>
        function openpart(portion) {
        var i;
        var x = document.getElementsByClassName("portion");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";  
        }
        document.getElementById(portion).style.display = "block";  
        }

   
 
        
        </script>
    </body>
</html>