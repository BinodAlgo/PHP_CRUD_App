<?php
// Connect to  a database

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "notesdb";


$conn = mysqli_connect($servername,$username,$password);

if(!$conn)
{
    echo "Connection failed with an error: " . mysqli_connect_error() . "<br>";
}


?>