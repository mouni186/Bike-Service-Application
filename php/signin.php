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
 
    $flag = 0;

    $temp = "SELECT mail FROM users WHERE mail = '$email'";
    $result = $conn->query($temp);


        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo $row['mail'];
           
            if($row['mail'] == $email)
            {
                $flag = 1;
            }
            
            
        }
        if($flag == 1)
        {

            echo "<script>alert('Already Registered..!'); history.go(-1);</script>";
        }
        else
        {
            $sql = "INSERT INTO users (mail, pass) VALUES ('$email', '$conpass');";
        $insert = $conn->query($sql);
        if ($conn->query($sql) === TRUE) {
            
            echo "<script>alert('New User Created..!'); history.go(-1);</script>";
          }
        }
      
            
    
        
    
    //   else {
    //     $sql = "INSERT INTO users (mail, pass) VALUES ('$email', '$conpass');";
    //     $insert = $conn->query($sql);
    //     if ($conn->query($sql) === TRUE) {
    //         echo "New record created successfully";
    //       }

    //   }

    // if ($conn->multi_query($temp) === TRUE) 
    // {
    //     echo "<script>alert('Already registered');
    //     window.location.href='../index.html'; </script>";
    // }
    // else 
    // {
    //     
    // }
    $conn->close();
?>