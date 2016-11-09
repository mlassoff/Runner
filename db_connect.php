<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = "runner_log";

    $conn = new mysqli($servername, $username, $password);

    if($conn->connect_error)
    {
        die("Connection falied: " . $conn->connect_error);
    } else
    {
       // echo "Connected successully";
    }
     mysqli_select_db($conn,$db_name);
?>