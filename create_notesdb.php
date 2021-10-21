<?php
// Connect to  a database

$servername = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($servername,$username,$password);

if(!$conn)
{
    echo "Connection failed with an error: " . mysqli_connect_error() . "<br>";
}

// Create a notes database
$sql = "CREATE DATABASE notesdb";
$result = mysqli_query($conn,$sql);

// if(!$result){
//     echo "Creating  database failed with an error : " . mysqli_error($conn) . "<br>";
// }
// else{
//     echo "Database created successfully <br>";
// }
mysqli_close($conn);
?>