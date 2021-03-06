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

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bikeservice";

$conn = new mysqli($servername, $username, $password, $dbname);

if(isset($_GET['notstarted'])) 
{
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT mail, bikenumber, serviceid FROM bookings WHERE bikestatus = 0";
    $result = $conn->query($sql);
    
    echo "<h2>Not Started List</h2>";
    echo "<table border='1'>
    <tr>
        <th>Mail</th>
        <th>Bike Number</th>
        <th>Service ID</th>
        <th>Status</th>
    </tr>";

    while($row = mysqli_fetch_array($result))
    {
        echo "<tr>";
        echo "<td>" . $row['mail'] . "</td>";
        echo "<td>" . $row['bikenumber'] . "</td>";
        echo "<td>" . $row['serviceid'] . "</td>";
        $path = "http://localhost/Bike-App/php/movetostart.php?serviceid=" . $row['serviceid'];
        echo "<td><a href=".$path.">Move To Started State</a></td>";
    }
    echo "</table>";
}

if(isset($_GET['started'])) 
{
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT mail, bikenumber, serviceid FROM bookings WHERE bikestatus = 1";
    $result = $conn->query($sql);
    
    echo "<h2>Started List</h2>";
    echo "<table border='1'>
    <tr>
        <th>Mail</th>
        <th>Bike Number</th>
        <th>Service ID</th>
        <th>Status</th>
    </tr>";

    while($row = mysqli_fetch_array($result))
    {
        echo "<tr>";
        echo "<td>" . $row['mail'] . "</td>";
        echo "<td>" . $row['bikenumber'] . "</td>";
        echo "<td>" . $row['serviceid'] . "</td>";
        $path = "http://localhost/Bike-App/php/movetocompleted.php?serviceid=" . $row['serviceid'];
        echo "<td><a href=".$path.">Move To Completed State</a></td>";
    }
    echo "</table>";
}

if(isset($_GET['completed'])) 
{
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT mail, bikenumber, serviceid FROM bookings WHERE bikestatus = 2";
    $result = $conn->query($sql);
    
    echo "<h2>Completed List</h2>";
    echo "<table border='1'>
    <tr>
        <th>Mail</th>
        <th>Bike Number</th>
        <th>Service ID</th>
        <th>Status</th>
        <th> Send Mail </th>
    </tr>";

    while($row = mysqli_fetch_array($result))
    {

        echo "<tr>";
        echo "<td>" . $row['mail'] . "</td>";
        echo "<td>" . $row['bikenumber'] . "</td>";
        echo "<td>" . $row['serviceid'] . "</td>";
        $path = "http://localhost/Bike-App/php/movetodelivered.php?serviceid=" . $row['serviceid'];
        $mailPath = "http://localhost:5000/Completed?mail=" . $row['mail'];
        echo "<td><a href=".$path.">Move To Delivered State</a></td>";
        echo "<td><a href=".$mailPath.">Mail</a></td>";
    }
    echo "</table>";
}

if(isset($_GET['delivered'])) 
{
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT mail, bikenumber, serviceid FROM bookings WHERE bikestatus = 3";
    $result = $conn->query($sql);
    
    echo "<h2>Delivered List</h2>";
    echo "<table border='1'>
    <tr>
        <th>Mail</th>
        <th>Bike Number</th>
        <th>Service ID</th>
    </tr>";

    while($row = mysqli_fetch_array($result))
    {

        echo "<tr>";
        echo "<td>" . $row['mail'] . "</td>";
        echo "<td>" . $row['bikenumber'] . "</td>";
        echo "<td>" . $row['serviceid'] . "</td>";

    }



    echo "</table>";
}
$conn->close();

if(isset($_GET['logout'])) 
{
    echo "<script> window.location.href='../index.html'; </script>";    
}


?>

    </body>
</html>