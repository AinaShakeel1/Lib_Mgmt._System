<?php include("db.php");

class data extends db {

    private $bookpic;
    private $bookname;
    private $bookdetail;
    private $bookaudor;
    private $bookpub;
    private $branch;
    private $bookprice;
    private $bookquantity;
    private $type;

    private $book;
    private $userselect;
    private $days;
    private $getdate;
    private $returnDate;





    function __construct() {
        // echo " constructor ";
        // echo "</br></br>";
    }


    function addnewuser($name,$pasword,$email,$type){
        $this->name=$name;
        $this->pasword=$pasword;
        $this->email=$email;
        $this->type=$type;


         $q="INSERT INTO userdata(id, name, email, pass,type)VALUES('','$name','$email','$pasword','$type')";

        if($this->connection->exec($q)) {
            header("Location:admin_service_dashboard.php?msg=New Add done");
        }

        else {
            header("Location:admin_service_dashboard.php?msg=Register Fail");
        }



    }
    // Function to convert date format from YYYY-MM-DD to DD/MM/YYYY
    private function convertToMySQLDate($date) {
        $dateArray = explode('-', $date);
        if (count($dateArray) == 3) {
            return $dateArray[2] . '/' . $dateArray[1] . '/' . $dateArray[0];
        }
        return $date; // Return original if conversion fails
    }
    function userLogin($t1, $t2) {
        $q="SELECT * FROM userdata where email='$t1' and pass='$t2'";
        $recordSet=$this->connection->query($q);
        $result=$recordSet->rowCount();
        if ($result > 0) {

            foreach($recordSet->fetchAll() as $row) {
                $logid=$row['id'];
                header("location: otheruser_dashboard.php?userlogid=$logid");
            }
        }

        else {
            header("location: index.php?msg=Invalid Credentials");
        }

    }

    function adminLogin($t1, $t2) {

        $q="SELECT * FROM admin where email='$t1' and pass='$t2'";
        $recordSet=$this->connection->query($q);
        $result=$recordSet->rowCount();

        if ($result > 0) {

            foreach($recordSet->fetchAll() as $row) {
                $logid=$row['id'];
                header("location: admin_service_dashboard.php?logid=$logid");
            }
        }

        else {
            header("location: index.php?msg=Invalid Credentials");
        }

    }



    function addbook($bookpic, $bookname, $bookdetail, $bookaudor, $bookpub, $branch, $bookprice, $bookquantity) {
        $this->bookpic = $bookpic;
        $this->bookname = $bookname;
        $this->bookdetail = $bookdetail;
        $this->bookaudor = $bookaudor;
        $this->bookpub = $bookpub;
        $this->branch = $branch;
        $this->bookprice = $bookprice;
        $this->bookquantity = $bookquantity;
    
        $stmt = $this->connection->prepare("INSERT INTO book (bookpic, bookname, bookdetail, bookaudor, bookpub, branch, bookprice, bookquantity, bookava, bookrent) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$bookpic, $bookname, $bookdetail, $bookaudor, $bookpub, $branch, $bookprice, $bookquantity, $bookquantity, 0]);
    
        if ($stmt) {
            header("Location:admin_service_dashboard.php?msg=done");
        } else {
            header("Location:admin_service_dashboard.php?msg=fail");
        }
    }


    private $id;



    function getissuebook($userloginid) {

        $newfine="";
        $issuereturn="";

        $q="SELECT * FROM issuebook where userid='$userloginid'";
        $recordSetss=$this->connection->query($q);


        foreach($recordSetss->fetchAll() as $row) {
            $issuereturn=$row['issuereturn'];
            $fine=$row['fine'];
            $newfine= $fine;

            
                //  $newbookrent=$row['bookrent']+1;
        }


        $getdate= date("d/m/Y");
        if($issuereturn<$getdate){
            $q="UPDATE issuebook SET fine='$newfine' where userid='$userloginid'";

            if($this->connection->exec($q)) {
                $q="SELECT * FROM issuebook where userid='$userloginid' ";
                $data=$this->connection->query($q);
                return $data;
            }
            else{
                $q="SELECT * FROM issuebook where userid='$userloginid' ";
                $data=$this->connection->query($q);
                return $data;  
            }

        }
        else{
            $q="SELECT * FROM issuebook where userid='$userloginid'";
            $data=$this->connection->query($q);
            return $data;

        }






    }
    function getCategories() {
        $q = "SELECT DISTINCT branch FROM book";
        $data = $this->connection->query($q);
        return $data;
    }
    function getbookcat($categories = []) {
        $query = "SELECT * FROM book";
        
        if (!empty($categories)) {
            $categoriesList = "'" . implode("','", array_map('htmlspecialchars', $categories)) . "'";
            $query .= " WHERE branch IN ($categoriesList)";
        }
        
        $data = $this->connection->query($query);
        return $data;
    }
    function getbook() {
        $q="SELECT * FROM book ";
        $data=$this->connection->query($q);
        return $data;
    }
    function getbookissue(){
        $q="SELECT * FROM book where bookava !=0 ";
        $data=$this->connection->query($q);
        return $data;
    }

    function userdata() {
        $q="SELECT * FROM userdata ";
        $data=$this->connection->query($q);
        return $data;
    }


    function getbookdetail($id){
        $q="SELECT * FROM book where id ='$id'";
        $data=$this->connection->query($q);
        return $data;
    }
    // function getbook(){
    //     $q="SELECT * FROM book";
    //     $data=$this->connection->query($q);
    //     return $data;
    // }

    function userdetail($id){
        $q="SELECT * FROM userdata where id ='$id'";
        $data=$this->connection->query($q);
        return $data;
    }



    function requestbook($userid,$bookid){

        $q="SELECT * FROM book where id='$bookid'";
        $recordSetss=$this->connection->query($q);

        $q="SELECT * FROM userdata where id='$userid'";
        $recordSet=$this->connection->query($q);

        foreach($recordSet->fetchAll() as $row) {
            $username=$row['name'];
            $usertype=$row['type'];
        }

        foreach($recordSetss->fetchAll() as $row) {
            $bookname=$row['bookname'];
        }

        if($usertype=="student"){
            $days=7;
        }
        if($usertype=="teacher"){
            $days=21;
        }


        $q="INSERT INTO requestbook (id,userid,bookid,username,usertype,bookname,issuedays)VALUES('','$userid', '$bookid', '$username', '$usertype', '$bookname', '$days')";

        if($this->connection->exec($q)) {
            header("Location:otheruser_dashboard.php?userlogid=$userid");
        }

        else {
            header("Location:otheruser_dashboard.php?msg=fail");
        }

    }
    function returnbook($id) {
        $q = "SELECT * FROM issuebook WHERE id='$id'";
        $recordSet = $this->connection->query($q);
        $row = $recordSet->fetch();
    
        if ($row) {
            $issuebook = $row['issuebook'];
            $fine = $row['fine'];
    
            if ($fine == 0) {
                $q = "SELECT * FROM book WHERE bookname='$issuebook'";
                $recordSet = $this->connection->query($q);
                $row = $recordSet->fetch();
    
                if ($row) {
                    $bookava = $row['bookava'] + 1;
                    $bookrentel = $row['bookrent'] - 1;
    
                    $this->connection->beginTransaction();
    
                    try {
                        $q1 = "UPDATE book SET bookava='$bookava', bookrent='$bookrentel' WHERE bookname='$issuebook'";
                        $this->connection->exec($q1);
    
                        $q2 = "UPDATE issuebook SET returned=TRUE WHERE id='$id'";
                        $this->connection->exec($q2);
    
                        $this->connection->commit();
                        return json_encode([
                            "status" => "success",
                            "bookava" => $bookava
                        ]);
                    } catch (Exception $e) {
                        $this->connection->rollBack();
                        return json_encode(["status" => "failure"]);
                    }
                } else {
                    return json_encode(["status" => "book_not_found"]);
                }
            } else {
                return json_encode(["status" => "has_fines"]);
            }
        } else {
            return json_encode(["status" => "issue_not_found"]);
        }
    }
    
    
    // function returnbook($id){
    //     $fine="";
    //     $bookava="";
    //     $issuebook="";
    //     $bookrentel="";

    //     $q="SELECT * FROM issuebook where id='$id'";
    //     $recordSet=$this->connection->query($q);

    //     foreach($recordSet->fetchAll() as $row) {
    //         $userid=$row['userid'];
    //         $issuebook=$row['issuebook'];
    //         $fine=$row['fine'];

    //     }
    //     if($fine==0){

    //     $q="SELECT * FROM book where bookname='$issuebook'";
    //     $recordSet=$this->connection->query($q);   

    //     foreach($recordSet->fetchAll() as $row) {
    //         $bookava=$row['bookava']+1;
    //         $bookrentel=$row['bookrent']-1;
    //     }
    //     $q="UPDATE book SET bookava='$bookava', bookrent='$bookrentel' where bookname='$issuebook'";
    //     $this->connection->exec($q);

    //     $q="DELETE from issuebook where id=$id and issuebook='$issuebook' and fine='0' ";
    //     if($this->connection->exec($q)){
    
    //         header("Location:otheruser_dashboard.php?userlogid=$userid");
    //      }
    //     //  else{
    //     //     header("Location:otheruser_dashboard.php?msg=fail");
    //     //  }
    //     }
    //     // if($fine!=0){
    //     //     header("Location:otheruser_dashboard.php?userlogid=$userid&msg=fine");
    //     // }
       

    // }

    function delteuserdata($id){
        $q="DELETE from userdata where id='$id'";
        if($this->connection->exec($q)){
    
            
           header("Location:admin_service_dashboard.php?msg=done");
        }
        else{
           header("Location:admin_service_dashboard.php?msg=fail");
        }
    }

    function deletebook($id){
        $q="DELETE from book where id='$id'";
        if($this->connection->exec($q)){
    
            
           header("Location:admin_service_dashboard.php?msg=done");
        }
        else{
           header("Location:admin_service_dashboard.php?msg=fail");
        }
    }

        // function issuereport($searchValue = "") {
        //     $query = "SELECT * FROM issuebook";
            
        //     if (!empty($searchValue)) {
        //         $query .= " WHERE issuename LIKE '%$searchValue%' 
        //            OR issuebook LIKE '%$searchValue%'";
        //     }
            
        //     // echo $query; // For debugging
        //     $data = $this->connection->query($query);
        //     return $data;
        // }
        // function convertToMySQLDate($date) {
        //     $dateArray = explode('-', $date);
        //     if (count($dateArray) == 3) {
        //         return $dateArray[2] . '/' . $dateArray[1] . '/' . $dateArray[0];
        //     }
        //     return $date; // Return original if conversion fails
        // }
        
        function issuereport($searchValue = "", $issueDate = "", $returnDate = "") {
            $query = "SELECT * FROM issuebook WHERE 1=1"; // Start with a base query
        
            if (!empty($searchValue)) {
                $query .= " AND (issuename LIKE '%" . htmlspecialchars($searchValue) . "%' 
                                OR issuebook LIKE '%" . htmlspecialchars($searchValue) . "%')";
            }
        
            if (!empty($issueDate)) {
                $mysqlDate = $this->convertToMySQLDate($issueDate); // Use $this->
                $query .= " AND issuedate = '" . htmlspecialchars($mysqlDate) . "'";
            }
        
            if (!empty($returnDate)) {
                $mysqlDate = $this->convertToMySQLDate($returnDate); // Use $this->
                $query .= " AND issuereturn = '" . htmlspecialchars($mysqlDate) . "'";
            }
        
            // Debug: Print the query
            // echo $query; // Uncomment for debugging
        
            $data = $this->connection->query($query);
            return $data;
        }
        

        function requestbookdata(){
            $q="SELECT * FROM requestbook ";
            $data=$this->connection->query($q);
            return $data;
        }

      // issue issuebookapprove
      function issuebookapprove($book,$userselect,$days,$getdate,$returnDate,$redid){
        $this->$book= $book;
        $this->$userselect=$userselect;
        $this->$days=$days;
        $this->$getdate=$getdate;
        $this->$returnDate=$returnDate;


        $q="SELECT * FROM book where bookname='$book'";
        $recordSetss=$this->connection->query($q);

        $q="SELECT * FROM userdata where name='$userselect'";
        $recordSet=$this->connection->query($q);
        $result=$recordSet->rowCount();

        if ($result > 0) {

            foreach($recordSet->fetchAll() as $row) {
                $issueid=$row['id'];
                $issuetype=$row['type'];

                // header("location: admin_service_dashboard.php?logid=$logid");
            }
            foreach($recordSetss->fetchAll() as $row) {
                $bookid=$row['id'];
                $bookname=$row['bookname'];

                    $newbookava=$row['bookava']-1;
                     $newbookrent=$row['bookrent']+1;
            }

        
            $q="UPDATE book SET bookava='$newbookava', bookrent='$newbookrent' where id='$bookid'";
            if($this->connection->exec($q)){

            $q="INSERT INTO issuebook (userid,issuename,issuebook,issuetype,issuedays,issuedate,issuereturn,fine)VALUES('$issueid','$userselect','$book','$issuetype','$days','$getdate','$returnDate','0')";

            if($this->connection->exec($q)) {

                $q="DELETE from requestbook where id='$redid'";
                $this->connection->exec($q);
                header("Location:admin_service_dashboard.php?msg=done");
            }
    
            else {
                header("Location:admin_service_dashboard.php?msg=fail");
            }
            }
            else{
               header("Location:admin_service_dashboard.php?msg=fail");
            }




        }

        else {
            header("location: index.php?msg=Invalid Credentials");
        }


    }
    
    //issue book
    function issuebook($book,$userselect,$days,$getdate,$returnDate){
        $this->$book= $book;
        $this->$userselect=$userselect;
        $this->$days=$days;
        $this->$getdate=$getdate;
        $this->$returnDate=$returnDate;


        $q="SELECT * FROM book where bookname='$book'";
        $recordSetss=$this->connection->query($q);

        $q="SELECT * FROM userdata where name='$userselect'";
        $recordSet=$this->connection->query($q);
        $result=$recordSet->rowCount();

        if ($result > 0) {

            foreach($recordSet->fetchAll() as $row) {
                $issueid=$row['id'];
                $issuetype=$row['type'];

                // header("location: admin_service_dashboard.php?logid=$logid");
            }
            foreach($recordSetss->fetchAll() as $row) {
                $bookid=$row['id'];
                $bookname=$row['bookname'];

                    $newbookava=$row['bookava']-1;
                     $newbookrent=$row['bookrent']+1;
            }

        
            $q="UPDATE book SET bookava='$newbookava', bookrent='$newbookrent' where id='$bookid'";
            if($this->connection->exec($q)){

            $q="INSERT INTO issuebook (userid,issuename,issuebook,issuetype,issuedays,issuedate,issuereturn,fine)VALUES('$issueid','$userselect','$book','$issuetype','$days','$getdate','$returnDate','0')";

            if($this->connection->exec($q)) {
                header("Location:admin_service_dashboard.php?msg=done");
            }
    
            else {
                header("Location:admin_service_dashboard.php?msg=fail");
            }
            }
            else{
               header("Location:admin_service_dashboard.php?msg=fail");
            }


        }

        else {
            header("location: index.php?msg=Invalid Credentials");
        }


    }
    // function issuebook($book, $userselect, $days, $getdate, $returnDate) {
    //     $this->book = $book;
    //     $this->userselect = $userselect;
    //     $this->days = $days;
    //     $this->getdate = $getdate;
    //     $this->returnDate = $returnDate;
    
    //     $q = "SELECT * FROM book where bookname='$book'";
    //     $recordSetss = $this->connection->query($q);
    
    //     $q = "SELECT * FROM userdata where name='$userselect'";
    //     $recordSet = $this->connection->query($q);
    //     $result = $recordSet->rowCount();
    
    //     if ($result > 0) {
    
    //         foreach ($recordSet->fetchAll() as $row) {
    //             $issueid = $row['id'];
    //             $issuetype = $row['type'];
    //         }
    //         foreach ($recordSetss->fetchAll() as $row) {
    //             $bookid = $row['id'];
    //             $bookname = $row['bookname'];
    
    //             $newbookava = $row['bookava'] - 1;
    //             $newbookrent = $row['bookrent'] + 1;
    //         }
    
    //         $q = "UPDATE book SET bookava='$newbookava', bookrent='$newbookrent' where id='$bookid'";
    //         if ($this->connection->exec($q)) {
    
    //             $q = "INSERT INTO issuebook (userid, issuename, issuebook, issuetype, issuedays, issuedate, issuereturn, fine)
    //             VALUES('$issueid', '$userselect', '$book', '$issuetype', '$days', '$getdate', '$returnDate', '0')";
    
    //             if ($this->connection->exec($q)) {
    //                 header("Location:admin_service_dashboard.php?msg=done");
    //             } else {
    //                 header("Location:admin_service_dashboard.php?msg=fail");
    //             }
    //         } else {
    //             header("Location:admin_service_dashboard.php?msg=fail");
    //         }
    
    //     } else {
    //         header("location: index.php?msg=Invalid Credentials");
    //     }
    // }
}
