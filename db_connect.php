<?php
    include('unpw.php');
    
    $servername = "teninten.chdo7xi289mh.us-west-2.rds.amazonaws.com:3306";
    $db_name = "run_tracker";
    
    $conn = new mysqli($servername, $username, $password);

    if($conn->connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
    } else
    {
       //echo "Connected successully";
    }
     mysqli_select_db($conn,$db_name);
?>