<?php
    include("db_connect.php");
    
    if($_SERVER['REQUEST_METHOD'] == 'GET')
    {
        
        $runDate = $_REQUEST['runDate'];
        $runDistance = $_REQUEST['runDistance'];
        $runComment = $_REQUEST['runComment'];
        
        $sql = "INSERT INTO Runs (runDate,runDistance,runComment) values  ('" . $runDate . "','" . $runDistance . "','". $runComment. "');";
       // echo($sql);
        
        if ($conn->query($sql) === TRUE) {
               // echo "New record created successfully";
        } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
        }

        
    }
    $conn->close();   
?>