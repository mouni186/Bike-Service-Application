<?php
    $email=$_POST['EMail'];
    $conpass=$_POST['Password'];
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bikeservice";

    $conn = new mysqli($servername, $username, $password, $dbname);

    $var = 0;
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT mail, pass FROM users WHERE mail = '$email'and pass = '$conpass'";

    $result = $conn->query($sql);
    $flag=0;

    if ($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc()) 
        {
            $flag=1;
        }
    } 
    if($flag == 1)
    {
        setcookie($email, $conpass, time() + (86400), "/");
        echo "<script> window.location.href='../service.html'; </script>";
    }
    else
    {
        echo "<script> alert('NO usere found'); </script>";
    }
  
    $conn->close();
?>