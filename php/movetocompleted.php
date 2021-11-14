<?php

    $id = $_GET['serviceid'];
    echo $id;

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bikeservice";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bikeservice";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE bookings SET bikestatus = bikestatus + 1 WHERE serviceid = '$id'";
    if($conn->query($sql) == TRUE)
    {
        echo "<script>alert('Moved To Completed State')</script>";
        echo "<script>window.location.href='http://localhost/Bike-App/admin.html';</script>";
    }
    else
    {
        echo "<script>alert('Can't Modify')</script>";
    }

?>