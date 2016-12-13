<?php
    include("db_connect.php");
    $id= $_GET['runId'];

    $sql = "DELETE FROM runs WHERE runID=".$id;

     if ($conn->query($sql) === TRUE) {
               // echo "Record deleted successfully";
        } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
        }

?>