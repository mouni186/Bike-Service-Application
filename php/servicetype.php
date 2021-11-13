<?php
// get mail from hiddentextbox
    $servicedate = $_POST["date"];
    $servicetype = $_POST["service"];
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bikeservice";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO bookings (mail, servicedate, servicetype) VALUES ('abc', '$servicedate', '$servicetype');";

    if ($conn->multi_query($sql) === TRUE) 
    {
        echo "Inserted";
        // echo "<script>alert('New user created.!')
        // window.location.href='../index.html'; </script>";
    }
    else
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
?>