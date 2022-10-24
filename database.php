<?php
$serverName = "localhost";
$dBusername = "root";
$dBPassword = "";
$dBName = "flowerlycustomers2";
$conn = mysqli_connect($serverName,$dBusername,$dBPassword,$dBName);
if(!$conn){
    die("connection failed: " . mysqli_connect_error());
}