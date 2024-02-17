<?php
$server = "localhost";
$user = "root";
$password = "123456";
$dbname = "crud";

$conn = new mysqli($server,$user,$password,$dbname);

if($conn->connect_error){
    echo "error";
}
?>
