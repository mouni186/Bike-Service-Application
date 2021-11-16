<html>
    <style>
/* spacing */

table {
  table-layout: fixed;
  width: 100%;
  border-collapse: collapse;
  border: 3px solid purple;
}

thead th:nth-child(1) {
  width: 30%;
}

thead th:nth-child(2) {
  width: 20%;
}

thead th:nth-child(3) {
  width: 15%;
}

thead th:nth-child(4) {
  width: 35%;
}

th, td {
  padding: 20px;
}

    </style>
    <body>
<?php

    $email = $_GET['mail']; 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bikeservice";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) 
        {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT servicedate, servicetype, bikenumber, bikestatus FROM bookings WHERE mail = '$email'";
        $result = $conn->query($sql);
        
        echo "<h2>Status</h2>";
        echo "<table border='1'>
        <tr>
            <th>Service Date</th>
            <th>Service Type</th>
            <th>Bike Number</th>
            <th>Status</th>
        </tr>";

        while($row = mysqli_fetch_array($result))
        {
            echo "<tr>";
            echo "<td>" . $row['servicedate'] . "</td>";
            echo "<td>" . $row['servicetype'] . "</td>";
            echo "<td>" . $row['bikenumber'] . "</td>";
            if($row['bikestatus'] == 0)
            {
                echo "<td> Not Started </td>";
            }
            else if($row['bikestatus'] == 1)
            {
                echo "<td> On progress </td>";
            }
            else if($row['bikestatus'] == 2)
            {
                echo "<td> Completed </td>";
            }
            else if ($row['bikestatus'] == 3)
            {
                echo "<td> ". $row['servicedate'] ." </td>";
            }
        }
        echo "</table>";

?>


</body>
</html>