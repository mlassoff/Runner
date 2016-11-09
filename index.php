<?php
    include("db_connect.php");
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $runDate = $_POST['runDate'];
        $runDistance = $_POST['runDistance'];
        $runComment = $_POST['runComment'];
        
        $sql = "INSERT INTO runs values (NULL, '" . $runDate . "','" . $runDistance . "','". $runComment. "');";
       // echo $sql;
        
        if ($conn->query($sql) === TRUE) {
                //echo "New record created successfully";
        } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
        }

        header("Refresh:0");
        
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Run Tracker</title>
    </head>
    <style>
        table,tr ,th, td
        {
            border: solid black 1px;
        }
        
        table
        {
            border-collapse: collapse;
        }
        
        .odd
        {
            background-color: #ccc;
        }
        
        .even
        {
            background-color: #eee;
        }
    </style>
    <body>
        <h1>Run History</h1>
        <?php
            $odd = false;
            $query = "SELECT * FROM runs";
            $result = $conn->query($query);
            $out = "<table>";    
            $out .= "<tr class='odd'><th>Date</th><th>Distance</th><th>Notes</th><th>Delete</th><th></tr>";
            while($row = $result->fetch_assoc())
            {
                if ($odd){
                    $out .= "<tr class='odd'>";
                } else
                {
                    $out .= "<tr class='even'>";
                }
                $out .= "<td>";
                $out .= $row['runDate'] . "</td><td>" . $row['runDistance'] . "</td><td>" . $row['runComment'] . "</td>";
                $out .= "<td><a href='delete.php?runId=" . $row['runID'] . "'>Delete</a></td>";
                $out .= "<td><a href='update.php?runId=" . $row['runID'] . "'>Update</a></td>";
                
                $out .= "</tr>";
                $odd = !$odd;
            }
            $out .= "</table>";
            echo $out;
            $conn->close();   
        ?>
        <h2>Add New Run</h2>
        <form method="post" action="index.php"/>
        <label for="runDate">Date:</label><input type="date" name="runDate" id="runDate"/><br/>
        <label for="runDistance">Distance:</label><input type="text" name="runDistance" id="runDistance"/><br/>
        <label for="runComment">Comment/Note:</label><input type="text" name="runComment" id="runComment"/><br/>
        <input type="submit" value="Save" />
        
        </form>
    </body>
</html>