<?php
$db = [
    'servername' => "localhost",
    'username' => "root",
    'password' => "",
    'dbname' => "survey_web"
];

// Create connection
$conn = new mysqli($db['servername'], $db['username'], $db['password'], $db['dbname']);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// var_dump( mysqli_query($connection, $query) );

// if ($connection) {
//     echo "We are connected";
// }
?>