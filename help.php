<?php

// Create connection
$conn = new mysqli("localhost","root", "", "accidentrecord");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$name = $_POST['name'];
$email = $_POST['email'];
$mob = $_POST['mob'];
$msg = $_POST['msg'];


$sql = "INSERT INTO help (id,name, email, mob, msg)
VALUES (@,'$name', '$email', '$mob','$msg')";


if ($conn->query($sql) === TRUE) {
   echo "<script> alert('Your Request is Successfully Registered');</script>";;
   include 'contact.html';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
