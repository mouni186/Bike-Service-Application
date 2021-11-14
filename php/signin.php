<?php
    $email=$_POST['EMailsign'];
    $conpass=$_POST['Conpasswordsign'];
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bikeservice";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO users (mail, pass) VALUES ('$email', '$conpass');";

    if ($conn->multi_query($sql) === TRUE) 
    {
        echo "<script>alert('New user created.!')
        window.location.href='../index.html'; </script>";
    }
    else 
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
?>