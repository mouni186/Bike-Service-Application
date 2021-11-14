<?php

    $mail = $_POST["gmail"];
    $bikenumber = $_POST["bikenumber"];
    $servicedate = $_POST["date"];
    $servicetype = $_POST["service"];

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    $getID = generateRandomString();

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bikeservice";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO bookings (mail, servicedate, servicetype, bikenumber, bikestatus, serviceid) VALUES ('$mail', '$servicedate', '$servicetype', '$bikenumber', 0, '$getID');";

    if ($conn->multi_query($sql) === TRUE) 
    {
        echo "Inserted";
    }
    else
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
?>