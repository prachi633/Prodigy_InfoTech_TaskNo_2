<?php
$servername = "localhost:3370";
$username = "root";
$password = "";
$dbname="employee";


$connection = mysqli_connect($servername, $username, $password,$dbname);


if (!$connection) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "";
?>
