<?php

$mail = '19mca008mounika.s@gmail.com';
$pass = '12345';



if($_POST['EMail'] == $mail and $_POST['Password'] == $pass)
{
    echo "<script>window.location.href='http://localhost/Bike-App/admin.html'</script>";
}

else
{
    echo "<script>alert('Invalid Admin login'); window.history.go(-1);</script>";
}


?>