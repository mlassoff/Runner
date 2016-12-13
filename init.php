<?php
    include("db_connect.php");
    $query = "SELECT * FROM runs ORDER BY runDate";
    $result = $conn->query($query);
    header('Content-type: text/xml');
    $out = "<?xml version='1.0' encoding='utf-8'?>";
    $out .= "<runs>";
    while($row = $result->fetch_assoc())
    {
       $out .= "<run>";
       $out .= "<runID>" . $row['runID'] . "</runID>";
       $out .= "<runDate>" . $row['runDate'] . "</runDate>";
       $out .= "<runDistance>" . $row['runDistance'] . "</runDistance>";
       $out .= "<runComment>" . $row['runComment'] . "</runComment>";
       $out .= "</run>";
    }
    $out .= "</runs>";
    echo($out);
    $conn->close();   
?>